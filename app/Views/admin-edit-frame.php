<main class="container">
    <h3>Edit Frame</h3>
	<div class="container">
		<form action="<?php echo base_url('Frame/update');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="form-group">
                <input type="text" name="frame_id" class="form-control" id="frame_id" placeholder="Please enter frame_id" value="<?php echo $frame['id']; ?>" hidden required>
            </div>

            <div class="form-group">
                <label for="frametype_id">Frame Type<span style="color:red;">*</span></label>
                <select name="frametype_id" class="form-control" id="frametype_id">
                    <?php
                        foreach($frame_type as $obj) {
                        	if($frame['frametype_id'] == $obj['id']){
                            	?><option value="<?php echo $obj['id']; ?>" selected><?php echo $obj['name']; ?></option><?php
                        	}
                        	else{
                            	?><option value="<?php echo $obj['id']; ?>"><?php echo $obj['name']; ?></option><?php
                        	}
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="type">Type<span style="color:red;">*</span></label>
                <select name="type" class="form-control" id="type">
                    <?php
                        if($obj['type'] == 0){
                            ?><option value="2">Uni-sex</option><?php
                            ?><option value="1">Men</option><?php
                            ?><option value="0" selecetd>Women</option><?php
                            ?><option value="3">Children</option><?php
                        }
                        else if($obj['type'] == 1){
                            ?><option value="2">Uni-sex</option><?php
                            ?><option value="1" selecetd>Men</option><?php
                            ?><option value="0">Women</option><?php
                            ?><option value="3">Children</option><?php
                        }
                        else if($obj['type'] == 2){
                            ?><option value="2" selecetd>Uni-sex</option><?php
                            ?><option value="1">Men</option><?php
                            ?><option value="0">Women</option><?php
                            ?><option value="3">Children</option><?php
                        }
                        else{
                            ?><option value="2">Uni-sex</option><?php
                            ?><option value="1">Men</option><?php
                            ?><option value="0">Women</option><?php
                            ?><option value="3" selected>Children</option><?php
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="model">Frame Model<span style="color:red;">*</span></label>
                <input type="text" name="model" class="form-control" id="model" placeholder="Please enter frame model" value="<?php echo $frame['model']; ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Frame Name<span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter Frame name" value="<?php echo $frame['name']; ?>" required>
            </div>            
                    
            <div class="form-group">
                <label for="description">Description<span style="color:red;">*</span></label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Please enter description" value="<?php echo $frame['description']; ?>" required>
            </div>             
            
            <div class="form-group">
                <label for="price">Price<span style="color:red;">*</span></label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Please enter price" value="<?php echo $frame['price']; ?>" required>
            </div> 

            <div class="form-group">
                <label for="brand_id">Brand<span style="color:red;">*</span></label>
                <select name="brand_id" class="form-control" id="brand_id">
                    <option value="0">Choose...</option>
                    <?php
                        foreach($brand as $brandObj) {
                            if($brandObj['id'] == $frame['brand']){
                                ?><option selected value="<?php echo $brandObj['id']; ?>"><?php echo $brandObj['name']; ?></option><?php
                            }
                            else{
                                ?><option value="<?php echo $brandObj['id']; ?>"><?php echo $brandObj['name']; ?></option><?php
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="stock">Stock<span style="color:red;">*</span></label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock" value="<?php echo $frame['stock']; ?>" required>
            </div>             

            <br/>
            <h4>Edit Frame Image</h4>
            <br/>

			<div class="form-group">
                <input type="text" name="frame_image_id" class="form-control" id="frame_image_id" placeholder="Please enter frame_image_id" value="<?php echo $frame_image['id']; ?>" hidden required>
            </div>

            <div class="form-group">
                <label for="title">Title<span style="color:red;">*</span></label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Please enter title" value="<?php echo $frame_image['title']; ?>" required>
            </div> 

            <div class="form-group">
                <label for="alt">Alt<span style="color:red;">*</span></label>
                <input type="text" name="alt" class="form-control" id="alt" placeholder="Please enter alt" value="<?php echo $frame_image['alt']; ?>" required>
            </div> 

            <div class="form-group">
                <label for="imagex">Image<span style="color:red;">* Choose an image if you want to change the original one.</span></label>
                <input type="file" name="imagex" class="form-control" id="imagex">
            </div>

            <div class="row">
            	<h4><b>Original image</b></h4>
            </div>
            <div class="row">
            	<div>
            		<img src="<?php echo base_url().'/uploads/frameImage/'.$frame_image['path']; ?>" height="160px" width="160px" alt="<?php echo $frame_image['alt'] ?>"/>
            	</div>
            </div>
            
            <br/>
            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Update Frame</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>