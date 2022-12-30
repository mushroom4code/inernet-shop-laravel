<div class="col-md-4" >
    <div class="thumbnail">
        <img style="width: 200px; height: 200px" src="{{ Storage::url($product->images[0]->image) }}" alt="{{ $product->__('name') }}">
        <div class="caption">
            <h3>{{ $product->__('name') }}</h3>
            <p>{{ $product->price }} руб.</p>
            <p>
            <form action="{{ route('basket-add', $product) }}" method="POST">
                @if($product->isAvailable())
                    <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
                @else
                    @lang('main.not_available')
                @endif
                @isset($product->categories[0])
                    <a href="{{ route('product',
                        [$product->categories[0]->code, $product->code, $product]) }}"
                        class="btn btn-default"
                        role="button">@lang('main.more')</a>
                    @csrf
                @endisset
            </form>
            </p>
        </div>
    </div>
</div>
