<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all(); 
    
        return view('products.index', ['pizzas' => $pizzas]);
    }
    public function create()
    {
        $units = Unit::all();

        $ingredients = Ingredient::all();
    
        return view('products.create', ['units' => $units, 'ingredients' => $ingredients]);


        
    }
    public function storeUnit(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric',
            'unit' => 'required|in:g,stuks',
        ]);

        $unit = new Unit([
            'quantity' => $request->input('quantity'),
            'unit' => $request->input('unit'),
        ]);

        $unit->save();

        return redirect()->route('products.create');
    }
    public function storeIngredient(Request $request)
    {
        $request->validate([
            'ingredient-naam' => 'required|string',
            'unit' => 'required|string', 
            'prijs' => 'required|numeric',
        ]);
    
        $ingredient = new Ingredient([
            'ingredient-naam' => $request->input('ingredient-naam'),
            'unit_id' => $request->input('unit'),
            'prijs' => $request->input('prijs'),
        ]);
    
        $ingredient->save();
    
        return redirect()->route('products.create');
    }

    public function storePizza(Request $request)
    {
        $request->validate([
            'pizza-naam' => 'required|string',
            'plaatje' => 'required|url',
            'ingredient' => 'required|array', // Verander naar 'ingredient' in plaats van 'ingredient-naam'
            'ingredient.*' => 'exists:ingredients,id', // Controleer of elk ingrediënt bestaat
        ]);
    
        $pizza = new Pizza([
            'pizza_naam' => $request->input('pizza-naam'),
            'plaatje' => $request->input('plaatje'),
        ]);
    
        $pizza->save();
    
        // Attach ingrediënten aan de pizza
        $pizza->ingredients()->attach($request->input('ingredient'));
    
        return redirect()->route('products.create');
    }
}

