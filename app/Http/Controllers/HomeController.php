<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Models\Galery;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function index()
    {
        return view('admin.home'); 
    }

    public function home_show()
    {
        $homes = Home::all();
        return view('admin.homes.home',compact('homes'));
    }

    public function home_create()
    {
        return view('admin.homes.home_create'); 
    }

    public function sold_home()
    {
        return view('admin.homes.sold_homes'); 
    }

    public function rented_home()
    {
        return view('admin.homes.rented_homes'); 
    }  
        public function home_store(HomeRequest $request)
        {
            
            
            $validate = $request->validated();
            $validate['user_id'] = auth()->id();
            $validate['makler_pulu'] =($validate['faiz_derecesi'] / 100) * $validate['price']; // Makler pulunu hesabla
        
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
 
    

}