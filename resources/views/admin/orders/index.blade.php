

@extends('layouts.app')

@section('content')
    <h1>Admin Orders</h1>

    @foreach ($orders as $order)
        <div>
            <p>Order ID: {{ $order->id }}</p>
            <p>Status: {{ $order->status }}</p>

            <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="post">
    @csrf
    @method('patch')

    <label for="status">Update Status:</label>
    <select name="status" id="status">
        <option value="pending">Pending</option>
        <option value="processing">bereiden</option>
        <option value="completed">Te bezorgen</option>
        <option value="canceled">Geleverd</option>
    </select>

    <button type="submit">Update Status</button>
</form>
        </div>
    @endforeach
@endsection