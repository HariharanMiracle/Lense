<main class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url().'/Frame/create'; ?>" class="btn btn-orange" alt="Create Frame">Add New</a>
                </div>
            </div>
        	<br/>

        	<div class="row">
                <div class="col-md-12">
                	<h3><i class="fas fa-list-alt"></i>All Frame</h3>
                    <br/>
                    <div class="row">
						<form class="form-inline ml-4 mb-2" action="<?php echo base_url().'/Frame/search' ?>" method="post">
						    <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>   
                    </div>

                    <div class="container">
                    	<?php
                    		foreach ($frame as $obj) {
                    			?>
                    				<div class="card bg-light mb-3">
						  				<div class="card-header">
						  					<b>Name: </b><?php echo $obj['name']; ?>&nbsp;&nbsp;&nbsp;<b>|</b>&nbsp;&nbsp;&nbsp;
						  					<?php
						  						$type = "";
						  						if($obj['type'] == 0){
						  							$type = "Women";
						  						}
						  						else if($obj['type'] == 1){
						  							$type = "Men";
						  						}
						  						else if($obj['type'] == 2){
						  							$type = "Uni-Sex";
						  						}
						  						else{
						  							$type = "Children";
						  						}
						  					?>
						  					<b>Type: </b><?php echo $type; ?>
						  					<div style="float:right">
						  						<?php echo '<a class="a-orange" href="'.base_url().'/Frame/edit/'.$obj['id'].'" alt="Edit Frame - '.$obj['name'].'"><i class="far fa-edit"></i></a>'; ?>
						  						&nbsp;&nbsp;&nbsp;
						  						<?php echo '<a class="a-orange" href="'.base_url().'/Frame/delete/'.$obj['id'].'" alt="Delete Frame - '.$obj['name'].'"><i class="far fa-trash-alt"></i></a>'; ?>
						  					</div>
						  				</div>
										  <div class="card-body" style="height:100%;">
										    <div class="row">
										    	<div class="col-9" style="border-right: 2px solid #dee0e3; height:100%">
										    		<div class="row">
										    			<div class="col-6"><b>Frame type: </b>Frame type</div>
										    			<div class="col-6"><b>Model: </b><?php echo $obj['model']; ?></div>
										    		</div>
										    		<div class="row">
										    			<div class="col-6"><b>Price: </b><?php echo $obj['price']; ?></div>
										    			<div class="col-6"><b>Brand: </b>
										    				<?php
										    					foreach ($brand as $brandObj) {
										    						if($brandObj['id'] == $obj['brand']){
										    							echo $brandObj['name'];
										    						}
										    					}
										    				?>
										    			</div>
										    		</div>
										    		<div class="row">
										    			<div class="col-6"><b>Description: </b><?php echo $obj['description']; ?></div>
										    			
										    			<div class="col-6">
										    				<?php
											    				if($obj['stock'] < 10){
											    					?>
											    						<h5 class="text-danger"><b>Stock: </b><?php echo $obj['stock']; ?></h5>
											    					<?php
											    				}
											    				else if($obj['stock'] < 20){
											    					?>
											    						<h5 class="text-warning bg-dark"><b>Stock: </b><?php echo $obj['stock']; ?></h5>
											    					<?php
											    				}
											    				else{
											    					?>
											    						<h5 class="text-success"><b>Stock: </b><?php echo $obj['stock']; ?></h5>
											    					<?php
											    				}
											    			?>
										    			</div>
										    		</div>
												    <div class="row">
												    	<?php
												    		foreach ($side_image_1 as $side_image_1Obj) {
																if($side_image_1Obj['frame_id'] == $obj['id']){
																	?><div class="col-4"><img src="<?php echo base_url().'/uploads/frameImage/'.$side_image_1Obj['image_path']; ?>" height="125px" width="125px" alt="<?php echo $obj2['alt'] ?>"/><p><b>Side-view 1</b></p></div><?php
																}		
												    		}
												    	?>

												    	<?php
												    		foreach ($front_image as $front_imageObj) {
																if($front_imageObj['frame_id'] == $obj['id']){
																	?><div class="col-4"><img src="<?php echo base_url().'/uploads/frameImage/'.$front_imageObj['image_path']; ?>" height="125px" width="125px" alt="<?php echo $obj2['alt'] ?>"/><p><b>Front-view</b></p></div><?php
																}	
												    		}
												    	?>

												    	<?php
												    		foreach ($side_image_2 as $side_image_2Obj) {
																if($side_image_2Obj['frame_id'] == $obj['id']){
																	?><div class="col-4"><img src="<?php echo base_url().'/uploads/frameImage/'.$side_image_2Obj['image_path']; ?>" height="125px" width="125px" alt="<?php echo $obj2['alt'] ?>"/><p><b>Side-view 2</b></p></div><?php
																}			    			
												    		}
												    	?>
												    </div>
										    	</div>
										    	<div class="col-3">
										    		<div class="row text-center">
										    			<div class="col-12">
											    			<?php
											    				foreach ($frame_image as $obj2) {
											    					if($obj2['frame_id'] == $obj['id']){
											    						echo $obj2['title'];
											    					}
											    				}
											    			?>			
										    			</div>

										    		</div>
										    		<div class="row ml-1">
										    			<?php
										    				foreach ($frame_image as $obj2) {
										    					if($obj2['frame_id'] == $obj['id']){
										    						?> <img src="<?php echo base_url().'/uploads/frameImage/'.$obj2['path']; ?>" height="160px" width="160px" alt="<?php echo $obj2['alt'] ?>"/> <?php
										    					}
										    				}
										    			?>
										    		</div>
										    	</div>
										    </div>
										  </div>
                    				</div>
                    			<?php
                    		}
                    	?>
                    </div>

                </div>
            </div>
		</div>
	</div>
</main>
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