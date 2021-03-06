
@foreach($products as $child)	
<div class="motkhoi col-lg-3 col-md-4 col-sm-6">
		
	<div class="card item">		
		<div class="wrap-img" dataIDProduct2="{{$child->id}}">
			<a href="san-pham/{{$child->id}}">
				<?php 
                $images = json_decode($child->images);
              ?>
				<img class="card-img-top" style="width: 159px; height: 150px;" 
				src="{{$images[0] ?? 'assets/images/chitietsanpham/logo_muare.png'}}" alt="">
			</a>
            <div class="qv-button-container md-trigger img-rounded OverlayPopup" data-modal="modal-productview">
			  <a title="{{$child->name}}" href="san-pham/{{$child->id}}"><i class="fas fa-eye"></i></a></div>
			
		</div>		

		<div class="card-body info">
				
			<div class="info-inner">
				<div class="title_products_related">
					<a href="san-pham/{{$child->id}}" title="{{$child->name}}" class="OverlayPopup" data-size="l" data-id="popupItem">{{$child->name}}</a>
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
				
				<button type="button" title="Add to Cart" class="button btn-cart ">
					<div class="box-info">
						<span>	                                                
							<a class="order md-trigger2" 
							href="san-pham/{{$child->id}}">Xem chi tiết</a>
						</span>
					</div>
				</button>
			</div>
		</div>
		
	</div>			
	
</div>

@endforeach
