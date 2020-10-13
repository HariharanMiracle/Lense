<main class="container">
	<h3>Edit Frame Type</h3>
	<div class="container">
		<form action="<?php echo base_url('Frame_Type/update');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="text" name="frame_type_id" id="frame_type_id" class="form-control" placeholder="Please enter id" value="<?php echo $frame_type['id']; ?>" hidden required>
            <div class="form-group">
                <label for="category_name">Frame Type<span style="color:red;">*</span></label>
                <input type="text" name="frame_type_name" class="form-control" id="frame_type_name" placeholder="Please enter frame type" value="<?php echo $frame_type['name']; ?>" required>
            </div>
                            
            <div class="form-group">
                <label for="frame_type_desc">Description<span style="color:red;">*</span></label>
                <input type="text" name="frame_type_desc" class="form-control" id="frame_type_desc" placeholder="Please enter frame type description" value="<?php echo $frame_type['description']; ?>" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Update Frame Type</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>