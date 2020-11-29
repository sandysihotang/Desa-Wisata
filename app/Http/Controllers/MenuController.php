<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buatMenu(Request $request)
    {
        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->judul_halaman = $request->judul_halaman;
        $menu->mempunyai_sub_menu = $request->is_sub_menu;
        $menu->isi_halaman = $request->isi_halaman;
        $menu->save();

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function getMenu($id)
    {
        $menu = Menu::find($id);
        return response()->json($menu);
    }

    public function getIsiSubMenu($id)
    {
        $menu = SubMenu::find($id);
        return response()->json($menu);
    }

    public function getSubMenu($id)
    {
        $subMenu = SubMenu::find($id);
        return response()->json($subMenu);
    }


    public function index()
    {
        $menu = Menu::paginate(10);
        return view('admin.tambah-menu', compact('menu'));
    }

    public function tambahSubMenu()
    {
        return view('admin.admin-tambah-submenu');
    }

    public function deleteSubMenu($id)
    {
        $subMenu = SubMenu::find($id);
        $subMenu->delete();
        return redirect()->back();
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        if ($menu->mempunyai_sub_menu == 1) {
            SubMenu::where('menu_id', '=', $menu->id_menu)->delete();
        }
        $menu->delete();
        return redirect()->back();
    }

    public function tambahSubMenuSave(Request $request, $id)
    {
        $subMenu = new SubMenu();
        $subMenu->nama_submenu = $request->nama_menu;
        $subMenu->judul_halaman = $request->judul_halaman;
        $subMenu->isi_halaman = $request->isi_halaman;
        $subMenu->menu_id = $id;
        $subMenu->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function updateSubMenuSave(Request $request, $id)
    {
        $subMenu = SubMenu::find($id);
        $subMenu->nama_submenu = $request->nama_menu;
        $subMenu->judul_halaman = $request->judul_halaman;
        $subMenu->isi_halaman = $request->isi_halaman;
        $subMenu->save();
        return response()->json([
            'id' => $subMenu->menu_id,
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function updateMenuSave(Request $request, $id)
    {
        $subMenu = Menu::find($id);
        $subMenu->nama_menu = $request->nama_menu;
        $subMenu->judul_halaman = $request->judul_halaman;
        $subMenu->isi_halaman = $request->isi_halaman;
        $subMenu->save();
        return response()->json([
            'id' => $subMenu->menu_id,
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function indexSubMenu($id)
    {
        $subMenu = SubMenu::where('menu_id', '=', $id)->paginate(10);
        $menu = Menu::find($id);
        return view('admin.tambah-submenu', compact('menu', 'subMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
