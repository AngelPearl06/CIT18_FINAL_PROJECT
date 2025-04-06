<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use App\Models\Category;
use Illuminate\Http\Request;

class DessertController extends Controller
{
    //
    public function index()
    {
        $desserts = Dessert::with('category')->get();
        return view('desserts.index', compact('desserts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('desserts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
    }

    public function edit(Dessert $dessert)
    {
        $categories = Category::all();
        return view('desserts.edit', compact('desserts', 'categories'));
    }

    public function update(Request $request, Dessert $dessert)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $dessert->update($request->all());
        return redirect()->route('desserts.index');
    }

    public function destroy(Dessert $dessert)
    {
        $dessert->delete();
        return redirect()->route('desserts.index');
    }

}
