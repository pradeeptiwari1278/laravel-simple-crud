@extends('products.layout')

@section('title', 'Edit Product')

@section('content')

@if($errors->any())
    <div style="color: red; margin-bottom: 16px;">
        <ul>
            @foreach($errors->all() as $error)
                <li class="form-error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" required>

    <label>Description:</label>
    <textarea name="description">{{ old('description', $product->description) }}</textarea>

    <label>Price (₹):</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>

    <label>Current Image:</label><br>
    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
    @else
        <p>No image uploaded.</p>
    @endif

    <br><br>
    <label>Change Image:</label>
    <input type="file" name="image">

    <button class="btn">Update Product</button>
</form>

<a href="{{ route('products.index') }}" class="btn" style="margin-top: 20px;">← Back to Product List</a>

@endsection
