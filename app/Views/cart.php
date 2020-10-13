<br/>
<main class="container">
<!-- start checkout & shop now button -->
<div class="fixed-top">
	<div class="row float-right pr-4 mt-4 pt-2">
		<div class = "col-12">
			<?php
				if($_SESSION['total'] == 0 && $_SESSION['count'] == 0){
					?><p class="text-danger">Cart is empty</p><?php
				}
				else{
					?>
						<a href="<?php echo base_url().'/Cart/checkout'; ?>"><button type="button" class="btn btn-info">Checkout</button></a>
					<?php
				}
			?>
			<a class="pl-2" href="<?php echo base_url().'/ExploreGlasses'; ?>"><button type="button" class="btn btn-info">Shop now</button></a>			
		</div>		
	</div>
</div>
<!-- end checkout & shop now button -->	
	<?php
		$c = 1;
		foreach ($_SESSION['cart'] as $obj) {
			?>
				<div>
					<div class="row">
						<div class="col-12 bg-light">
							<div class="row">
								<div class="col-11"><h4>Product <?php echo $c; ?></h4></div>
								<div class="col-1 pl-2 pt-2">
									<a href="<?php echo base_url().'/Cart/remove/'.$obj['id']; ?>"><button type="button" class="btn btn-info">Remove</button></a>	
								</div>							
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-5">
							<div class="row">
								<h5>
									<b>FRAME MODEL:</b>&nbsp;
									<?php
										foreach($frame as $frameObj){
											if($frameObj['id'] == $obj['frame_id']){
												?><h5><?php echo $frameObj['model'] ?></h5><?php
											}
										}
									?>
								</h5>
							</div>
							<div class="row">
								<h5>
									<b>FRAME:</b>&nbsp;
									<?php
										foreach($frame as $frameObj){
											if($frameObj['id'] == $obj['frame_id']){
												?><h5><?php echo $frameObj['name'] ?></h5><?php
											}
										}
									?>
								</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<h5>
									<b>PRICE:</b>&nbsp;
									<?php
										foreach($frame as $frameObj){
											if($frameObj['id'] == $obj['frame_id']){
												?><h5><?php echo $frameObj['price'] ?></h5><?php
											}
										}
									?>
								</h5>								
							</div>
							<div class="row">
								<h5>
									<b>LENSE MODEL:</b>&nbsp;
									<?php
										foreach($lense as $lenseObj){
											if($lenseObj['id'] == $obj['lense_id']){
												?><h5><?php echo $lenseObj['model'] ?></h5><?php
											}
										}
									?>
								</h5>
							</div>							
							<div class="row">
								<h5>
									<b>LENSE:</b>&nbsp;
									<?php
										foreach($lense as $lenseObj){
											if($lenseObj['id'] == $obj['lense_id']){
												?><h5><?php echo $lenseObj['name'] ?></h5><?php
											}
										}
									?>
								</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<h5>
									<b>PRICE:</b>&nbsp;
									<?php
										foreach($lense as $lenseObj){
											if($lenseObj['id'] == $obj['lense_id']){
												?><h5><?php echo $lenseObj['price'] ?></h5><?php
											}
										}
									?>
								</h5>																
							</div>
							<div class="row">
								<h5>
									<b>LENSE EFFECT:</b>&nbsp;
										<?php
											foreach ($lense_shade as $lense_shadeObj) {
												if($obj['lense_effect_id'] == $lense_shadeObj['id']){
													echo $lense_shadeObj['name'];
													echo '&nbsp; <b>PRICE: </b>'.$lense_shadeObj['price'];
													echo '<br/>';
													?><br/><img class="zoom1" src = "<?php echo 'http://localhost/Lense/public/uploads/frameImage/'.$lense_shadeObj['path']?>" height="100px"/><?php
												}
											}
										?>
								</h5>
							</div>							
						</div>
						<div class="col-7">
							<div class="row">
								<?php
									if($obj['prescription'] == ""){
										echo '<h5 style="color:red">Prescription not uploaded</h5>';
									}
									else{
										?><img class="zoom" src="<?php echo base_url().'/uploads/frameImage/'.$obj['prescription']; ?>" height="250px"/><?php
									}
								?>
							</div>						
						</div>
					</div>			
				</div>
			<?php
			echo '<br/>';
			$c++;
		}
	?>
	<div class="row ml-2 bg-warning">
		<div class="col-12 text-center">
			<h5><b>TOTAL:</b>&nbsp;<?php echo $_SESSION['total']; ?></h5>
		</div>
	</div>	
</main>

<br/>

<style type="text/css">
.zoom1 {
  /*padding: 50px;*/
  /*background-color: green;*/
  transition: transform .2s; /* Animation */
  /*width: 200px;*/
  /*height: 200px;*/
  margin: 0 auto;
}

.zoom1:hover {
  transform: scale(2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}	

.zoom {
  /*padding: 50px;*/
  /*background-color: green;*/
  transition: transform .2s; /* Animation */
  /*width: 200px;*/
  /*height: 200px;*/
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}	
</style>