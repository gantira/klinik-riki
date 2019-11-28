<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserRequest;
use File;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dokter'] = User::role('dokter')->get();

        return view('dokter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::pluck('name', 'name');

        return view('dokter.create', $data);
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
        
        $dokter = User::create($requestData);
        $dokter->assignRole($roles);
        $dokter->dokter()->create($requestData);

        return redirect()->route('dokter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['dokter'] = User::findOrFail($id);

        return view('dokter.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['dokter'] = User::findOrFail($id);
        $data['roles'] = Role::pluck('name', 'name');

        return view('dokter.edit', $data);
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
        
        $dokter = User::findOrFail($id);

        if ($request->file('image')) {
            $this->delete_image($dokter->image);
            
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

        $dokter->update($requestData);
        $dokter->syncRoles($roles);
        $dokter->dokter()->update($request->except('_method', '_token', 'jk', 'roles', 'name', 'email', 'image', 'password','kode_dokter'));

        return redirect()->route('dokter.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = User::find($id);
        $dokter->delete();
        $this->delete_image($dokter->image);

        return redirect()->route('dokter.index');
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
