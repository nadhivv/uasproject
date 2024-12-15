<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\JenisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class MenuController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $menus = Menu::all();
        $jenisusers = JenisUser::all();
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        return view('admin.menu.menu', ['menus'=>$menus, 'menu' => $menus,
            'assignedMenus' => $assignedMenus, 'jenisusers' => $jenisusers]);
    }

    public function edit($id)
    {
        $menus = Menu::findOrFail($id);
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        return view('admin.menu.edit', ['menus'=>$menus ,'assignedMenus' => $assignedMenus]);
    }

    public function update(Request $request, $id)
{
    $menus = Menu::findOrFail($id);

    // Update user details
    $menus->menu_name = $request->input('menu_name');
    $menus->menu_link = $request->input('menu_link');
    $menus->menu_icon = $request->input('menu_icon');

    $menus->save();

    return redirect()->back()->with('success', 'User updated successfully.');

    }


    public function destroy($id)
    {
        $menus = Menu::findOrFail($id);
        $menus->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');

    }

    public function store(Request $request)
    {

        Menu::create([
            'menu_name' => $request->menu_name,
            'menu_link' => $request->menu_link,
            'menu_icon' => $request->menu_icon,
            'id_level'  => $request->id_level ?? 1,
            'create_by' => Auth::user()->name,
            'update_by' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'User successfully added!');
    }

}

