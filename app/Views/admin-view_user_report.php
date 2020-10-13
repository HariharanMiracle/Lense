<main class="container-fluid p-5">
	<div class="row">
		<div class="col-12 bg-secondary text-center">
			<h2 class="text-white">User report</h2>
		</div>
	</div>

	<br/>
	<div class="row">
		<div class="col-12 bg-light">
			<h4>User details</h4>
		</div>		
	</div>
	<div class="row">
		<div class="col-3">
			<h5><b>User name:</b> <?php echo $user['username']; ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Full name:</b> <?php echo $user['fname'].' '.$user['lname']; ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Contact:</b> <?php echo $user['contact']; ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Email:</b> <?php echo $user['email']; ?></h5>
		</div>
	</div>

	<br/>
	<div class="row">
		<div class="col-12 bg-light">
			<h4>Order statistics</h4>
		</div>			
	</div>
	<div class="row">
		<div class="col-4">
			<h5><b>Total orders:</b> <?php echo sizeof($totalOrder); ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Sucess orders:</b> <?php echo sizeof($deliveredOrder); ?></h5>
		</div>
		<div class="col-4">
			<?php
				$totalEarning = 0;
				foreach ($deliveredOrder as $deliveredOrderObj) {
					$totalEarning += $deliveredOrderObj['total'];
				}
			?>
			<h5><b>Total earnings:</b> <?php echo $totalEarning; ?></h5>
		</div>
	</div>	

	<br/>
	<div class="row">
		<div class="col-12 bg-light">
			<h4>Types of orders & statistics</h4>
		</div>			
	</div>
	<div class="row">
		<div class="col-3">
			<h5><b>Delivered orders:</b> <?php echo sizeof($deliveredOrder); ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Confired orders:</b> <?php echo sizeof($confirmed_order); ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Paid orders:</b> <?php echo sizeof($paid_order); ?></h5>
		</div>
		<div class="col-3">
			<h5><b>Not paid orders:</b> <?php echo sizeof($not_paid_order); ?></h5>
		</div>		
	</div>

	<br/>
	<div class="row">
		<div class="col-12 bg-light">
			<h4>Frame details</h4>
		</div>			
	</div>
	<div class="row">
		<div class="col-4">
			<h5><b>Total frames:</b> <?php echo $tot_frames[0]['tot_frames'] ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Deliverd frames:</b> <?php echo $delivered_frames[0]['delivered_frames'] ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Total amount in delivered:</b> <?php echo $amnt_frames[0]['amnt_frames'].' LKR' ?></h5>
		</div>
	</div>

	<br/>
	<div class="row">
		<div class="col-12 bg-light">
			<h4>Lense details</h4>
		</div>			
	</div>
	<div class="row">
		<div class="col-4">
			<h5><b>Total lenses:</b> <?php echo $tot_lenses[0]['tot_lenses'] ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Deliverd lenses:</b> <?php echo $delivered_lenses[0]['delivered_lenses'] ?></h5>
		</div>
		<div class="col-4">
			<h5><b>Total amount in delivered:</b> <?php echo $amnt_lenses[0]['amnt_lenses'].' LKR' ?></h5>
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
</body>
</html>	