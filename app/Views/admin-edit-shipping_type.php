<main class="container">
	<h3>Edit Shipping-type</h3>
	<div class="container">
		<form action="<?php echo base_url('Shipping_type/update');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="text" name="shipping_type_id" id="shipping_type_id" class="form-control" placeholder="Please enter id" value="<?php echo $shipping_type['id']; ?>" required hidden>
            <div class="form-group">
                <label for="name">Shipping type<span style="color:red;">*</span></label>
                <input type="text" name="type" class="form-control" id="type" placeholder="Please enter shipping type" value="<?php echo $shipping_type['type']; ?>" required>
            </div>
                            
            <div class="form-group">
                <label for="rate">Rate<span style="color:red;">*</span></label>
                <input type="text" name="rate" class="form-control" id="rate" placeholder="Please enter shipping rate" value="<?php echo $shipping_type['rate']; ?>" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Update Shipping-type</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>