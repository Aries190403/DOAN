{{-- <div class="row product">
    @foreach($lst as $p)
    <div class="col-md-3 boder">
        <a href="{{route('product-show',['product'=>$p])}}">
@if(isset($p->image[0]))
<img class="productImage" src="{{$p->image[0]}}" alt="Image 1">
@else
<img class="productImage" src="default_image_url" alt="Default Image">
@endif
<h4>{{ strlen($p->name) > 25 ? substr($p->name, 0, 25).'..' : $p->name }}</h4>
<p>{{ number_format($p->price, 0, ',', ',') }} đ</p><br>
</a><br>
<form action="{{ route('cart/add', ['product_id' => $p->id]) }}" method="GET" style="display: inline;">
    <button type="submit">
        <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
    </button>
</form>
</div>
@endforeach
</div>
</div>
<div style="justify-content: center;" class="pagination">
    {{ $lst->links() }}
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}
<div class="row isotope-grid">
    @foreach($products as $key => $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <a href="/product/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <span class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </span>

                        <span class="stext-105 cl3">
                            <p>{{ number_format($product->price, 0, ',', ',') }} đ</p><br>
                        </span>
        </a>
        <form action="{{ route('cart/add', ['product_id' => $product->id]) }}" method="GET" style="display: inline;">
            <button type="submit">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </form>
    </div>
</div>
</div>
</div>
@endforeach
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">