<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //type, size, diet, origin
    public function index(Request $request){
        if($q = $request->search){
            $menus = Menu::where('name','LIKE',"%$q%")->orWhere('description','LIKE',"%$q%")->get();
            $filter = ['itemtype'=>  ['food','drinks','fruits','pastries'],
                    'origin' => ['local','intercontinental','chinese','italian'],
                    'diet' => ['vegan','veg','nonveg'],
                    'size' => 'medium'
                    ];
        }
        else{
            $menus = Menu::whereIn('type',$request->itemtype)->where('size',$request->size)->whereIn('origin',$request->origin)->whereIn('diet',$request->diet)->get();
            $filter = ['itemtype'=> $request->itemtype,
                        'origin' => $request->origin, 
                        'diet' => $request->diet,
                        'size' => $request->size
                    ];
        }
        // dd($filter);
        return view('frontend.menu.list',compact('menus','filter'));
    }
    public function view(Menu $menu){
        return view('frontend.menu.list');
    }

    
    public function list()
    {
        $menus = Menu::all();
        return view('backend.menu.list',compact('menus'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
