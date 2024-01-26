<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


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
            'ingredient' => 'required|array',
            'ingredient.*' => 'exists:ingredients,id',
        ]);
    
        $pizza = new Pizza([
            'pizza_naam' => $request->input('pizza-naam'),
            'plaatje' => $request->input('plaatje'),
        ]);
    
        $pizza->save();
    

        $pizza->ingredients()->attach($request->input('ingredient'));
    
        $totalPrice = $pizza->calculatePrice();
        $pizza->update(['prijs' => $totalPrice]);

        return redirect()->route('products.create');

        }

        public function show($id)
{
    $pizza = Pizza::findOrFail($id);

    return view('products.show', ['pizza' => $pizza]);
}
public function addToCart(Request $request, $id)
{
    $pizza = Pizza::findOrFail($id);

 
    $cartItem = new Cart([
        'user_id' => auth()->id(),
        'pizza_id' => $pizza->id,
        'quantity' => 1,
        'total_price' => $pizza->calculatePrice(), 

    ]);

    $cartItem->save();

    return redirect()->route('cart.index')->with('success', 'Pizza is toegevoegd aan de winkelwagen.');
}



public function cart()
{
    $user_id = auth()->id(); 
    $cartItems = Cart::where('user_id', $user_id)->get();

    return view('cart.index', ['cartItems' => $cartItems]);
}

public function removeItem($id)
{
    $cartItem = Cart::findOrFail($id);
    $cartItem->delete();

    return redirect()->route('cart.index')->with('success', 'Item succesvol verwijderd');
}
public function clearCart()
{
    $user_id = auth()->id();
    Cart::where('user_id', $user_id)->delete();

    return redirect()->route('cart.index')->with('success', 'Je bestelling is geplaatst.');
}


public function checkout()
{
    $user_id = auth()->id();
    $cartItems = Cart::where('user_id', $user_id)->get();


    foreach ($cartItems as $cartItem) {
        Order::create([
            'user_id' => $cartItem->user_id,
            'pizza_id' => $cartItem->pizza_id,
            'quantity' => $cartItem->quantity,
            'total_price' => $cartItem->total_price,
        ]);
    }

    Cart::where('user_id', $user_id)->delete();

    return redirect()->route('cart.index')->with('success', 'Bestelling geplaatst');
}
public function editUnit($id)
{
    $unit = Unit::findOrFail($id);
    return view('products.editUnit', ['unit' => $unit]);
}

public function editIngredient($id)
{
    $ingredient = Ingredient::findOrFail($id);
    $units = Unit::all();
    return view('products.editIngredient', ['ingredient' => $ingredient, 'units' => $units]);
}

public function editPizza($id)
{
    $pizza = Pizza::findOrFail($id);
    $ingredients = Ingredient::all();
    return view('products.editPizza', ['pizza' => $pizza, 'ingredients' => $ingredients]);
}

public function updateUnit(Request $request, $id)
{
    $unit = Unit::findOrFail($id);


    $request->validate([
        'quantity' => 'required|numeric',
        'unit' => 'required|in:g,stuks',
    ]);

    $unit->update([
        'quantity' => $request->input('quantity'),
        'unit' => $request->input('unit'),
    ]);

    return redirect()->route('products.create')->with('success', 'Unit updated successfully');
}

public function updateIngredient(Request $request, $id)
{
    $ingredient = Ingredient::findOrFail($id);


    $request->validate([
        'ingredient-naam' => 'required|string',
        'unit' => 'required|string',
        'prijs' => 'required|numeric',
    ]);


    $ingredient->update([
        'ingredient-naam' => $request->input('ingredient-naam'),
        'unit_id' => $request->input('unit'),
        'prijs' => $request->input('prijs'),
    ]);

    return redirect()->route('products.create')->with('success', 'Ingredient updated successfully');
}

public function updatePizza(Request $request, $id)
{
    $pizza = Pizza::findOrFail($id);


    $request->validate([
        'pizza-naam' => 'required|string',
        'plaatje' => 'required|url',
        'ingredient' => 'required|array',
        'ingredient.*' => 'exists:ingredients,id',
    ]);


    $pizza->update([
        'pizza_naam' => $request->input('pizza-naam'),
        'plaatje' => $request->input('plaatje'),
    ]);

    $pizza->ingredients()->sync($request->input('ingredient'));


    $totalPrice = $pizza->calculatePrice();
    $pizza->update(['prijs' => $totalPrice]);

    return redirect()->route('products.create')->with('success', 'Pizza updated successfully');
}

public function removeUnit($id)
{
    $unit = Unit::findOrFail($id);
    $unit->delete();

    return redirect()->route('products.create')->with('success', 'Unit removed successfully');
}

public function removeIngredient($id)
{
    $ingredient = Ingredient::findOrFail($id);
    $ingredient->delete();

    return redirect()->route('products.create')->with('success', 'Ingredient removed successfully');
}

public function removePizza($id)
{
    $pizza = Pizza::findOrFail($id);
    $pizza->delete();

    return redirect()->route('products.create')->with('success', 'Pizza removed successfully');
}

public function home(){
    return redirect()->route('home');

}

}
