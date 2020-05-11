<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_inventories = \App\Inventory::all();
        return view('inventory.index',['list_inventories' => $list_inventories]);
    }

    public function detail($id)
    {
        $inventory_item = \App\Inventory::find($id);
        return view('inventory.detail',['inventory_item' => $inventory_item]);
    }

    public function create(Request $request){
        \App\Inventory::create($request->all());
        return redirect('/inventories')->with('success','New Item Successfully added.');
    }

    public function edit ($id){
        $item = \App\Inventory::find($id);
        return view('inventory.edit',['item' => $item ]);
    }

    public function update (Request $request, $id){
        $item = \App\Inventory::find($id);
        $item -> update($request->all());
        return redirect('/inventories')->with('success','Item successfully updated.');
    }

    public function delete ($id){
        $item = \App\Inventory::find($id);
        $item -> delete($item);
        return redirect('/inventories')->with('success','Item has been deleted.');
    }
}
