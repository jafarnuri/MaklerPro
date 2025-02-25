<?php

namespace App\Http\Controllers;


use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\ShopGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function shop_show()
    {
        $shop = Shop::where('status','qalir')->get();
        return view('admin.shops.shop',compact('shop'));
    }


    public function shop_create()
    {
        return view('admin.shops.shop_create'); 
    }
    public function shop_edit($id)
    {
        $shop=Shop::find($id);
        return view('admin.shops.shop_update',compact("shop")); 
    }
    public function shop_makler_faiz($id)
    {
        $shop=Shop::find($id);
        return view('admin.shops.maklerpulu',compact("shop")); 
    }
    public function sold_shop()
    {
        $shop=Shop::where('status','satildi')->get();
        return view('admin.shops.sold_shop',compact('shop')); 
    }

    public function rented_shop()
    {
        $shop=Shop::where('status','verildi')->get();
        return view('admin.shops.rented_shop',compact('shop')); 
    }  
    public function my_shop()
    {
        $shop = Shop::where('user_id', auth()->id())
             ->where('status', 'qalir')
             ->get();
        return view('admin.shops.my_shop',compact('shop')); 
    }  
        public function shop_store(ShopRequest $request)
        {
            
            
            $validate = $request->validated();
            $validate['user_id'] = auth()->id();
            $validate['sirketin_pulu'] =($validate['faiz_derecesi'] / 100) * $validate['price']; // Makler pulunu hesabla
        
            // Əsas şəkili yüklə
            if ($request->hasFile('image')) {
                $validate['image'] = $request->file('image')->store('uploads/shops/images', 'public');
            }
        
            try {
                $shop = Shop::create($validate);
                
                
                // Qalereya şəkillərini yüklə və DB-ə yaz
                if ($request->hasFile('gallery')) {
                    foreach ($request->file('gallery') as $file) {
                        $path = $file->store('uploads/shops/gallery', 'public');
                        ShopGalery::create([
                            'shop_id' => $shop->id,
                            'image' => $path,
                        ]);
                    }
                }
    
                return redirect()->route('admin.shop_show')->with('success', 'Məlumat uğurla əlavə edildi!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }

            
        }
        public function shop_update (ShopRequest $request, $id)
        {
            // Verilənləri doğrulamaq
            $validated = $request->validated();
            
            // Mövcud blog məlumatını alırıq
            $shop = Shop::findOrFail($id);

         // Yalnız admin və ya istifadəçinin özü bu əməliyyatı edə bilər
         if (auth()->user()->is_admin || auth()->id() === $shop->user_id) {

            // Əgər yeni şəkil göndərilməyibsə, mövcud şəkili saxlayırıq
            if ($request->hasFile('image')) {
                // Mövcud şəkili silirik (əgər varsa)
                if ($shop->image && Storage::disk('public')->exists($shop->image)) {
                    Storage::disk('public')->delete($shop->image);
                }
        
                // Yeni şəkili saxlayırıq
                $validated['image'] = $request->file('image')->store('uploads/shops/images', 'public');
            } else {
                // Şəkil dəyişməyibsə, əvvəlki şəkili saxlayırıq
                $validated['image'] = $shop->image;
            }
        
            try {
                // Shop məlumatlarını yeniləyirik
                $shop->update($validated);
        
                // Qalereya şəkillərini yüklə və DB-ə yaz
                if ($request->hasFile('gallery')) {
                    foreach ($request->file('gallery') as $file) {
                        $path = $file->store('uploads/shops/gallery', 'public');
                        ShopGalery::create([
                            'shop_id' => $shop->id,
                            'image' => $path,
                        ]);
                    }
                }
        
                // Uğurlu mesaj və yönləndirmə
                return redirect()->route('admin.shop_show')->with('success', 'Məlumat uğurla yeniləndi!');
            } catch (\Exception $e) {
                // Xəta mesajı və geri dönmə
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('admin.shop_show')->with('error', 'Bu əməliyyatı yalnız  öz mənziliniz üçün həyata keçirə bilərsiniz.');
        }
        }
         


        public function delete($id)
        {
            $shop = Shop::findOrFail($id);
        
            // Yalnız admin və ya istifadəçinin özü bu əməliyyatı edə bilər
            if (auth()->user()->is_admin || auth()->id() === $shop->user_id) {
        
                // Şəkil varsa, onu da silirik
                if ($shop->image) {
                    Storage::disk('public')->delete($shop->image);
                }
        
                // Qalereya şəkillərini silirik
                $galleryImages = ShopGalery::where('shop_id', $shop->id)->get();
        
                foreach ($galleryImages as $image) {
                    if ($image->image) {
                        Storage::disk('public')->delete($image->image); // Qalereya şəkillərini silirik
                    }
                    $image->delete(); // Qalereya şəkilini DB-dən silirik
                }
        
                // Menzili və əlaqəli məlumatları silirik
                $shop->delete();
        
                return redirect()->route('admin.shop_show')->with('success', 'Mənzil və əlaqəli şəkillər uğurla silindi!');
            } else {
                return redirect()->route('admin.shop_show')->with('error', 'Bu əməliyyatı yalnız  öz mənziliniz üçün həyata keçirə bilərsiniz.');
            }
        }
        

        public function makler_faiz (ShopRequest $request, $id)
        {
            // Verilənləri doğrulamaq
            $validated = $request->validated();
            $validated['makler_pulu'] =($validated['makler_faiz'] / 100) * $validated['sirketin_pulu']; // Makler pulunu hesabla
            // Mövcud blog məlumatını alırıq
            $shop = Shop::findOrFail($id);

         // Yalnız admin və ya istifadəçinin özü bu əməliyyatı edə bilər
         if (auth()->user()->role === 'admin'){

        
            try {
               
                // Shop məlumatlarını yeniləyirik
                $shop->update($validated);
        
                if($shop->status =='satildi')
                {
                    return redirect()->route('admin.sold_shop')->with('success', 'Məlumat uğurla yeniləndi!');
                }
                else{
                    return redirect()->route('admin.rented_shop')->with('success', 'Məlumat uğurla yeniləndi!');
                }
                
            } catch (\Exception $e) {
                // Xəta mesajı və geri dönmə
                return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
            }
        }
        }
         
}
