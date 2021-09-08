<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Menu;
use App\Tag;
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
                'category'=>  ['food','drinks','fruits','pastries'],
                'period'=>  ['breakfast','lunch','dinner','dessert'],
                'origin' => ['local','intercontinental','chinese','italian'],
                'diet' => ['vegan','veg','nonveg'],
                'cost' => 0,20000
            ];
        }
        else{
            // $cost = (!$request->cost)  ? array(0,20000) : explode(',',$request->cost);
            $calendars = MealCalendar::available()->whereIn('period',$request->period)->whereHas('meal',function ($query) use($request) {
                $query->whereIn('origin',$request->origin)->whereIn('category',$request->category)->whereIn('diet',$request->diet);
            })->get();
            $filter = [
                        'category'=>  $request->category,
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
        $tags = Tag::all();
        return view('backend.meal.create',compact('tags'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $meal = new Meal;
        $meal->name = $request->name;
        $meal->description = $request->description;
        $meal->image = $request->file;
        $meal->category = $request->category;
        $meal->origin = $request->origin;
        $meal->diet = $request->diet;
        $meal->price = $request->price;
        $meal->save();
        return redirect()->route('admin.meal.list');
    }

    // public function getMealDiet(Array $ids){
    //     $diet = ''; 
    //     $menus = Menu::whereIn('id',$ids)->get()->pluck('diet')->toArray();
    //     if(in_array('nonveg',$menus))
    //     $diet = 'nonveg';
    //     elseif(in_array('veg',$menus))
    //     $diet = 'veg';
    //     else
    //     $diet = 'vegan';
    //     return $diet;
    // }

    public function show(Meal $meal)
    {
        //
    }

    public function edit(Meal $meal)
    {
        $tags = Tag::all();
        return view('backend.meal.edit',compact('meal','tags')); 
    }

    public function update(Request $request, Meal $meal)
    {
        $meal->name = $request->name;
        $meal->description = $request->description;
        if($request->file) $meal->image = $request->file;
        $meal->category = $request->category;
        $meal->origin = $request->origin;
        $meal->diet = $request->diet;
        $meal->price = $request->price;
        $meal->save();
        // $meal->items()->sync($request->menu);
        return redirect()->route('admin.meal.list');
    }

    
    public function destroy(Meal $meal)
    {
        if($meal->calendar->orderItems->isEmpty() && $meal->calendar->bookmarks->isEmpty()){
            $meal->delete();
        }
        return redirect()->back();
    }

}
