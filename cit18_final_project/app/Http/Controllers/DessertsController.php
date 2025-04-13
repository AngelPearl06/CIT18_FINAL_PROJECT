<?php

namespace App\Http\Controllers;

use App\Models\DessertModel;

use Illuminate\Http\Request;

class DessertsController extends Controller
{
    /**
     * Show all items in the desserts.
     */
    public function index()
    {
        $dessertstore = DessertModel::all();
        return view('desserts.index', compact('dessertstore'));
    }

    /**
     * Show the form to add a new item.
     */
    public function create()
    {
        return view('desserts.create');
    }

    /**
     * Save the new item into the desserts.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'category' => 'required|string|min:3',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        DessertModel::create($validated);

        return redirect(env('APP_URL') . '/desserts')
            ->with('success', 'Item added successfully.');
    }

    /**
     * Show the form to edit an existing item.
     */
    public function show(string $id)
    {
        $dessertstores = DessertModel::find($id);

        if (!$dessertstores) {
            return redirect(env('APP_URL') . '/desserts')
                ->with('error', 'Item not found.');
        }

        return view('desserts.edit', compact('dessertstores'));
    }

    /**
     * Update an existing item in the desserts.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'category' => 'required|string|min:3',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $dessertstores = DessertModel::find($id);

        if (!$dessertstores) {
            return redirect(env('APP_URL') . '/desserts')
                ->with('error', 'Item not found.');
        }

        $dessertstores->update($validated);

        return redirect(env('APP_URL') . '/desserts')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Delete an item from the desserts.
     */
    public function destroy(string $id)
    {
        $dessertstores = DessertModel::find($id);

        if (!$dessertstores) {
            return redirect(env('APP_URL') . '/desserts')
                ->with('error', 'Item not found');
        }

        $dessertstores->delete();

        return redirect(env('APP_URL') . '/desserts')
            ->with('success', 'Item deleted successfully.');
    }
}
