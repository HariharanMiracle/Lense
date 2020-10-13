<?php
	$total_earning = 0;
	$order_delivered = 0;
	$lense_delivered = 0;
	$frame_delivered = 0;

	$delivered_order = 0;
	$confirmed_order = 0;
	$paid_order = 0;
	$not_paid_order = 0;

	$delivered_order_count = 0;
	$confirmed_order_count = 0;
	$paid_order_count = 0;
	$not_paid_order_count = 0;

	foreach ($order as $orderObj) {
		if($orderObj['status'] == 3){
			$total_earning += $orderObj['total'];
			$delivered_order += $orderObj['total'];
			$order_delivered++;
			$delivered_order_count++;

			foreach ($item as $itemObj) {
				if($orderObj['id'] == $itemObj['order_id']){
					$lense_delivered++;
					$frame_delivered++;
				}
			}
		}

		if($orderObj['status'] == 0){
			$not_paid_order += $orderObj['total'];
			$not_paid_order_count++;
		}

		if($orderObj['status'] == 1){
			$paid_order += $orderObj['total'];
			$paid_order_count++;
		}

		if($orderObj['status'] == 2){
			$confirmed_order += $orderObj['total'];
			$confirmed_order_count++;
		}				
	}

?>
<div class="position-fixed" style="z-index: 1000; margin-right: 10px; margin-left: 92%;">
	<a href="#top">
		<i class="fas fa-chevron-circle-up fa-5x"></i>
	</a>
</div>
<main class="container">
	<div class="navbar navbar-expand-lg navbar-light bg-light" id="top">
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="#statistics"><h4><b>Statistics</b></h4></a>
	      </li>	
	      <li class="nav-item">
	        <a class="nav-link" href="#lense_summary"><h4><b>Lense Summary</b></h4></a>
	      </li>	
	      <li class="nav-item">
	        <a class="nav-link" href="#frame_summary"><h4><b>Frame Summary</b></h4></a>
	      </li>	
	      <li class="nav-item">
	        <a class="nav-link" href="#order_summary"><h4><b>Order Summary</b></h4></a>
	      </li>	
