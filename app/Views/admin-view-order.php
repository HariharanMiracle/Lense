<main class="container">
	<div class="row">
		<div class="col-12 bg-light">
			<h3>Admin-view-order</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
			<h5><b>Order id: </b><?php echo $order['id']; ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Total amount: </b><?php echo $order['total']; ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Order date: </b><?php echo $order['order_date']; ?></h5>
		</div>
		<div class="col-3">
				<?php
					if($order['status'] == 0){
						?><h5 class="text-danger"><b>Status: </b>Not paid</h5><?php
					}
					else if($order['status'] == 1){
						?><h5 class="text-info"><b>Status: </b>Paid</h5><?php
					}
					else if($order['status'] == 2){
						?><h5 class="text-warning"><b>Status: </b>Confirmed</h5><?php
					}
					else{
						?><h5 class="text-success"><b>Status: </b>Delivered</h5><?php
					}
				?>
		</div>				
	</div>

	<!-- User details start -->
	<h4><u>User Details</u></h4>
	<div class="row">
		<div class="col-4">
			<h5><b>Name: </b><?php
								foreach ($user as $objUser) {
									if($objUser['id'] == $order['user_id']){
										echo $objUser['fname'].' '.$objUser['lname'];
									}
								}
			 				 ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Contact: </b><?php
								foreach ($user as $objUser) {
									if($objUser['id'] == $order['user_id']){
										echo $objUser['contact'];
									}
								}
			 				 ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Email: </b><?php
								foreach ($user as $objUser) {
									if($objUser['id'] == $order['user_id']){
										echo $objUser['email'];
									}
								}
			 				 ?></h5>
		</div>			
	</div>	
	<!-- User details end -->

	<!-- Item details start -->
	<h4><u>Item Details</u></h4>
	<?php
		$c = 1;
		foreach ($item as $itemObj) {
			if($itemObj['order_id'] == $order['id']){
				?>
					<div class="row">
						<div class="col-12 bg-secondary text-center">
							<h4><b class="text-white"><?php echo 'Product '.$c; ?></b></h4>
						</div>
					</div>
					<!-- Item details start -->
					<!-- Frame details start -->
					<?php
						foreach ($frame as $frameObj) {
							if($itemObj['frame_id'] == $frameObj['id']){
								?>
									<div class="row">
										<div class="col-2"><h4><b>#Frame</b></h4></div>
										<div class="col-2 mt-2"><h5><b>Brand: </b><?php
																						foreach ($brand as $brandObj) {
																							if($brandObj['id'] == $frameObj['brand']){
																								echo $brandObj['name'];
																							}
																						}
																				  ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Model: </b><?php echo $frameObj['model']; ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Name: </b><?php echo $frameObj['name']; ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Type: </b><?php
																					foreach ($frame_type as $frameTypeObj) {
																						if($frameTypeObj['id'] == $frameObj['frametype_id']){
																							echo $frameTypeObj['name'];
																						}
																					}
																				 ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Price: </b><?php echo $frameObj['price']; ?></h5></div>
									</div>
								<?php
							}
						}
					?>				
					<!-- Frame details end -->
					
					<!-- Frame Image start -->
					<div class="row">
						<div class="col-4">
							<?php
								foreach ($frame_image as $frame_imageObj) {
									if($frame_imageObj['frame_id'] == $itemObj['frame_id']){
										?>
										<img src = "<?php echo base_url().'/uploads/frameImage/'.$frame_imageObj['path']; ?>" alt="<?php echo $frame_imageObj['alt']; ?>" height="150px" width="150px"/>
										<?php
									}
								}
							?>
						</div>
					</div>					
					<!-- Frame Image end -->
					
					<!-- Lense details start -->
					<div class="row">
						<?php
							foreach ($lense as $lenseObj) {
								if($itemObj['lense_id'] == $lenseObj['id']){
									?>
										<div class="col-2"><h4><b>#Lense</b></h4></div>
										<div class="col-2 mt-2"><h5><b>Model: </b><?php echo $lenseObj['model']; ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Name: </b><?php echo $lenseObj['name']; ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Type: </b><?php
																					foreach ($lense_type as $lenseTypeObj) {
																						if($lenseTypeObj['id'] == $lenseObj['lensetype_id']){
																							echo $lenseTypeObj['name'];
																						}
																					}
																				 ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Price: </b><?php echo $lenseObj['price']; ?></h5></div>
									<?php
								}
							}
						?>
					</div>
					<!-- Lense details end -->

					<!-- Lense effect details start -->
					<div class="row">
						<?php
							foreach ($lense_shade as $lense_shadeObj) {
								if($itemObj['lense_shade_id'] == $lense_shadeObj['id']){
									?>
										<div class="col-2"><h4><b>#Lense Effect</b></h4></div>
										<div class="col-2 mt-2"><h5><b>Name: </b><?php echo $lense_shadeObj['name']; ?></h5></div>
										<div class="col-2 mt-2"><h5><b>Price: </b><?php echo $lense_shadeObj['price']; ?></h5></div>
										<div><img src="<?php echo base_url().'/uploads/frameImage/'.$lense_shadeObj['path']; ?>" height="200px;"/></div>
									<?php
								}
							}
						?>
					</div>
					<!-- Lense details end -->

					<!-- Prescription details start -->
					<?php
						foreach ($prescription as $prescriptionObj) {
							if($itemObj['id'] == $prescriptionObj['itemId']){
					?>
					<div class="row">
						<div class="col-8">
							<div class="row">
								<div class="col-6 border-right border-dark" style="height: 200px;">
									<div class="row">
										<div class="col-12 bg-light text-center"><h5><b>Left-eye</b></h5></div>
									</div>
									<div>
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>SPH (ගෝල)</th>
													<th>CLY (සිලින්ඩර්)</th>
													<th>AXIS (අක්ශ)</th>
												</tr>				
											</thead>
											<tbody>
												<tr>
											      <th scope="row">Distance (දුර)</th>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['LDSPH']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['LDCLY']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['LDAXIS']; ?>" readonly/></td>	
											    </tr>
											</tbody>
											<tbody>
												<tr>
											      <th scope="row">Reading (කියවීම)</th>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['LRSPH']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['LRCLY']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['LRAXIS']; ?>" readonly/></td>	
											    </tr>
											</tbody>							
										</table>
									</div>
								</div>
								<div class="col-6 border-left border-right border-dark" style="height: 200px;">
									<div class="row">
										<div class="col-12 bg-light text-center"><h5><b>Right-eye</b></h5></div>
									</div>
									<div>
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>SPH (ගෝල)</th>
													<th>CLY (සිලින්ඩර්)</th>
													<th>AXIS (අක්ශ)</th>
												</tr>				
											</thead>
											<tbody>
												<tr>
											      <th scope="row">Distance (දුර)</th>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['RDSPH']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['RDCLY']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['RDAXIS']; ?>" readonly/></td> 
											    </tr>
											</tbody>
											<tbody>
												<tr>
											      <th scope="row">Reading (කියවීම)</th>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['RRSPH']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['RRCLY']; ?>" readonly/></td>
											      <td><input type="number" class="form-control" value="<?php echo $prescriptionObj['RRAXIS']; ?>" readonly/></td>   
											    </tr>
											</tbody>							
										</table>										
									</div>
								</div>
							</div>
						</div>
						<div class="col-4 border-left border-dark">
							<div class="row">
								<div class="col-12 bg-light text-center"><h5><b>Prescription Image</b></h5></div>
							</div>
							<div class="row">
								<div class="zoom">
									<img class="image" src = "<?php echo base_url().'/uploads/frameImage/'.$prescriptionObj['prescription_p']; ?>" alt="<?php echo $frame_imageObj['alt']; ?>" style="width:100%;"/>									
								</div>
							</div>
							<div class="row"><h4><b>TOTAL: </b> <?php echo $itemObj['price']; ?></h4></div>
						</div>
					</div>
					<!-- Shipping details start -->
					<h4><u>Shipping Details</u></h4>
					<div class="row">
						<div class="col-2"><h4><b>#Shipping</b></h4></div>
						<?php
							foreach ($shipping_details as $shipping_detailsObj) {
								if($shipping_detailsObj['id'] == $order['shipping_id']){
									?><div class="col-2"><h5><b>Address: </b><?php echo $shipping_detailsObj['address']; ?></h5></div><?php
									foreach ($shipping_type as $shipping_typeObj) {
										if($shipping_typeObj['id'] == $shipping_detailsObj['shippingtype_id']){
											?><div class="col-2"><h5><b>Type: </b><?php echo $shipping_typeObj['type']; ?></h5></div><?php	
											?><div class="col-2"><h5><b>Rate: </b><?php echo $shipping_typeObj['rate']; ?></h5></div><?php
										}
									}
								}
							}
						?>		
					</div>	
					<!-- Shipping details end -->
					<?php
							}
						}
					?>					
					<!-- Prescription details end -->
					
					<!-- Item details end -->
					<!-- Shipping details start -->
					<br/>
					<h4><u>Payment Details</u></h4>
					<div class="row">
						<div class="col-2"><h4><b>#Payment</b></h4></div>
						<div class="col-2">
							<h5><b>Payment type: </b><?php echo $payment['type']; ?></h5>
						</div>
						<div class="col-2">
							<h5><b>Sub total: </b><?php echo $payment['sub-total']; ?></h5>
						</div>
						<div class="col-6">
							<h5><b>Reference</b></h5>
							<div class="zoom">
								<img src="<?php echo base_url().'/uploads/frameImage/'.$payment['pic']; ?>" height="250px;"/>
							</div>
						</div>
					</div>	
					<!-- Shipping details end -->
				<?php
				echo '<br/>';
				$c++;
			}
		}
	?>
	<!-- Order form start -->
		<form action="<?php echo base_url('Order/changeStatus');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="row">
			<div class="col-4"><h5><b>Current Order Status: </b></h5></div>
			<div class="col-4">
	            <div class="form-group">
                	<input type="text" name="order_id" class="form-control" id="order_id" placeholder="Please enter order_id" value="<?php echo $order['id']; ?>" hidden required>
	                <label for="order_status">Order status<span style="color:red;">*</span></label>
	                <select name="order_status" class="form-control" id="order_status">
	                	<?php
	                		if($order['status'] == 0){
	                			?>
				                    <option value="0" selected>Not-Paid</option>
				                    <option value="1">Paid</option>
				                    <option value="2">Confirmed</option>
				                    <option value="3">Delivered</option>
	                			<?php
	                		}
	                		else if($order['status'] == 1){
	                			?>
				                    <option value="0">Not-Paid</option>
				                    <option value="1" selected>Paid</option>
				                    <option value="2">Confirmed</option>
				                    <option value="3">Delivered</option>
	                			<?php
	                		}
	                		else if($order['status'] == 2){
	                			?>
				                    <option value="0">Not-Paid</option>
				                    <option value="1">Paid</option>
				                    <option value="2" selected>Confirmed</option>
				                    <option value="3">Delivered</option>
	                			<?php
	                		}
	                		else{
	                			?>
				                    <option value="0">Not-Paid</option>
				                    <option value="1">Paid</option>
				                    <option value="2">Confirmed</option>
				                    <option value="3" selected>Delivered</option>
	                			<?php
	                		}
	                	?>
	                </select>
	            </div>				
			</div>
			<div class="col-4 mt-2">
	            <div class="form-group">
	            	<button type="submit" id="send_form" class="btn btn-secondary">Change order status</button>
	            </div>				
			</div>
			</div>			
		</form>

		<div class="row">
			<div class="col-12 bg-dark text-center">
				<h4 class="text-white">--- END OF ORDER ---</h5>
			</div>
		</div>
	<!-- Order form end-->

	<!-- Item details end -->
</main>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
	var presc_image_id = 0;
    $(document).ready( function () {
        $('#category').DataTable();
    } );

    // function loadPrescImage(id){
    // 	console.log('id: ' + id);
    // 	presc_image_id = id;
    // 	<?php
    // 		$p_id='presc_image_id';
    // 	?>
    // 	// alert(<?php echo 'id1: '.$p_id; ?>);
    // 	// alert('<?php echo 'id1: '.$p_id; ?>');
    // 	// console.log();
    // }
</script>
<style type="text/css">

* {
  box-sizing: border-box;
}

.zoom {
  /*padding: 50px;*/
  /*background-color: green;*/
  transition: transform .2s;
  /*width: 200px;*/
  /*height: 200px;*/
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(2); /* IE 9 */
  -webkit-transform: scale(2); /* Safari 3-8 */
  transform: scale(2); 
}

</style>
</body>
</html>
</body>
</html>