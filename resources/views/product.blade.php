@extends('layouts.master')

@section('title', __('main.product'))

@section('content')
    <h1>{{ $product->name }}</h1>
    <h2>
        @foreach ($product->categories as $category)
            @if ($category != last(last($product->categories)))
                {{ $category->name }}, 
            @else
                {{ $category->name }}
            @endif
        @endforeach
    </h2>
    <p>@lang('product.price'): <b>{{ $product->price }} руб.</b></p>
    <div class="row">
        @foreach ($product->images as $image)
            <div class="col-lg-3 col-md-3 col-xs-3 thumb">
                <img class="thumbnail" style="width:70%; height:70%" src="{{ Storage::url($image->image) }}">
            </div>
        @endforeach
    </div>
    <p>{{ $product->__('description') }}</p>

    @if($product->isAvailable())
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">@lang('product.add_to_cart')</button>
            @csrf
        </form>
        <span>Остаток: {{ $product->count }}</span>
    @else

        <span>@lang('product.not_available')</span>
        <br>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
    @endif
@endsection
