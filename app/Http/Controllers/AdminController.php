<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Home;
use App\Models\Setting;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    public function user_show()
    {
        $users = User::all();
        return view('admin.users.users', compact('users')); // user səhifəsini göstər
    }


    public function index()
    {


        $monthlyStats_home = Home::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(CASE WHEN status = "satildi" THEN sirketin_pulu ELSE 0 END) as total_sales_income'),
            DB::raw('SUM(CASE WHEN status = "verildi" THEN sirketin_pulu ELSE 0 END) as total_rentals_income')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $monthlyStats_obyekt = Shop::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(CASE WHEN status = "satildi" THEN sirketin_pulu ELSE 0 END) as total_sales_income'),
            DB::raw('SUM(CASE WHEN status = "verildi" THEN sirketin_pulu ELSE 0 END) as total_rentals_income')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();



        $all_home = Home::where('status', 'qalir')->count();
        $sale_home = Home::where('status', 'satildi')->count();
        $rent_home = Home::where('status', 'verildi')->count();
        $all_shop = Shop::where('status', 'qalir')->count();
        $sale_shop = Shop::where('status', 'satildi')->count();
        $rent_shop = Shop::where('status', 'verildi')->count();
        $sirketinqazanci = Home::whereIn('status', ['satildi', 'verildi'])->sum('sirketin_pulu')
            + Shop::whereIn('status', ['satildi', 'verildi'])->sum('sirketin_pulu');

        $maklerlerinqazanci = Home::whereIn('status', ['satildi', 'verildi'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->sum('makler_pulu')
            +
            Shop::whereIn('status', ['satildi', 'verildi'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->sum('makler_pulu');

        return view('admin.home', compact(
            'all_home',
            'sale_home',
            'rent_home',
            'all_shop',
            'sale_shop',
            'rent_shop',
            'sirketinqazanci',
            'maklerlerinqazanci',
            'monthlyStats_home',
            'monthlyStats_obyekt'
        )); // admin səhifəsini göstər
    }

    public function maklerQazanci()
    {
        $maklerler = User::where('role', 'user')
            ->with(['homes' => function ($query) {
                $query->whereIn('status', ['satildi', 'verildi']);
            }, 'shops' => function ($query) {
                $query->whereIn('status', ['satildi', 'verildi']);
            }])
            ->get()
            ->map(function ($makler) {
                $monthlyIncome = collect();

                // Ev və dükan qazancını ay üzrə qruplaşdır
                $homeIncome = $makler->homes->groupBy(function ($item) {
                    return $item->created_at->format('Y-m');
                });

                $shopIncome = $makler->shops->groupBy(function ($item) {
                    return $item->created_at->format('Y-m');
                });

                // Hər ay üçün ümumi qazancı hesabla
                foreach ($homeIncome as $month => $homes) {
                    $total = $homes->sum('makler_pulu');
                    $monthlyIncome[$month] = $total;
                }

                foreach ($shopIncome as $month => $shops) {
                    $total = $shops->sum('makler_pulu');
                    $monthlyIncome[$month] = ($monthlyIncome[$month] ?? 0) + $total;
                }

                return [
                    'id' => $makler->id,
                    'name' => $makler->name,
                    'email' => $makler->email,
                    'monthly_income' => $monthlyIncome,
                ];
            });

        return view('admin.makler_qazanci', compact('maklerler'));
    }
    public function setting_edit()
    {
        $setting = Setting::firstOrFail();
        return view('admin.settings', compact('setting'));
    }
    public function Setting(SettingRequest $request, $id)
    {
        // Verilənləri doğrulamaq
        $validated = $request->validated();

        // Mövcud blog məlumatını alırıq
        $setting = Setting::findOrFail($id);

        // Yalnız admin və ya istifadəçinin özü bu əməliyyatı edə bilər
        if (auth()->user()->role === 'admin') {

            // Əgər yeni şəkil göndərilməyibsə, mövcud şəkili saxlayırıq
            if ($request->hasFile('image')) {
                // Mövcud şəkili silirik (əgər varsa)
                if ($setting->image && Storage::disk('public')->exists($setting->image)) {
                    Storage::disk('public')->delete($setting->image);
                }

                // Yeni şəkili saxlayırıq
                $validated['image'] = $request->file('image')->store('uploads/setting/images', 'public');
            } else {
                // Şəkil dəyişməyibsə, əvvəlki şəkili saxlayırıq
                $validated['image'] = $setting->image;
            }

            try {
                // Settings məlumatlarını yeniləyirik
                $setting->update($validated);


                // Uğurlu mesaj və yönləndirmə
                return redirect()->back()->with('success', 'Məlumat uğurla yeniləndi!');
            } catch (\Exception $e) {
                // Xəta mesajı və geri dönmə
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('admin.home_show')->with('error', 'Bu əməliyyatı yalnız  Admin heyata kecire biler!!!');
        }
    }
}
