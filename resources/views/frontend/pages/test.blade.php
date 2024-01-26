code: nhiều hình
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                if(is_array(json_decode($sanpham->hinhkemtheo))){
                foreach (json_decode($sanpham->hinhkemtheo) as $keyhinh=>$sl) {
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$keyhinh}}" {{ $keyhinh == 0 ? 'class="active"' : '' }}></li>
                <?php }} ?>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php
                if(is_array(json_decode($sanpham->hinhkemtheo))){
                foreach (json_decode($sanpham->hinhkemtheo) as $keybig=>$hinhbg){
                ?>
                <div class="carousel-item {{ $keybig == 0 ? ' active' : '' }}">
                    <div class="middle">
                      <a data-fancybox="images" href="{{asset('public/upload/sanpham/'.$hinhbg)}}"><img src="{{asset('public/upload/sanpham/'.$hinhbg)}}" alt="product-view">
                    </div>
                </div>
                <?php }} ?>
              </div>
              <!-- Controls -->
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
