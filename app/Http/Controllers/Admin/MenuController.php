<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Menus = Menu::all();

                return view('admin.menus.index',compact('Menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = Category::all();
        $Menus = Menu::all();

        return view('admin.menus.create',compact('Categories','Menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');
        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);
        if($request->has('Categories')){
            $menu->Categories()->attach($request->Categories);
        }
        return to_route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)

    {
        $Categories = Category::all();

        return view('admin.menus.edit',compact('menu','Categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
