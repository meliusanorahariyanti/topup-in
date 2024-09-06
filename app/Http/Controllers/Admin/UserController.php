<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Users';
        $arrays = User::with('role')->get();
        return view('admin.users.index', compact([
            'title',
            'arrays'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Users';
        $roles = Role::all();
        return view('admin.users.create', compact([
            'title',
            'roles'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
            'role_id' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect('/admin/user')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Users';
        $arrays = User::where('id', $id)->first();
        return view('admin.users.show', compact([
            'title',
            'arrays'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Users';
        $roles = Role::all();
        $arrays = User::where('id', $id)->first();
        return view('admin.users.edit', compact([
            'title',
            'arrays',
            'roles'
        ]));
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
        $request->validate([
            'name' => 'required|string',
            'role_id' => 'required'
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);

        return redirect('/admin/user')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin/user')->with('success', 'Data berhasil dihapus!');
    }

    public function change_password(){
        $title = 'Change Password';
        return view('admin.home.change_password', compact([
            'title'
        ]));
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/admin/user/change_password')->with('success', 'Password successfully changed');
    }

    public function update_profile(Request $request){
        // ddd($request->all());
        $request->validate([
            'name' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image_name = null;
        if(auth()->user()->photo && file_exists(storage_path('app/public/'. auth()->user()->photo))){
            Storage::delete(['public/', auth()->user()->photo]);
        }
        
        if($request->photo != null){
            $image_name = $request->file('photo')->store('profile', 'public');
        }

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $request->name,
                'photo' => ($image_name == null) ? auth()->user()->photo : $image_name
            ]);
        
        return redirect()->to('/admin/home')
                         ->with('success', 'Profile successfully changed at '. Carbon::now());
    }
}