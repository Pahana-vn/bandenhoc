@extends('frontend.layoutFE')
@section('contentFE')
<?php
if(!empty(Session::get("cart"))){
?>

 <!-- breadcrumb start -->
  <div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="{{route('fe.home')}}">Home</a></li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>cart</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<div class="cart-page mt-100">
    <div class="container">
        <div class="cart-page-wrapper">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-12">
                    <table class="cart-table w-100">
                        <thead>
                          <tr>
                            <th class="cart-caption heading_18">Product</th>
                            <th class="cart-caption heading_18"></th>
                            <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                            <th class="cart-caption text-end heading_18">Price</th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php
                        $Subtotal=0; $total=0; $originalPrice = 0; $discount = 0; $finalPrice = 0;
                         foreach(Session::get("cart") as $item ) {
                            ?>
                            <tr class="cart-item">
                              <td class="cart-item-media">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="{{asset('public/file')}}/image/{{$item['image']}}" alt="img">
                                </div>
                              </td>
                              <td class="cart-item-details">
                                <h2 class="product-title"><a href="#">{{$item['name']}}</a></h2>
                                <p class="product-vendor">XS / Dove Gray</p>
                              </td>
                              <td class="cart-item-quantity">
                                <div class="quantity d-flex align-items-center justify-content-between">
                                    <input style="width: 100px" onchange="updatecart(this)" class="" type="number" name="qty" data-id="{{$item['id']}}" value="{{$item['soluong']}}" min="0">
                                </div>
                                <a href="{{route('fe.delcart',$item['id'])}}" class="product-remove mt-2">Remove</a>
                              </td>
                              <td class="cart-item-price text-end">
                                <div class="product-price">${{$item['price']*$item['soluong']}}</div>
                              </td>
                            </tr>

                            <?php
                        // $Subtotal=$Subtotal+$item['soluong']*$item['price'];
                        $originalPrice = $originalPrice + $item['price'] * $item['soluong']; // Tính giá gốc
                        $discount = $originalPrice * ($item['discount'] / 100); // Tính số tiền được giảm giá
                        $finalPrice = $originalPrice - $discount; // Tính giá sau khi giảm giá
                        } ?>
                        </tbody>
                      </table>
                </div>
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="cart-total-area">
                        <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h4>
                        <div class="cart-total-box mt-4">
                            <div class="subtotal-item subtotal-box">
                                <h4 class="subtotal-title">Subtotals:</h4>
                                <p class="subtotal-value">${{$originalPrice}}</p>
                            </div>
                            <div class="subtotal-item shipping-box">
                                <h4 class="subtotal-title">Shipping:</h4>
                                <p class="subtotal-value">$10.00</p>
                            </div>
                            <div class="subtotal-item discount-box">
                                <h4 class="subtotal-title">Discount:</h4>
                                <p class="subtotal-value">-${{$discount}}</p>
                            </div>
                            <hr />
                            <div class="subtotal-item discount-box">
                                <h4 class="subtotal-title">Total:</h4>
                                <p class="subtotal-value">${{$originalPrice - $discount + 10}}</p>
                            </div>
                            <p class="shipping_text">Shipping & taxes calculated at checkout</p>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{route('fe.checkout')}}" class="position-relative btn-primary text-uppercase">
                                    Procced to checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}else {
    echo "<h1>Giỏ hang trống</h1>";
}
?>
@endsection
@pushOnce('scripts')
    <script>
        function updatecart(row){
            var id=$(row).data('id');
            var soluong=$(row).val();
            $.ajax({
                url: "{{route('fe.addcart')}}",
                type:'post',
                data: {
                    'id':id,
                    'soluong': soluong,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(message){
                    if(message){
                        location.reload();
                    }else{
                        alert("update to cart failed!");
                        location.reload();
                    }
                }
            });
        }
    </script>
@endPushOnce
