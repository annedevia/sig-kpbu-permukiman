<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Sistem Informasi Geografis KPBU</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="css/colorbox.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div class="body-inner">
		<!-- Header start -->
		<header id="header" class="header-one">
			<nav class="site-navigation navigation navdown">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="site-nav-inner pull-left">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>

								<div class="collapse navbar-collapse navbar-responsive-collapse">
									<ul class="nav navbar-nav">
										<li>
											<a href="index.html">Home</a>
											
										</li>

										<li class="active">
											<a href="peta.php">Peta Proyek </a>
										</li>

										<li>
											<a href="kpbu.php">Daftar Proyek</a>
										</li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang</a>
											<!-- <ul class="dropdown-menu" role="menu"> -->
												<!-- <li><a href="services.html">Services All</a></li> -->
												<!-- <li><a href="service-single.html">Services Single</a></li> -->
											<!-- </ul> -->
										</li>
										<li><a href="contact.html">Kontak</a></li>

									</ul>
									<!--/ Nav ul end -->
								</div>
								<!--/ Collapse end -->

							</div><!-- Site Navbar inner end -->

						</div>
						<!--/ Col end -->
					</div>
					<!--/ Row end -->
				</div>
				<!--/ Container end -->

			</nav>
			<!--/ Navigation end -->
		</header>
		<!--/ Header end -->

   


   <section id="main-container" class="main-container">
      <div class="container">
         <div class="row text-center">
            <h3 class="section-sub-title">Peta Proyek KPBU</h3>
         </div><!--/ Title row end -->


         <div class="row">
            <div class="col-md-12">
          <div class="panel panel-info panel-dashboard centered">
           
            <div class="panel-body">
              <div id="map" style="width:100%;height:380px;"></div>
              <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6L-aG7BIZ6ooNpGKdXZ4pKCUp_YdslSk&libraries=places"></script>
              <script type="text/javascript">
                function initialize() 
                {
                  var mapOptions = {    
                      zoom: 5,
                      center: new google.maps.LatLng(-4.0601575,127.5042602), 
                      disableDefaultUI: true
                  };

                  var mapElement = document.getElementById('map');

                  var map = new google.maps.Map(mapElement, mapOptions);

                  setMarkers(map, officeLocations);
                }

              var officeLocations = [
              <?php
                  $data = file_get_contents('http://localhost/sig-kpbu-permukiman/ambildata.php');
                                  $no=1;
                                  if(json_decode($data,true)){
                                    $obj = json_decode($data);
                                    foreach($obj->results as $item){
              ?>
              [<?php echo $item->id_proyek ?>,'<?php echo $item->nama_proyek ?>','<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
              <?php 
              }
              } 
              ?>    
              ];

              function setMarkers(map, locations)
              {
                  var globalPin = 'images/mark.png';

                  for (var i = 0; i < locations.length; i++) {
                    
                      var office = locations[i];
                      var myLatLng = new google.maps.LatLng(office[4], office[3]);
                      var infowindow = new google.maps.InfoWindow({content: contentString});
                      
                      var contentString = 
                          '<div id="content">'+
                          '<div id="siteNotice">'+
                          '</div>'+
                          '<h5 id="firstHeading" class="firstHeading">'+ office[1] + '</h5>'+
                          '<div id="bodyContent">'+ 
                          '<a href=details.php?id='+office[0]+'>Info Detail</a>'+
                          '</div>'+
                          '</div>';

                      var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map,
                          title: office[1],
                          icon:'images/mark.png'
                      });

                      google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                  }
              }

              function getInfoCallback(map, content) {
                  var infowindow = new google.maps.InfoWindow({content: content});
                  return function() {
                          infowindow.setContent(content); 
                          infowindow.open(map, this);
                      };
              }

              initialize();
              </script>
            </div>
          </div>
        </div>
         </div><!-- Content row end -->

      </div><!-- Container end -->
   </section><!-- Main container end -->
	

   <footer id="footer" class="footer bg-overlay">
			
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="copyright-info">
								<span>Copyright © 2019 Dev's Tech, Inc</span>
							</div>
						</div>
					</div><!-- Row end -->

					<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
						<button class="btn btn-primary" title="Back to Top">
							<i class="fa fa-angle-double-up"></i>
						</button>
					</div>

				</div><!-- Container end -->
			</div><!-- Copyright end -->

		</footer><!-- Footer end -->


  <!-- Javascript Files
================================================== -->

  <!-- initialize jQuery Library -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <!-- Bootstrap jQuery -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Owl Carousel -->
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <!-- Color box -->
  <script type="text/javascript" src="js/jquery.colorbox.js"></script>
  <!-- Isotope -->
  <script type="text/javascript" src="js/isotope.js"></script>
  <script type="text/javascript" src="js/ini.isotope.js"></script>


  <!-- Google Map API Key-->
  
  <!-- Google Map Plugin-->
  

 <!-- Template custom -->
 <script type="text/javascript" src="js/custom.js"></script>

</div><!-- Body inner end -->
</body>

</html>