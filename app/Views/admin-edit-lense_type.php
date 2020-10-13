<main class="container">
	<h3>Edit Lense Type</h3>
	<div class="container">
		<form action="<?php echo base_url('Lense_Type/update');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="text" name="lense_type_id" id="lense_type_id" class="form-control" placeholder="Please enter id" value="<?php echo $lense_type['id']; ?>" hidden required>
            <div class="form-group">
                <label for="category_name">Lense Type<span style="color:red;">*</span></label>
                <input type="text" name="lense_type_name" class="form-control" id="lense_type_name" placeholder="Please enter lense type" value="<?php echo $lense_type['name']; ?>" required>
            </div>
                            
            <div class="form-group">
                <label for="lense_type_desc">Description<span style="color:red;">*</span></label>
                <input type="text" name="lense_type_desc" class="form-control" id="lense_type_desc" placeholder="Please enter lense type description" value="<?php echo $lense_type['description']; ?>" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Update Lense Type</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>