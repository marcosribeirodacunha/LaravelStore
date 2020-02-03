@extends('layouts.admin')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.products.index') }}">
                    Products
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="text-center">
        <div class="d-flex align-items-center justify-content-center">
            <h1>{{ $product->name }}</h1>

            <div class="actions ml-5">
                <a href="{{ route('admin.products.edit', $product->slug) }}"
                   class="btn btn-success btn-sm">
                    <i class="fas fa-pen"></i>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#deleteModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <hr>
        <p><strong>Price (R$):</strong> {{ str_replace('.', ',', $product->price) }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p><strong>Description:</strong> {{ $product->description ? $product->description : 'No description' }}</p>
        <p><strong>Stock:</strong> {{ $product->units_in_stock }}</p>
        <p>
            <strong>Active:</strong>
            @if($product->active)
                <i class="fas fa-dot-circle text-success"></i>
            @else
                @if($product->units_in_stock == 0)
                    <i class="fas fa-dot-circle text-danger"></i>
                @else
                    <i class="fas fa-dot-circle text-warning"></i>
                @endif
            @endif
        </p>
        <p><strong>Creation date:</strong> {{ $product->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Updated date:</strong> {{ $product->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>

    <div class="d-flex flex-column">
        <h6>Caption:</h6>
        <small>
            <i class="fas fa-dot-circle text-success"></i>: With stock and active
        </small>
        <small>
            <i class="fas fa-dot-circle text-warning"></i>: With stock but does not active
        </small>
        <small>
            <i class="fas fa-dot-circle text-danger"></i>: Without stock or does not active
        </small>
    </div>
@endsection

@section('modal')
    <!-- Delete modal -->
    @component('admin.components.delete-modal')
        @slot('target')
            deleteModal
        @endslot

        @slot('title')
            Are you sure you want to delete this product?
        @endslot

        @slot('content')
            <P>{{ $product->name . ' - R$' . $product->price }}</P>
            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endslot
    @endcomponent
@endsection
