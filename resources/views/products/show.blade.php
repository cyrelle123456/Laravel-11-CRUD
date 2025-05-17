@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">
 <div class="float-start">
 Product Information
 </div>
 <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
 </div>
 </div>
 <div class="card-body">
 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Code:</strong></label>
                            <div class="col-md-6">
 {{ $product->code }}
 </div>
 </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                            <div class="col-md-6">
 {{ $product->name }}
 </div>
 </div>
                        <div class="mb-3 row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label>
                            <div class="col-md-6">
 {{ $product->quantity }}
 </div>
 </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                            <div class="col-md-6">
 {{ $product->price }}
 </div>
 </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                            <div class="col-md-6">
 {{ $product->description }}
 </div>
 </div>
                    </div>
                    <div class="col-md-6">
                        @if($product->image)
                        <div class="text-center">
                            <img src="{{ $product->image_url }}" alt="Product Image" class="img-fluid rounded" style="max-width: 100%; height: auto; max-height: 300px; object-fit: contain;">
                        </div>
                        @else
                        <div class="text-center">
                            <p class="text-muted">No image available</p>
                        </div>
                        @endif
                    </div>
                </div>
 </div>
 </div>
 </div> 
</div>
@endsection
