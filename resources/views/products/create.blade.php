@extends('products.layout')

@section('title', 'Create Product')

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

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label>Description:</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <label>Price (₹):</label>
    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>

    <label>Product Image:</label>
    <input type="file" name="image">

    <button class="btn">Create Product</button>
</form>

<a href="{{ route('products.index') }}" class="btn" style="margin-top: 20px;">← Back to Product List</a>

@endsection
