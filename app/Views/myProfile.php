<br/>
<main class="container">
	<div class="border border-light row">
		<div class="col-12">
			<div class="row">
				<div class="col-12 bg-light">
					<div class="float-left">
						<h3>My profile</h3>
					</div>
					<div class="float-right mt-2 pt-1">
						<a href="<?php echo base_url().'/User/edit/'.$_SESSION["user"]["id"]; ?>"><input type = "button" value="edit profile" class="btn btn-info"/></a>	
						<a href="<?php echo base_url().'/Login/deactivate'; ?>"><input type = "button" value="deactivate account" class="btn btn-danger"/></a>
						<a href="<?php echo base_url().'/Login/password_form'; ?>"><input type = "button" value="Change password" class="btn btn-warning"/></a>
					</div>
				</div>
			</div>	

			<div class="row">
				<div class="col-12">
					<h5><b>User name:</b> <?php echo $_SESSION["user"]["username"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<h5><b>First name:</b> <?php echo $_SESSION["user"]["fname"]; ?></h5>
				</div>
				<div class="col-6">
					<h5><b>Last name:</b> <?php echo $_SESSION["user"]["lname"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Contact:</b> <?php echo $_SESSION["user"]["contact"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Date of birth:</b> <?php echo $_SESSION["user"]["dob"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>City:</b> <?php echo $_SESSION["user"]["city"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Country:</b> <?php echo $_SESSION["user"]["country"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Address:</b> <?php echo $_SESSION["user"]["address"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Email:</b> <?php echo $_SESSION["user"]["email"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Description:</b> <?php echo $_SESSION["user"]["description"]; ?></h5>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h5><b>Joined on:</b> <?php echo $_SESSION["user"]["created_on"]; ?></h5>
				</div>
			</div>
		</div>		
	</div>
</main>
<br/>