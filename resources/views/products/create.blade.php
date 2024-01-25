<section>
<div class="unit-part">
<form action="{{ route('products.storeUnit') }}" method="POST">
        @csrf
        @method('POST')
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity">

        <label for="unit">Unit:</label>
        <select name="unit" id="unit">
            <option value="g">g</option>
            <option value="stuks">stuks</option>
        </select>

        <input type="submit" value="Add Unit">
    </form>
</div>
<div class="ingredient-part">
    <form action="{{ route('products.storeIngredient') }}" method="POST">
        @csrf

        <label for="ingredient-naam">Ingredient Name:</label>
        <input type="text" name="ingredient-naam" id="ingredient-naam">
        <label for="unit">Unit:</label>
        <select name="unit" id="unit">
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->quantity }} {{ $unit->unit }} </option>
            @endforeach
        </select>

        <label for="prijs">Price:</label>
        <input type="number" name="prijs" id="prijs" step="0.01">

        <input type="submit" value="Add Ingredient">
    </form>
</div>
<div class="pizza-part">
<form action="{{ route('products.storePizza') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="pizza-naam">Pizza Name:</label>
        <input type="text" name="pizza-naam" id="pizza-naam">

        <label for="plaatje">Image:</label>
        <input type="text" name="plaatje" id="plaatje">

        <label for="ingredient">Ingredient:</label>

        


        <select name="ingredient" id="ingredient">
            @foreach ($ingredients as $ingredient)
            <option value="{{ $ingredient->id }}">{{ $ingredient->{'ingredient-naam'} }}</option>
            @endforeach
        </select>

        <input type="submit" value="Add Pizza">
    </form>
</div>
</section>