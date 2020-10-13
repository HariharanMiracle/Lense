<main class="container">
    <h3>Add Shipping-type</h3>
	<div class="container">
		<form action="<?php echo base_url('Shipping_type/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="type">Shipping type<span style="color:red;">*</span></label>
                <input type="text" name="type" class="form-control" id="type" placeholder="Please enter shipping type" required>
            </div>
                            
            <div class="form-group">
                <label for="rate">Rate<span style="color:red;">*</span></label>
                <input type="text" name="rate" class="form-control" id="rate" placeholder="Please enter rate" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Save Shipping-type</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>