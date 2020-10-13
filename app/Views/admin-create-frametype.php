<main class="container">
    <h3>Add Frame Type</h3>
	<div class="container">
		<form action="<?php echo base_url('Frame_Type/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="frame_type_name">Frame Type<span style="color:red;">*</span></label>
                <input type="text" name="frame_type_name" class="form-control" id="frame_type_name" placeholder="Please enter frame type" required>
            </div>
                            
            <div class="form-group">
                <label for="frame_type_desc">Description<span style="color:red;">*</span></label>
                <input type="text" name="frame_type_desc" class="form-control" id="frame_type_desc" placeholder="Please enter frame type description" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Save Frame Type</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>