<div class="offcanvas-header border-btm-black">
    <h5 class="cart-drawer-heading text_16">Your Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
        aria-label="Close"></button>
</div>
<div class="offcanvas-body p-0">
    <div class="cart-content-area d-flex justify-content-between flex-column">
        <div class="minicart-loop custom-scrollbar">
            <!-- minicart item -->
            <?php
            $Subtotal=0; $total=0; $originalPrice = 0; $discount = 0; $finalPrice = 0;
            if (!empty($cart) && is_array($cart))
            foreach ($cart as $item) {
                ?>

            <div class="minicart-item d-flex">
                <div class="mini-img-wrapper">
                    <img class="mini-img" src="{{asset('public/file')}}/image/{{$item['image']}}" alt="img">
                </div>
                <div class="product-info">
                    <h2 class="product-title"><a href="#">{{$item['name']}} </a></h2>
                    <p class="product-vendor">XS / Dove Gray</p>
                    <div class="misc d-flex align-items-end justify-content-between">
                        <div class="quantity d-flex align-items-center justify-content-between">
                            <input style="width: 100px" onchange="updatecart(this)" class="" type="number" name="qty" data-id="{{$item['id']}}" value="{{$item['soluong']}}" min="0">
                        </div>
                        <div class="product-remove-area d-flex flex-column align-items-end">
                            <div class="product-price">${{$item['price']}}</div>
                            <a href="{{route('fe.delcart',$item['id'])}}" class="product-remove">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $originalPrice = $originalPrice + $item['price'] * $item['soluong']; // Tính giá gốc
                        $discount = $originalPrice * ($item['discount'] / 100); // Tính số tiền được giảm giá
                        $finalPrice = $originalPrice - $discount; // Tính giá sau khi giảm giá
            } ?>


        </div>
        <div class="minicart-footer">
            <div class="minicart-calc-area">
                <div class="minicart-calc d-flex align-items-center justify-content-between">
                    <span class="cart-subtotal mb-0">Subtotal</span>
                    <span class="cart-subprice">${{$originalPrice}}</span>
                </div>
                <p class="cart-taxes text-center my-4">Taxes and shipping will be calculated at checkout.
                </p>
            </div>
            <div class="minicart-btn-area d-flex align-items-center justify-content-between">
                <a href="{{route('fe.cart')}}" class="minicart-btn btn-secondary">View Cart</a>
                <a href="{{route('fe.checkout')}}" class="minicart-btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
    <div class="cart-empty-area text-center py-5 d-none">
        <div class="cart-empty-icon pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                >
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                <line x1="15" y1="9" x2="15.01" y2="9"></line>
            </svg>
        </div>
        <p class="cart-empty">You have no items in your cart</p>
    </div>
</div>

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
