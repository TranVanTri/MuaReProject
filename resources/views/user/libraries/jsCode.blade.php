<script src="assets/js/jquery/jquery.min.js"></script>
<script src="assets/js/jquery/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<script src="assets/js/OwlCarousel/owl.carousel.min.js"></script>
<script src="dropzone/dist/dropzone.js"></script>
<script src="assets/js/multiselect/fSelect.js"></script>
<script src="assets/js/myJS.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/modalEffects.js"></script>
<script src="assets/js/glm-ajax.js"></script>
<script src="assets/js/changeStt.js"></script>
 


<!--
<script src="assets/js/modernizr.custom.js"></script>

<script src="assets/js/cssParser.js"></script>
<script src="assets/js/css-filters-polyfill.js"></script>
-->

<script type="text/javascript">
	Dropzone.autoDiscover = false;
</script>

// xử lý ajax thêm sản phẩm vào giỏ hàng
<script>
	$(document).ready(function () {
	    $(".btnAddToCart_tomiot").click(function() {
		   idSP = $('#LayIdSanPhamGioHang').val();
		   console.log("id sản phẩm: " +idSP);
		   $.get("them-gio-hang", {id: idSP}, function (data) {
			  console.log('Them thành công');
			  console.log(data);
		   });
		
		
	    });
	});
	
 </script>












