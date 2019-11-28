<?php

namespace App\Http\Controllers;

use App\Bidan;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserRequest;
use File;

class BidanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bidan'] = User::role('bidan')->get();

        return view('bidan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::pluck('name', 'name');

        return view('bidan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->except('roles');
        $roles = $request->roles;

        if ($request->file('image')) {
            $destinationPath = public_path('upload/foto/');
            $fileName = time() . '-' . str_slug($request->name) .'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $requestData['image'] = $fileName;
        }else {
            if ($request->jk == 'Laki-Laki') {
                $requestData['image'] = 'cowo.png';
            }else {
                $requestData['image'] = 'cewe.png';
            }
        }
        
        $bidan = User::create($requestData);
        $bidan->assignRole($roles);
        $bidan->bidan()->create($requestData);

        return redirect()->route('bidan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['bidan'] = User::findOrFail($id);

        return view('bidan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['bidan'] = User::findOrFail($id);
        $data['roles'] = Role::pluck('name', 'name');

        return view('bidan.edit', $data);
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
        $requestData = $request->except('roles','password');
        $roles = $request->roles;
        
        $bidan = User::findOrFail($id);

        if ($request->file('image')) {
            $this->delete_image($bidan->image);
            
            $destinationPath = public_path('upload/foto/');
            $fileName = time() . '-' . str_slug($request->name) .'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $requestData['image'] = $fileName;
        }else {
            if ($request->jk == 'Laki-Laki') {
                $requestData['image'] = 'cowo.png';
            }else {
                $requestData['image'] = 'cewe.png';
            }
        }

        $bidan->update($requestData);
        $bidan->syncRoles($roles);
        $bidan->bidan()->update($request->except('_method', '_token', 'jk', 'roles', 'name', 'email', 'image', 'password','kode_bidan'));

        return redirect()->route('bidan.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bidan = User::find($id);
        $bidan->delete();
        $this->delete_image($bidan->image);

        return redirect()->route('bidan.index');
    }

    public function delete_image($value='')
    {
        $image_path = public_path('upload/foto/'. $value);

        if (File::exists($image_path) && $value != 'cowo.png') {
            File::delete($image_path);
        }
        if (File::exists($image_path) && $value != 'cewe.png') {
            File::delete($image_path);
        }
    }
}

