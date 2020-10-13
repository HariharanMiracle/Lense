<main class="container">
    <h3>Add Lense Shade</h3>
	<div class="container">
		<form action="<?php echo base_url('Lense_shade/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Lense Shade Name<span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter Lense Shade name" required>
            </div>            
            
            <div class="form-group">
                <label for="price">Price<span style="color:red;">*</span></label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Please enter price" required>
            </div> 

            <div class="form-group">
                <label for="imagex">Image<span style="color:red;">*</span></label>
                <input type="file" name="imagex" class="form-control" id="imagex" required>
            </div>

            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Save Lense Shade</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>