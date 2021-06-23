<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\MediaManagementTrait;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use MediaManagementTrait;
    /*** FRONTEND.*/
    public function profile(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        if($request->filled("name")) $user->name = $request->name;
        if($request->filled("phone")) $user->phone = $request->phone;
        if($request->filled("birthday")) $user->birthday = $request->birthday;
        if($request->filled("anniversary")) $user->wedding_anniversary = $request->anniversary;
        $user->save();
        if($request->hasFile('file') || $request->link){
            $this->uploadMedia($request,$user->id,get_class($user));
        }
        return redirect()->back();
    }

    public function password(Request $request)
    {
        dd($request->all());
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required|string',
            'password' => 'required','string','confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with(['flash_type' => 'danger','flash_msg'=>'Something went wrong']);
        }
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            // $user->notify(new UserChangesNotification('password'));
            return redirect()->back()->with(['flash_type' => 'success','flash_msg'=>'Password changed successfully']); //with success
        }
        else return redirect()->back()->withErrors(['oldpassword' => 'Your old password is wrong'])->with(['flash_type' => 'danger','flash_msg'=>'Something went wrong']);

    }

    public function addresses(Request $request)
    {
        $user = Auth::user();
        foreach($user->addresses as $place){
            $place->delete();
        }
        for($i = 0; $i < count($request->address); $i++){
            $location = new Address;
            $location->user_id = $user->id;
            $location->address = $request->address[$i];
            $location->town_id = $request->town_id[$i];
            $location->city_id = \App\Town::where('id',$request->town_id[$i])->first()->city_id;
            $location->state_id = $request->state_id[$i];
            $location->status = (array_key_exists($i, $request->status))?true:false;
            $location->save();
        }
        return redirect()->back();
        //
    }

    /**
     * BACKEND.
     *
     */
    public function list()
    {
        $users = User::all();
        return view('backend.users.list',compact('users'));
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

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    


}
