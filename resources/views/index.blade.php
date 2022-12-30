@extends('layouts.master')

@section('title', __('main.title'))

@section('content')
    <h1>@lang('main.all_products')</h1>
    
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
    {{ $products->links() }}
@endsection
