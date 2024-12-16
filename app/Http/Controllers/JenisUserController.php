<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $menus = Menu::all();
        $jenisusers = JenisUser::with('menus')->get();
        $currentUserRole = Auth::user()->jenisuser_id;

        // Get the assigned menu IDs for the current user role
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();

        // Retrieve the assigned menus using the collected IDs
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();

        return view('admin.role.role', [
            'jenisusers' => $jenisusers,
            'users' => $users,
            'menus' => $menus,
            'assignedMenus' => $assignedMenus,
        ]);
    }

    public function store(Request $request)
    {

        JenisUser::create([
            'jenis_user' => $request->jenis_user,
            'create_by' => Auth::user()->name,
            'update_by' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'User successfully added!');
    }

    public function edit($id)
    {
        $users = User::all();
        $jenisusers = JenisUser::findOrFail($id);
        $menus = Menu::all();
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        $selectedMenusRole = $jenisusers->menus->pluck('id')->toArray();

        return view('admin.role.edit', [
            'users' => $users,
            'jenisusers' => $jenisusers,
            'menus' => $menus,
            'assignedMenus' => $assignedMenus,
            'selectedMenusRole' => $selectedMenusRole,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_user' => 'required|string|max:60',
            'menu_ids' => 'required|array',
        ]);

        $jenisusers = JenisUser::findOrFail($id);
        $jenisusers->update_by = Auth::user()->name;
        $jenisusers->jenis_user = $request->input('jenis_user');
        $jenisusers->save();

        // Sync the menus with the given menu IDs
        $jenisusers->menus()->sync($request->menu_ids);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function destroy($id)
{
    $jenisUsers = JenisUser::findOrFail($id);
    $jenisUsers->menus()->detach();
    $jenisUsers->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}
}
