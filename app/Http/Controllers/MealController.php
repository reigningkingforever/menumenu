<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
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
        $meals = Meal::all();
        return view('backend.meal.create',compact('meals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
