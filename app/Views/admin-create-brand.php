<main class="container">
    <h3>Add Brand</h3>
	<div class="container">
		<form action="<?php echo base_url('Brand/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Brand name<span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter brand name" required>
            </div>
                            
            <div class="form-group">
                <label for="desc">Description<span style="color:red;">*</span></label>
                <input type="text" name="desc" class="form-control" id="desc" placeholder="Please enter brand description" required>
            </div>
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Save Brand</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>