<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Models\Galery;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{



    public function home_show()
    {
        $homes = Home::where('status','qalir')->get();
        return view('admin.homes.home',compact('homes'));
    }

    public function home_create()
    {
        return view('admin.homes.home_create'); 
    }
    public function home_edit($id)
    {
        $home=Home::find($id);
        return view('admin.homes.homes_update',compact("home")); 
    }

    public function home_makler_faiz($id)
    {
        $home=Home::find($id);
        return view('admin.homes.maklerpulu',compact("home")); 
    }
    public function sold_home()
    {
        $homes=Home::where('status','satildi')->get();
        return view('admin.homes.sold_homes',compact('homes')); 
    }

    public function rented_home()
    {
        $homes=Home::where('status','verildi')->get();
        return view('admin.homes.rented_homes',compact('homes')); 
    }  
    public function my_home()
    {
        $homes = Home::where('user_id', auth()->id())
             ->where('status', 'qalir')
             ->get();
        return view('admin.homes.my_homes',compact('homes')); 
    }  
        public function home_store(HomeRequest $request)
        {
            
            
            $validate = $request->validated();
            $validate['user_id'] = auth()->id();
            $validate['sirketin_pulu'] =($validate['faiz_derecesi'] / 100) * $validate['price']; // Makler pulunu hesabla
        
            // Əsas şəkili yüklə
            if ($request->hasFile('image')) {
                $validate['image'] = $request->file('image')->store('uploads/homes/images', 'public');
            }
        
            try {
                $home = Home::create($validate);
                
                
                // Qalereya şəkillərini yüklə və DB-ə yaz
                if ($request->hasFile('gallery')) {
                    foreach ($request->file('gallery') as $file) {
                        $path = $file->store('uploads/homes/gallery', 'public');
                        Galery::create([
                            'home_id' => $home->id,
                            'image' => $path,
                        ]);
                    }
                }
        
                return redirect()->route('admin.home_show')->with('success', 'Məlumat uğurla əlavə edildi!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }

            
        }
        public function home_update (HomeRequest $request, $id)
        {
            // Verilənləri doğrulamaq
            $validated = $request->validated();
            
            // Mövcud blog məlumatını alırıq
            $home = Home::findOrFail($id);

         // Yalnız admin və ya istifadəçinin özü bu əməliyyatı edə bilər
         if (auth()->user()->role === 'admin'|| auth()->id() === $home->user_id) {

            // Əgər yeni şəkil göndərilməyibsə, mövcud şəkili saxlayırıq
            if ($request->hasFile('image')) {
                // Mövcud şəkili silirik (əgər varsa)
                if ($home->image && Storage::disk('public')->exists($home->image)) {
                    Storage::disk('public')->delete($home->image);
                }
        
                // Yeni şəkili saxlayırıq
                $validated['image'] = $request->file('image')->store('uploads/homes/images', 'public');
            } else {
                // Şəkil dəyişməyibsə, əvvəlki şəkili saxlayırıq
                $validated['image'] = $home->image;
            }
        
            try {
                // Home məlumatlarını yeniləyirik
                $home->update($validated);
        
                // Qalereya şəkillərini yüklə və DB-ə yaz
                if ($request->hasFile('gallery')) {
                    foreach ($request->file('gallery') as $file) {
                        $path = $file->store('uploads/homes/gallery', 'public');
                        Galery::create([
                            'home_id' => $home->id,
                            'image' => $path,
                        ]);
                    }
                }
        
                // Uğurlu mesaj və yönləndirmə
                return redirect()->route('admin.home_show')->with('success', 'Məlumat uğurla yeniləndi!');
            } catch (\Exception $e) {
                // Xəta mesajı və geri dönmə
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('admin.home_show')->with('error', 'Bu əməliyyatı yalnız  öz mənziliniz üçün həyata keçirə bilərsiniz.');
        }
        }
         


        public function delete($id)
        {
            $home = Home::findOrFail($id);
        
            // Yalnız admin və ya istifadəçinin özü bu əməliyyatı edə bilər
            if (auth()->user()->is_admin || auth()->id() === $home->user_id) {
        
                // Şəkil varsa, onu da silirik
                if ($home->image) {
                    Storage::disk('public')->delete($home->image);
                }
        
                // Qalereya şəkillərini silirik
                $galleryImages = Galery::where('home_id', $home->id)->get();
        
                foreach ($galleryImages as $image) {
                    if ($image->image) {
                        Storage::disk('public')->delete($image->image); // Qalereya şəkillərini silirik
                    }
                    $image->delete(); // Qalereya şəkilini DB-dən silirik
                }
        
                // Menzili və əlaqəli məlumatları silirik
                $home->delete();
        
                return redirect()->route('admin.home_show')->with('success', 'Mənzil və əlaqəli şəkillər uğurla silindi!');
            } else {
                return redirect()->route('admin.home_show')->with('error', 'Bu əməliyyatı yalnız  öz mənziliniz üçün həyata keçirə bilərsiniz.');
            }
        }
        
 
        public function makler_faiz (HomeRequest $request, $id)
        {
            // Verilənləri doğrulamaq
            $validated = $request->validated();
            $validated['makler_pulu'] =($validated['makler_faiz'] / 100) * $validated['sirketin_pulu']; // Makler pulunu hesabla
            // Mövcud blog məlumatını alırıq
            $home = Home::findOrFail($id);


         if (auth()->user()->role === 'admin'){
 
        
            try {
             
                // Shop məlumatlarını yeniləyirik
                $home->update($validated);
        
                // Uğurlu mesaj və yönləndirmə
                return redirect()->route('admin.home_show')->with('success', 'Məlumat uğurla yeniləndi!');
            } catch (\Exception $e) {
                // Xəta mesajı və geri dönmə
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }
        }else{
            return redirect()->back()->with('error', 'Yalnız Admin təyin edə bilər!!!');
        }
        }

}