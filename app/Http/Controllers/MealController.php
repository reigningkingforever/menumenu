<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\MediaManagementTrait;

class MealController extends Controller
{
    use MediaManagementTrait;

    public function index(Request $request){
        //dd($request->all());
        if($q = $request->search){
            $meals = Meal::available()->where('name','LIKE',"%$q%")->orWhere('subname','LIKE',"%$q%")
            //->orWhere('tags','LIKE',"%$q%")
            ->orWhereHas('items', function ($query) use($q) {
                $query->where('name', 'like', "%$q%")->orWhere('description', 'like', "%$q%");
            })
            ->get();
                $filter = [
                    'itemtype'=>  ['food','drinks','fruits','pastries'],
                    'period'=>  ['breakfast','lunch','dinner','dessert'],
                    'origin' => ['local','intercontinental','chinese','italian'],
                    'diet' => ['vegan','veg','nonveg'],
                    'cost' => 0,20000
                ];
        }
        else{
            $cost = (!$request->cost)  ? array(0,20000) : explode(',',$request->cost);
            $meals = Meal::available()->whereBetween('price',$cost)->whereIn('period',$request->period)
                    ->whereHas('items', function ($query) use ($request){
                    $query->whereIn('origin',$request->origin)->whereIn('type',$request->itemtype)->whereIn('diet',$request->diet);
                })->get();
            $filter = [
                        'itemtype'=>  $request->itemtype,
                        'period'=> $request->period, 
                        'origin' => $request->origin,
                        'diet' => $request->diet,
                        'cost' => $request->price
                    ];
        }
        
        return view('frontend.meal.list',compact('meals','filter'));
    }

    /**
     *BACKEND
     */
    public function list()
    {
        $meals = Meal::all();
        return view('backend.meal.list',compact('meals'));
    }

    
    public function create()
    {
        $menus = Menu::all();
        return view('backend.meal.create',compact('menus'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $meal = new Meal;
        $meal->name = $request->name;
        $meal->subname = $request->subname;
        $meal->monday = ($request->monday) ? $request->monday :0;
        $meal->tuesday = ($request->tuesday) ? $request->tuesday :0;
        $meal->wednesday = ($request->wednesday) ? $request->wednesday : 0;
        $meal->thursday = ($request->thursday) ? $request->thursday : 0;
        $meal->friday = ($request->friday) ? $request->friday : 0;
        $meal->saturday = ($request->saturday) ? $request->saturday : 0;
        $meal->sunday = ($request->sunday) ? $request->sunday : 0;
        $meal->breakfast = ($request->breakfast) ? $request->breakfast : 0;
        $meal->lunch = ($request->lunch) ? $request->lunch : 0;
        $meal->dinner = ($request->dinner) ? $request->dinner : 0;
        $meal->dessert = ($request->dessert) ? $request->dessert : 0;
        // $meal->diet = $this->getMealDiet($request->menu);
        $meal->price = $request->price;
        $meal->save();
        $meal->items()->attach($request->menu);
        if($request->hasFile('file')){
            $this->uploadMedia($request,$meal->id,get_class($meal));
        }
        return redirect()->route('admin.meal.list');
    }

    public function getMealDiet(Array $ids){
        $diet = ''; 
        $menus = Menu::whereIn('id',$ids)->get()->pluck('diet')->toArray();
        if(in_array('nonveg',$menus))
        $diet = 'nonveg';
        elseif(in_array('veg',$menus))
        $diet = 'veg';
        else
        $diet = 'vegan';
        return $diet;
    }

    public function show(Meal $meal)
    {
        //
    }

    public function edit(Meal $meal)
    {
        $menus = Menu::all();
        return view('backend.meal.edit',compact('menus','meal')); 
    }

    public function update(Request $request, Meal $meal)
    {
        $meal->name = $request->name;
        $meal->subname = $request->subname;
        $meal->monday = ($request->monday) ? $request->monday :0;
        $meal->tuesday = ($request->tuesday) ? $request->tuesday :0;
        $meal->wednesday = ($request->wednesday) ? $request->wednesday : 0;
        $meal->thursday = ($request->thursday) ? $request->thursday : 0;
        $meal->friday = ($request->friday) ? $request->friday : 0;
        $meal->saturday = ($request->saturday) ? $request->saturday : 0;
        $meal->sunday = ($request->sunday) ? $request->sunday : 0;
        $meal->breakfast = ($request->breakfast) ? $request->breakfast : 0;
        $meal->lunch = ($request->lunch) ? $request->lunch : 0;
        $meal->dinner = ($request->dinner) ? $request->dinner : 0;
        $meal->dessert = ($request->dessert) ? $request->dessert : 0;
        $meal->price = $request->price;
        $meal->save();
        $meal->items()->sync($request->menu);
        if($request->hasFile('file')){
            if($meal->media){
                Storage::delete('public/meals/'.$meal->media->name);
                $meal->media->delete();
            }
            $this->uploadMedia($request,$meal->id,get_class($meal));
        }
        return redirect()->back();
    }

    
    public function destroy(Meal $meal)
    {
        if($meal->orders->isEmpty() && $meal->bookmarks->isEmpty()){
            if($meal->media){
                Storage::delete('public/meals/'.$meal->media->name);
                $meal->media->delete();
            }
            $meal->delete();
        }
        return redirect()->back();
    }
}
