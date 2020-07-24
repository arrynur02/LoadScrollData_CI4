<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Load Scroll data CodeIgniter 4 using Jquery</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/font/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/font/css/brands.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/font/css/fontawesome.min.css">
</head>
<body>
	<style>
		footer {
			background-color: rgba(221, 72, 20, .8);
			text-align: center;
		}
		footer .environment {
			color: rgba(255, 255, 255, 1);
			padding: 2rem 1.75rem;
		}
		footer .copyrights {
			background-color: rgba(62, 62, 62, 1);
			color: rgba(200, 200, 200, 1);
			padding: .25rem 1.75rem;
		}
		#dt_contentRecords- .card.show_card{
			opacity: 1;
			/*transition: .5s;*/
			transform: translate(0,0);
		}
	</style>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url();?>/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
				CodeIgniter
			</a>
			<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<form class="form-inline my-2 my-lg-0 ml-auto">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div> -->
		</nav>
		<div class="container mt-1">
	<!-- 		<input type="text" class="form-control mb-2" id="keyword-search" placeholder="Search Keywords !!"> -->
	
			<div class="row">
				<div class="col-12">
					<div id="dt_contentRecords-"></div>
					<div class="text-center">
						<button id="LoadRecords-" class="btn btn-info btnnnn"> Load More ...</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="mt-5">
		<div class="environment">

			<!-- <p>Page rendered in {elapsed_time} seconds</p> -->
			<p>env: <?= ENVIRONMENT ?></p>
			<p><i class="fab fa-whatsapp text-success"></i> Whastapp: (62+) 821-1068-1196</p>
			<p><i class="fab fa-github"></i> Github: <a href="https://github.com/arrynur02/LoadScrollData_CI4" class="text-white">https://github.com/arrynur02/LoadScrollData_CI4</a></p>

		</div>

		<div class="copyrights">

			<p>&copy; Create By Lefd</p>

		</div>

	</footer>
	<!-- Script ======================================================== -->
	<script src="<?php echo base_url();?>/Bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo base_url();?>/Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			button_text = 'Load More ...';
			baseURL = "<?php echo base_url();?>";
			start = 0;
			limit = 3;

			thiS_Records(limit , start);

			function thiS_Records(limit , start) {
				$.get({
					type:"POST",
					url:baseURL + "/Product/ShowsRecords/",
					cache:false,
					dataType:"json",
					data:{start:start , limit:limit},
				})
				.done((result) => {
					if (result.records_) {
						alert('Sorry !! , Data Is Weat Out ..');
						$('#LoadRecords-').fadeOut();
					}else{
						$('#LoadRecords-').fadeIn();
						$('#dt_contentRecords-').append(result.records);
					}
				})
				.fail((result) => {
					console.log(result);
				});
			}
			function Recods_keywords(search) {
				$.get({
					type:"POST",
					url:baseURL + "/Product/ShowsRecordsByKeywords/",
					cache:false,
					dataType:"json",
					data:{search:search},
				})
				.done((result) => {
					$('#dt_contentRecords-').empty().html(result.records);
					$('#LoadRecords-').hide();
				})
				.fail((result) => {
					console.log(result);
				})
			}
			$('#LoadRecords-').on('click',function() {
				limit = 3;
				start = start + 3;
				$('#LoadRecords-').attr('disabled',true);
				$('#LoadRecords-').html('<i class="fa fa-spinner fa-spin"></i> Loading');
					// $('#dt_contentRecords .card').each(function(a) {
					// 	setTimeout(function() {
					// 		$('#dt_contentRecords .card').eq(a).addClass('show_card');
					// 	}, 350 *(a+1));
					// });
					setTimeout(function() {
						$('#LoadRecords-').attr('disabled',false);
						$('#LoadRecords-').html(button_text);
						let dt_ = thiS_Records(limit , start);
						console.log(dt_);
					},2100);
				});
		});
	</script>
</body>
</html>