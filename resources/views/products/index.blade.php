@extends('products.layout')

@section('title', 'Product List')

@section('content')

@if(session('success'))
<div style="color: green; margin-bottom: 16px;">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('products.create') }}" class="btn">+ Create New Product</a>

@if($products->isEmpty())
<p>No products found.</p>
@else
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px; border: 1px solid #ddd;">#</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Image</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Description</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Price (₹)</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $index => $product)
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $product->name }}</td>
            <td style="padding: 10px; border: 1px solid #ddd;">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 60px;">
                @else
                N/A
                @endif
            </td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $product->description }}</td>
            <td style="padding: 10px; border: 1px solid #ddd;">₹{{ number_format($product->price, 2) }}</td>
            <td style="padding: 10px; border: 1px solid #ddd; white-space: nowrap;">
                <div style="display: flex; gap: 8px; align-items: center;">
                    <a href="{{ route('products.edit', $product) }}" class="btn">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<div style="margin-top: 20px;">
    {{ $products->links() }}
</div>
@endif

@endsection