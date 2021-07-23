<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\MediaManagementTrait;

class MenuController extends Controller
{
    use MediaManagementTrait;
    //type, size, diet, origin
    public function index(Request $request){
        if($q = $request->search){
            $menus = Menu::where('name','LIKE',"%$q%")->orWhere('description','LIKE',"%$q%")->get();
            $filter = ['itemtype'=>  ['food','drinks','fruits','pastries'],
                    'origin' => ['local','intercontinental','chinese','italian'],
                    'period'=>  ['breakfast','lunch','dinner','dessert'],
                    'diet' => ['vegan','veg','nonveg'],
                    'size' => 'medium',
                    'cost' => 0,500
                    ];
        }
        else{
            $cost = (!$request->cost)  ? array(0,20000) : explode(',',$request->cost);
            $menus = Menu::whereBetween('price',$cost)->whereIn('type',$request->itemtype)->whereIn('origin',$request->origin)->whereIn('diet',$request->diet)->get();
            $filter = ['itemtype'=> $request->itemtype,
                        'origin' => $request->origin, 
                        'period'=>  $request->period, 
                        'diet' => $request->diet,
                        'size' => $request->size,
                        'cost' => $request->cost
                    ];
        }
        //dd($request->all());
        return view('frontend.menu.list',compact('menus','filter'));
    }
    
    public function view(Menu $menu){
        return view('frontend.meals.menu');
    }

    //BACKEND
    public function list()
    {
        $menus = Menu::all();
        return view('backend.menu.list',compact('menus'));
    }

    public function store(Request $request)
    {
        // dd($request->size);
        for($i = 0; $i < count($request->size); $i++){
            $menu = new Menu;
            $menu->name = $request->name;
            $menu->code = $request->name;
            $menu->description = $request->description;
            $menu->type = $request->type;
            $menu->origin = $request->origin;
            $menu->diet = $request->diet;
            $menu->size = $request->size[$i];
            $menu->price = $request->price[$i];
            $menu->save();
            if($request->hasFile('file.'.$i)){
                $this->multipleUpload($request->file[$i],$menu->id,get_class($menu));
            }
        }
        return redirect()->back();
    }

    
    public function edit(Menu $menu)
    {
        $menus = Menu::all();
        return view('backend.menu.edit',compact('menus','menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->name = $request->name;
        $menu->code = $request->name;
        $menu->description = $request->description;
        $menu->type = $request->type;
        $menu->size = $request->size;
        $menu->origin = $request->origin;
        $menu->diet = $request->diet;
        $menu->price = $request->price;
        $menu->save();
        if($request->hasFile('file')){
            if($menu->media){
                Storage::delete('public/meals/'.$menu->media->name);
                $menu->media->delete();
            }
            $this->uploadMedia($request,$menu->id,get_class($menu));
        }
        return redirect()->back();
    }

    public function destroy(Menu $menu)
    {
        if($menu->orders->isEmpty() && $menu->bookmarks->isEmpty()){
            if($menu->media){
                Storage::delete('public/meals/'.$menu->media->name);
                $menu->media->delete();
            }
            $menu->delete();
        }
        return redirect()->back();
    }

}
