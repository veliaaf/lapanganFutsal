<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OwnerList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owners = Owner::all();
        return view('backend.admin.manage_owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try{
            return view('backend.admin.manage_owner.create');
        } catch(\Exception $e) {
            return redirect()->back();
        }
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
        try{
            $request->validate([
                'first_name' => 'required|string|max:40',
                'last_name' => 'required|string|max:40',
                'email' => 'required|string|max:255|email',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8'
            ]);

            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $owner = new Owner;
            $owner->first_name = $request->first_name;
            $owner->last_name = $request->last_name;
            $owner->handphone = $request->handphone;
            $owner->address = $request->address;
            $owner->user_id = $user->id;
            $owner->save();

            return redirect()->route('admin.owner.index')->with('success', __('toast.create.success.message'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error', __('toast.create.failed.message'));
        }
        
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
        try{
            $owner = Owner::find($id);
            return view('backend.admin.manage_owner.edit', compact('owner'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
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
        try{
            
            $owner = Owner::find($id);
            $owner->first_name = $request->first_name;
            $owner->last_name = $request->last_name;
            $owner->handphone = $request->handphone;
            $owner->address = $request->address;
            
            $owner->save();

            return redirect()->route('admin.owner.index')->with('success', __('toast.update.success.message'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('toast.update.failed.message'));
        }
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
        
        try{
            $owners = Owner::find($id);
            $owners->delete();
            return redirect()->back()->with('success', __('toast.delete.success.message'));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('success', __('toast.delete.failed.message'));
        }

    }
    public function getData(Request $request)
    {
        $data = [];
        if($request->data=="all"){
            $data = Owner::orderby('id','desc')->get();
        }
        elseif($request->data=="id"){
            $data = Owner::find($request->id);
        }
        elseif($request->data=="select"){
            $id = explode(',',$request->id);
            $data = Owner::wherenotin('id', $id)->get();
        }

        if($data)return response()->json(OwnerList::collection($data));
        return $data;
    }
}
