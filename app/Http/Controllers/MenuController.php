<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\SubSubMenu;

class MenuController extends Controller
{

    //Pengunjung (untuk menghitung jumlah pengunjung dan akses)
    public function viewMenu($id)
    {
        $data = Menu::find($id);

        visits('App\Models\Home')->increment();
        // visits($data)->increment();
        // $count = visits($data)->count();

        return view('menu');
    }

    public function viewSubMenu($id)
    {
        $data = SubMenu::find($id);

        visits('App\Models\Home')->increment();
        // visits($data)->increment();
        // $count = visits($data)->count();

        return view('sub-menu');
    }

    public function viewSubSubMenu($id)
    {
        $data = SubSubMenu::find($id);

        visits('App\Models\Home')->increment();
        // visits($data)->increment();
        // $count = visits($data)->count();

        return view('sub-sub-menu');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::sortable()->paginate(10);
        return view('admin.tambah-menu', compact('menu'));
    }

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

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        if ($menu->mempunyai_sub_menu == 1) {
            SubMenu::where('menu_id', '=', $menu->id_menu)->delete();
        }
        $menu->delete();
        return redirect()->back();
    }

    public function indexSubMenu($id)
    {
        $subMenu = SubMenu::where('menu_id', '=', $id)->sortable()->paginate(10);
        $menu = Menu::find($id);
        return view('admin.tambah-submenu', compact('menu', 'subMenu'));
    }

    public function tambahSubMenu()
    {
        return view('admin.admin-tambah-submenu');
    }

    public function tambahSubMenuSave(Request $request, $id)
    {
        $subMenu = new SubMenu();
        $subMenu->nama_submenu = $request->nama_menu;
        $subMenu->judul_halaman = $request->judul_halaman;
        $subMenu->isi_halaman = $request->isi_halaman != null?$request->isi_halaman: '';
        $subMenu->menu_id = $id;
        $subMenu->mempunyai_sub_menu = $request->is_sub_menu;
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

    public function deleteSubMenu($id)
    {
        $subMenu = SubMenu::find($id);
        $subMenu->delete();
        return redirect()->back();
    }

    public function indexSubSubMenu($id)
    {
        $subsubMenu = SubSubMenu::where('sub_menu_id', '=', $id)->sortable()->paginate(10);
        $subMenu = SubMenu::find($id);
        $menu = Menu::where('id_menu', '=', $subMenu->menu_id)->first();
        // dd($menu->id_menu);
        return view('admin.tambah-subsubmenu', compact('menu', 'subMenu', 'subsubMenu'));
    }

    public function tambahSubSubMenu()
    {
        return view('admin.admin-tambah-subsubmenu');
    }

    public function tambahSubSubMenuSave(Request $request, $id)
    {
        $subMenu = new SubSubMenu();
        $subMenu->nama_sub_submenu = $request->nama_menu;
        $subMenu->judul_halaman = $request->judul_halaman;
        $subMenu->isi_halaman = $request->isi_halaman;
        $subMenu->sub_menu_id = $id;
        $subMenu->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function updateSubSubMenuSave(Request $request, $id)
    {
        $subMenu = SubSubMenu::find($id);
        $subMenu->nama_sub_submenu = $request->nama_menu;
        $subMenu->judul_halaman = $request->judul_halaman;
        $subMenu->isi_halaman = $request->isi_halaman;
        $subMenu->save();
        return response()->json([
            'id' => $subMenu->sub_menu_id,
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function deleteSubSubMenu($id)
    {
        $subMenu = SubSubMenu::find($id);
        $subMenu->delete();
        return redirect()->back();
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

    public function getIsiSubSubMenu($id)
    {
        $menu = SubSubMenu::find($id);
        return response()->json($menu);
    }

    public function getSubSubMenu($id)
    {
        $subMenu = SubSubMenu::find($id);
        return response()->json($subMenu);
    }
}
