<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Menu;
use App\MealCalendar;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function index(Request $request){
        // dd($request->all());
        if($q = $request->search){
            $calendars = MealCalendar::available()->whereHas('meal',function ($query) use($q){
                $query->where('name','LIKE',"%$q%")->orWhere('description','LIKE',"%$q%");
            })->get();
            $filter = [
                'itemtype'=>  ['food','drinks','fruits','pastries'],
                'period'=>  ['breakfast','lunch','dinner','dessert'],
                'origin' => ['local','intercontinental','chinese','italian'],
                'diet' => ['vegan','veg','nonveg'],
                'cost' => 0,20000
            ];
        }
        else{
            // $cost = (!$request->cost)  ? array(0,20000) : explode(',',$request->cost);
            $calendars = MealCalendar::available()->whereIn('period',$request->period)->whereHas('meal',function ($query) use($request) {
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
        return view('frontend.meal.list',compact('calendars','filter'));
    }

    /**
     *BACKEND
     */
    public function list()
    {
        $meals = Meal::orderBy('name','ASC')->get();
        return view('backend.meal.list',compact('meals'));
    }

    
    public function create()
    {
        $menus = Menu::all();
        return view('backend.meal.create',compact('menus'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $meal = new Meal;
        $meal->name = $request->name;
        $meal->description = $request->description;
        $meal->image = $request->file;
        $meal->type = $request->type;
        $meal->origin = $request->origin;
        $meal->diet = $this->getMealDiet($request->menu);
        $meal->price = $request->price;
        $meal->save();
        $meal->items()->attach($request->menu);
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
        $meal->description = $request->description;
        if($request->file) $meal->image = $request->file;
        $meal->type = $request->type;
        $meal->origin = $request->origin;
        $meal->diet = $this->getMealDiet($request->menu);
        $meal->price = $request->price;
        $meal->save();
        $meal->items()->sync($request->menu);
        return redirect()->route('admin.meal.list');
    }

    
    public function destroy(Meal $meal)
    {
        if($meal->calendar->orderItems->isEmpty() && $meal->calendar->bookmarks->isEmpty()){
            $meal->delete();
        }
        else dd('not empty');
        return redirect()->back();
    }

}
