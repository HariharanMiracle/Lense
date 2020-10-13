<main class="container">
	<h3>Edit Lense</h3>
	<div class="container">
		<form action="<?php echo base_url('Lense/update');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="text" name="lense_id" id="lense_id" class="form-control" placeholder="Please enter id" value="<?php echo $lense['id']; ?>" hidden required>

            <div class="form-group">
                <label for="lensetype_id">Lense Type<span style="color:red;">*</span></label>
                <select name="lensetype_id" class="form-control" id="lensetype_id">
                    <option value="0">Choose...</option>
                    <?php
                        foreach($lense_type as $obj) {
                            if($obj['id'] == $lense['lensetype_id']){
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
                <label for="model">Lense Model<span style="color:red;">*</span></label>
                <input type="text" name="model" class="form-control" id="model" placeholder="Please enter lense model" value="<?php echo $lense['model']; ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Lense Name<span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter lense name" value="<?php echo $lense['name']; ?>" required>
            </div>            
                    
            <div class="form-group">
                <label for="description">Description<span style="color:red;">*</span></label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Please enter description" value="<?php echo $lense['description']; ?>" required>
            </div>             
            
<!--             <div class="form-group">
                <label for="power">Power<span style="color:red;">*</span></label>
                <input type="text" name="power" class="form-control" id="power" placeholder="Please enter power" value="<?php //echo $lense['power']; ?>" required>
            </div>  -->

            <div class="form-group">
                <label for="price">Price<span style="color:red;">*</span></label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Please enter price" value="<?php echo $lense['price']; ?>" required>
            </div> 
                            
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Update Lense</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>