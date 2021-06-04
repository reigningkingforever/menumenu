<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Traits\MediaManagementTrait;

class MealController extends Controller
{
    use MediaManagementTrait;

    public function index(){
        // dd(request()->query());
        if($q = request()->query('search')){
            $meals = Meal::where('title','LIKE',"%$q%")
            ->orWhere('subtitle','LIKE',"%$q%")
            //->orWhere('tags','LIKE',"%$q%")
            ->orWhereHas('meals', function ($query) use($q) {
                $query->where('name', 'like', "%$q%")->orWhere('description', 'like', "%$q%");
            })
            ->get();
        }
        elseif(request()->query('filter')){
            $meals = Meal::whereBetween('price',explode(',',request()->query('price')))->whereIn('diet',request()->query('diet'))->whereIn('period',request()->query('period'))->whereHas('items', function ($query) {
                $query->whereIn('origin',request()->query('origin'));
            })->get();
            $filter = ['period'=> request()->query('period'), 
                        'origin' => request()->query('origin'),
                        'diet' => request()->query('diet'),
                        'cost' => request()->query('price')];
        }
        else{
        $meals = Meal::all();
        $filter = ['period'=>  ['breakfast','lunch','dinner','dessert'],
                    'origin' => ['local','intercontinental','chinese','italian'],
                    'diet' => ['vegan','veg','nonveg'],
                      'cost' => 0,500];
        }
        // dd($filter);
        return view('frontend.menu.meals',compact('meals','filter'));
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
        $meal = new Meal;
        $meal->title = $request->title;
        $meal->subtitle = $request->subtitle;
        $meal->period = $request->period;
        $meal->day = $request->day;
        $meal->diet = $this->getMealDiet($request->menu);
        $meal->price = $request->price;
        $meal->save();
        $meal->items()->attach($request->menu);
        if($request->hasFile('file')){
            $this->uploadMedia($request,$meal->id,get_class($meal));
        }
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

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
