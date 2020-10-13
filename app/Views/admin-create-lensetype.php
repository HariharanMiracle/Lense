<main class="container">
    <h3>Add Lense Type</h3>
	<div class="container">
		<form action="<?php echo base_url('Lense_Type/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="lense_type_name">Lense Type<span style="color:red;">*</span></label>
                <input type="text" name="lense_type_name" class="form-control" id="lense_type_name" placeholder="Please enter lense type" required>
            </div>
                            
            <div class="form-group">
                <label for="lense_type_desc">Description<span style="color:red;">*</span></label>
                <input type="text" name="lense_type_desc" class="form-control" id="lense_type_desc" placeholder="Please enter ense type description" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Save Lense Type</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>