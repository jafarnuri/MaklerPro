<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\Home;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.users.register');
    }

    public function postlogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.home');
        }

        return back()->withErrors([
            'email' => 'Email və ya şifrə yanlışdır.'
        ]);
    }
    public function profile($id)
    {
        $users = User::find($id);
        return view('admin.users.user_update', compact('users'));
    }
    public function profile_update(UserRequest $request, $id)
    {

        // Verilənləri doğrulamaq
        $validated = $request->validated();
        // Bunu əlavə edib, $validated-də nə olduğunu yoxlayın

        // Mövcud istifadəçi məlumatını alırıq
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'İstifadəçi tapılmadı!');
        }

        // Əgər yeni şəkil göndərilməyibsə, mövcud şəkili saxlayırıq
        if ($request->hasFile('image')) {
            // Mövcud şəkili silirik (əgər varsa)
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Yeni şəkili saxlayırıq
            $validated['image'] = $request->file('image')->store('uploads/users/images', 'public');
        } else {
            // Şəkil dəyişməyibsə, əvvəlki şəkili saxlayırıq
            $validated['image'] = $user->image;
        }



        try {

            // Home məlumatlarını yeniləyirik
            $user->update($validated);

            // Uğurlu mesaj və yönləndirmə
            return redirect()->back()->with('success', 'Məlumat uğurla yeniləndi!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function postregister(RegisterRequest $request)
    {
        // Sistemdə neçə makler olduğunu yoxla
        $makler_sayi = User::where('role', 'user')->count();

        if ($makler_sayi >= 3) {
            return redirect()->back()->with('error', 'Maksimum 3 makler əlavə edilə bilər.');
        }

        $user = User::create($request->all());

        

        return redirect()->back()->with('success', 'Yeni makler əlavə etdiniz');
    }
    public function delete($id)
    {
        // Əgər istifadəçi özünü silməyə çalışırsa, icazə vermə
        if (auth()->id() == $id) {
            return redirect()->back()->with('error', 'Özünüzü silə bilməzsiniz!');
        }

        // Əgər istifadəçi admin deyilsə, icazə vermə
        if (auth()->user()->role === 'admin') {
            // Silinəcək istifadəçini tap
            $user = User::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'İstifadəçi tapılmadı!');
            }
            // Silinən istifadəçinin id-si ilə əlaqəli olan elanları tap
            $homes = Home::where('user_id', $id)->get();
            $shops = Shop::where('user_id', $id)->get();

            // Adminin id-sini götür
            $adminId = auth()->id();

            // İlanların user_id dəyərini adminin id-si ilə dəyişdir
            foreach ($homes as $home) {
                $home->user_id = $adminId;
                $home->save();
            }

            foreach ($shops as $shop) {
                $shop->user_id = $adminId;
                $shop->save();
            }

            // İstifadəçini sil
            $user->delete();

            return redirect()->back()->with('success', 'İstifadəçi uğurla silindi.');
        } else {
            return redirect()->route('admin.user_show')->with('error', 'Siz admin deyilsiniz!');
        }
    }
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
