<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $jenisusers = JenisUser::all();
        $menus = Menu::all();
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        return view('admin.pages.dashboard', ['users'=>$users,'menus' => $menus,
            'assignedMenus' => $assignedMenus, 'jenisusers' => $jenisusers]);

    }


    // Menampilkan daftar makanan untuk user
    public function makanan()
    {
        $makanan = Makanan::all();
        return view('user.dashboard', compact('makanan'));
    }

    public function list()
    {
        $users = User::all();
        $jenisusers = JenisUser::all();
        $menus = Menu::all();
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        return view('admin.pages.userlist', ['users'=>$users,'menus' => $menus,
            'assignedMenus' => $assignedMenus, 'jenisusers' => $jenisusers]);

    }
    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenisuser_id' => $request->jenisuser_id,
            'status_user' => 'active',
            'create_by' => Auth::user()->username,
            'update_by' => Auth::user()->username,
        ]);

        return redirect()->back()->with('success', 'User successfully added!');
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $jenisusers = JenisUser::all();
        $menus = Menu::all();
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        return view('admin.pages.useredit', ['users'=>$users,'menus' => $menus,
            'assignedMenus' => $assignedMenus, 'jenisusers' => $jenisusers]);
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Update user details
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->jenisuser_id = $request->input('jenisuser_id');

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return redirect()->back()->with('success', 'User updated successfully.');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');

    }

}
