<main class="container">
    <h3>Edit Lense Shade</h3>
	<div class="container">
		<form action="<?php echo base_url('Lense_shade/update');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="form-group">
                <input type="text" name="lense_shade_id" class="form-control" id="lense_shade_id" placeholder="Please enter lense_shade_id" value="<?php echo $lense_shade['id']; ?>" hidden required>
            </div>

            <div class="form-group">
                <label for="name">Lense Shade Name<span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter Lense Shade name" value="<?php echo $lense_shade['name']; ?>" required>
            </div>            
            
            <div class="form-group">
                <label for="price">Price<span style="color:red;">*</span></label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Please enter price" value="<?php echo $lense_shade['price']; ?>" required>
            </div> 

            <br/>
            <h4>Edit Frame Image</h4>
            <br/>

            <div class="form-group">
                <label for="imagex">Image<span style="color:red;">* Choose an image if you want to change the original one.</span></label>
                <input type="file" name="imagex" class="form-control" id="imagex">
            </div>

            <div class="row">
            	<h4><b>Original image</b></h4>
            </div>
            <div class="row">
            	<div>
            		<img src="<?php echo base_url().'/uploads/frameImage/'.$lense_shade['path']; ?>" height="160px"/>
            	</div>
            </div>
            
            <br/>
            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Update Lense Shade</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>