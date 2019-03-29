@foreach($products as $child)	
<div class="motkhoi col-lg-3 col-md-4 col-sm-6">
	<div class="card item">		
		<div class="wrap-img">
			<a href="">
				<?php 
                $images = json_decode($child->images);
              ?>
				<img class="card-img-top" height="150" src="{{$images[0] ?? 'assets/images/chitietsanpham/logo_muare.png'}}" alt="">
			</a>
			<div class="qv-button-container"> <a href="{{$child->id}}" title="{{$child->name}}"><i class="fas fa-eye"></i></a></div>											
		</div>		

		<div class="card-body info">
			<div class="info-inner">
				<div class="title_products_related">
					<a href="{{$child->id}}" title="{{$child->name}}" class="OverlayPopup" data-size="l" data-id="popupItem">{{$child->name}}</a>
				</div>
				<!--item-title-->
				<div class="item-content">
					<div class="price-box">
						<p class="special-price"> <span class="price"> {{number_format($child->price,0)}}đ </span> </p>
					</div>
				</div>
				<!--item-content-->

			</div>
			<div class="actions">
				<button type="button" title="Add to Cart" class="button btn-cart">
					<div class="box-info">
						<span>	                                                
							<a href="#" class="order">Thêm vào giỏ</a>
						</span>
					</div>
					
				</button>
			</div>
		</div>
		
	</div>			
	
</div>

@endforeach
