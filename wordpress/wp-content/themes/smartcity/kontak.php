<?php 
/* Template Name: kontak */
	get_header();
?>

	<div id="googleMap"></div>
	<div class="col-md-12 kontak-wrap">
		<div class="col-md-6">
			<h2>Form Kontak</h2>
			<p>Kritik dan saran anda akan sangat kami hargai. Atau jika anda memiliki pertanyaan khusus, anda bisa tanyakan melalui E-Mail. Kami akan senang mendapat E-Mail dari anda. Kami akan membalas E-Mail dalam waktu 3 hari kerja.</p>
			<?php
				  echo do_shortcode(
				    '[contact-form-7 id="78" title="Contact form 1"]'
				  );
			?>
		</div>
		<div class="col-md-6 kontak-information">
			<h2>Informasi Kontak</h2>
			<p>Berikut informasi kontak yang bisa anda hubungi. Kami akan sangat terbuka untuk mendengar kritik dan saran anda, maupun masalah yang ada di kota Bandung.</p>
			<div class="kontak-media">
				<p>Email  : <span>diskominfo@bandung.go.id</span></p>
				<p>Phone  : <span>+62-22-4234793</span></p>
				<p>Alamat : <span>Jl. Wastukencana No. 2, Bandung, Jawa Barat 40117</span></p>
			</div>
			<h6>Penerimaan telepon hanya berlaku pada jam 13.00 - 15.00 WIB. Kami tidak akan menerima lagi di luar jam itu.</h6>
		</div>
	</div>

	<script>
		function myMap() {
		  var myCenter = new google.maps.LatLng(-6.912006, 107.609680);
		  var mapCanvas = document.getElementById("googleMap");
		  var mapOptions = {center: myCenter, zoom: 15};
		  var map = new google.maps.Map(mapCanvas, mapOptions);
		  var marker = new google.maps.Marker({position:myCenter});
		  marker.setMap(map);

		  var infowindow = new google.maps.InfoWindow({
		    content: "Location"
		  });
		  infowindow.open(map,marker);
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjIZpu_3bAW9rSmI1CWoiQCDbc6Hs8axc&callback=myMap"></script>


<?php 
	get_footer();
?>