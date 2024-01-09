<div class="row product">
    @foreach($lst as $p)
    <div class="col-md-3 boder">
        <a href="{{route('product-show',['product'=>$p])}}">
            <img class="productImage" src="{{$p->image[0]}}" alt="Image 1">
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


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">