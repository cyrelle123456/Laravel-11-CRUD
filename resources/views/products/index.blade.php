@extends('layouts.app')

@section('content')
<style>
    .products-table {
        width: 100%;
        min-width: 900px;
    }
    .products-table th, .products-table td {
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="container-fluid mt-3">
    @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
    @endsession
    <div class="card">
        <div class="card-header">Product List</div>
        <div class="card-body">
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered products-table">
                    <thead>
                        <tr>
                            <th scope="col">S#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                @if($product->image)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-height: 50px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a> 
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="7">
                            <span class="text-danger">
                                <strong>No Product Found!</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