<!-- 	      <li class="nav-item">
	        <a class="nav-link" href="#monthly_sales"><h4><b>Monthly Sales</b></h4></a>
	      </li>	
	      <li class="nav-item">
	        <a class="nav-link" href="#yearly_sales"><h4><b>Yearly Sales</b></h4></a>
	      </li>	 -->	      	      	      	      	            
	  </ul>
	</div>

	</div>
	<div class="row" id="statistics">
		<div class="col-12 bg-light">
			<h2><b>Statistics</b> &nbsp; <i class="fa fa-bar-chart" aria-hidden="true"></i></h2>
		</div>
	</div>

	<!-- First Section Statistics Display Start -->
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-info">
					<i class="fa fa-usd fa-4x text-white float-right"></i>
					<h3 class="text-white">Total Earnings</h3>
					<h4 class="text-white"><?php echo $total_earning; ?> LKR</h4>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-warning">
					<i class="fa fa-first-order fa-4x text-white float-right"></i>
					<h3 class="text-white">Total Orders Delivered</h3>
					<h4 class="text-white">Count: <?php echo $order_delivered; ?></h4>					
				</div>
			</div>			
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-danger">
					<i class="fa fa-info-circle fa-4x text-white float-right"></i>
					<h3 class="text-white">Total Frames Sale</h3>
					<h4 class="text-white">Count: <?php echo $frame_delivered; ?></h4>					
				</div>
			</div>			
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-secondary">
					<i class="fa fa-eye fa-4x text-white float-right"></i>
					<h3 class="text-white">Total Lenses Sale</h3>
					<h4 class="text-white">Count: <?php echo $lense_delivered; ?></h4>					
				</div>
			</div>			
		</div>
	</div>
	<!-- First Section Statistics Display End -->

	<!-- Lense Summary Start -->
	<div class="row" id="lense_summary">
		<div class="col-12 bg-light">
			<h3><b>Lense Summary</b> &nbsp; <i class="fa fa-eye" aria-hidden="true"></i></h3>
		</div>
	</div>
	<br/>
	<br/>
	<div class="row d-flex align-items-center">
		<div class="col-12 zoom1">
			<h4><b>Lense</b></h4>
			<br/>

			<?php
				$ind = 0;
				foreach ($lenseReport as $lenseReportObj) {
					if($ind % 4 == 0){
					?>
						<h5><?php echo $lenseReportObj['name']; ?> &nbsp; <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%'; ?>&nbsp; <b>(<?php echo $lenseReportObj['lense_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $lenseReportObj['name']; ?></h5></div>
						</div>
					<?php
					}
					else if($ind % 4 == 1){
					?>
						<h5><?php echo $lenseReportObj['name']; ?> &nbsp; <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%'; ?>&nbsp; <b>(<?php echo $lenseReportObj['lense_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $lenseReportObj['name']; ?></h5></div>
						</div>
					<?php
					}
					else if($ind % 4 == 2){
					?>
						<h5><?php echo $lenseReportObj['name']; ?> &nbsp; <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%'; ?>&nbsp; <b>(<?php echo $lenseReportObj['lense_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $lenseReportObj['name']; ?></h5></div>
						</div>
					<?php						
					}
					else{
					?>
						<h5><?php echo $lenseReportObj['name']; ?> &nbsp; <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%'; ?>&nbsp; <b>(<?php echo $lenseReportObj['lense_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo (($lenseReportObj['lense_count'] / $lense_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $lenseReportObj['name']; ?></h5></div>
						</div>
					<?php
					}
					$ind++;
				}
			?>	
		</div>
	</div>
	<br/>
	<br/>

	<!-- Lense Summary End -->

	<!-- Frame Summary Start -->
	<div class="row" id="frame_summary">
		<div class="col-12 bg-light">
			<h3><b>Frame Summary</b> &nbsp; <i class="fa fa-info-circle" aria-hidden="true"></i></h3>
		</div>
	</div>
	<div class="row d-flex align-items-center">
		<div class="col-12 zoom1">
			<h4><b>Frame</b></h4>
			<br/>

			<?php
				$ind = 0;
				foreach ($frameReport as $frameReportObj) {
					if($ind % 4 == 0){
					?>
						<h5><?php echo $frameReportObj['name']; ?> &nbsp; <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%'; ?> &nbsp; <b>(<?php echo $frameReportObj['frame_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $frameReportObj['name']; ?></h5></div>
						</div>
					<?php
					}
					else if($ind % 4 == 1){
					?>
						<h5><?php echo $frameReportObj['name']; ?> &nbsp; <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%'; ?> &nbsp; <b>(<?php echo $frameReportObj['frame_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $frameReportObj['name']; ?></h5></div>
						</div>
					<?php
					}
					else if($ind % 4 == 2){
					?>
						<h5><?php echo $frameReportObj['name']; ?> &nbsp; <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%'; ?> &nbsp; <b>(<?php echo $frameReportObj['frame_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $frameReportObj['name']; ?></h5></div>
						</div>
					<?php						
					}
					else{
					?>
						<h5><?php echo $frameReportObj['name']; ?> &nbsp; <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%'; ?> &nbsp; <b>(<?php echo $frameReportObj['frame_count']; ?>)</b></h5>
						<div class="progress">
						  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo (($frameReportObj['frame_count'] / $frame_delivered) * 100).'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5 class="text-white"><?php echo $frameReportObj['name']; ?></h5></div>
						</div>
					<?php
					}
					$ind++;
				}
			?>	
		</div>
	</div>	
	<!-- Frame Summary End -->

	<!-- Order Summary Start -->
	<div class="row" id="order_summary">
		<div class="col-12 bg-light">
			<h3><b>Order Summary</b> &nbsp; <i class="fa fa-first-order" aria-hidden="true"></i></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-success">
					<i class="fa fa-usd fa-4x text-white float-right"></i>
					<h3 class="text-white">Delivered Order</h3>
					<h4 class="text-white"><?php echo $delivered_order; ?> LKR</h4>
					<h4 class="text-white">Count: <?php echo $delivered_order_count; ?></h4>					
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-warning">
					<i class="fa fa-first-order fa-4x text-white float-right"></i>
					<h3 class="text-white">Confirmed Order</h3>
					<h4 class="text-white"><?php echo $confirmed_order; ?> LKR</h4>
					<h4 class="text-white">Count: <?php echo $confirmed_order_count; ?></h4>					
				</div>
			</div>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-info">
					<!-- <i class="fa fa-info-circle fa-4x text-white float-right"></i> -->
					<i class="fas fa-hand-holding-usd fa-4x text-white float-right"></i>
					<h3 class="text-white">Paid Order</h3>
					<h4 class="text-white"><?php echo $paid_order; ?> LKR</h4>
					<h4 class="text-white">Count: <?php echo $paid_order_count; ?></h4>					
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="row p-5 mx-auto zoom" style="height: 250px;">
				<div class="col-12 bg-danger">
					<i class="fa fa-money-bill-alt fa-4x text-white float-right"></i>
					<h3 class="text-white">Not Paid Order</h3>
					<h4 class="text-white"><?php echo $not_paid_order; ?> LKR</h4>
					<h4 class="text-white">Count: <?php echo $not_paid_order_count; ?></h4>					
				</div>
			</div>			
		</div>
	</div>	
	<!-- Order Summary End -->	

	<!-- Monthly Sales Start -->
<!-- 	<div class="row" id="monthly_sales">
		<div class="col-12 bg-light">
			<h3><b>Monthly Sales</b> &nbsp; <i class="fa fa-piggy-bank" aria-hidden="true"></i></h3>
		</div>
	</div> -->
	<!-- Monthly Sales End -->

	<!-- Yearly Sales Start -->
<!-- 	<div class="row" id="yearly_sales">
		<div class="col-12 bg-light">
			<h3><b>Yearly Sales</b> &nbsp; <i class="fa fa-balance-scale" aria-hidden="true"></i></h3>
		</div>
	</div> -->
	<!-- Yearly Sales End -->		



</main>
<style type="text/css">
.zoom {
  /*padding: 50px;*/
  /*background-color: green;*/
  transition: transform .2s; /* Animation */
  /*width: 200px;*/
  /*height: 200px;*/
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

.zoom1 {
  /*padding: 50px;*/
  /*background-color: green;*/
  transition: transform .2s; /* Animation */
  /*width: 200px;*/
  /*height: 200px;*/
  margin: 0 auto;
}

.zoom1:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#category').DataTable();
    } );
</script>
</body>
</html>
</body>
</html>