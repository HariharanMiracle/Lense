<main class="container">
    <h3>Add Frame</h3>
	<div class="container">
		<form action="<?php echo base_url('Frame/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="frametype_id">Frame Type<span style="color:red;">*</span></label>
                <select name="frametype_id" class="form-control" id="frametype_id">
                    <?php
                        foreach($frame_type as $obj) {
                            ?><option value="<?php echo $obj['id']; ?>"><?php echo $obj['name']; ?></option><?php
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="type">Type<span style="color:red;">*</span></label>
                <select name="type" class="form-control" id="type">
                    <option value="2">Uni-sex</option>
                    <option value="1">Men</option>
                    <option value="0">Women</option>
                    <option value="3">Childern</option>
                </select>
            </div>

            <div class="form-group">
                <label for="model">Frame Model<span style="color:red;">*</span></label>
                <input type="text" name="model" class="form-control" id="model" placeholder="Please enter frame model" required>
            </div>

            <div class="form-group">
                <label for="name">Frame Name<span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter Frame name" required>
            </div>            
                    
            <div class="form-group">
                <label for="description">Description<span style="color:red;">*</span></label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Please enter description" required>
            </div>             
            
            <div class="form-group">
                <label for="price">Price<span style="color:red;">*</span></label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Please enter price" required>
            </div> 

            <div class="form-group">
                <label for="brand_id">Brand<span style="color:red;">*</span></label>
                <select name="brand_id" class="form-control" id="brand_id">
                    <?php
                        foreach($brand as $brandObj) {
                            ?><option value="<?php echo $brandObj['id']; ?>"><?php echo $brandObj['name']; ?></option><?php
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="stock">Stock<span style="color:red;">*</span></label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock" required>
            </div>

            <br/>
            <h4>Add Frame Image</h4>
            <br/>
            <div class="form-group">
                <label for="title">Title<span style="color:red;">*</span></label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Please enter title" required>
            </div> 

            <div class="form-group">
                <label for="alt">Alt<span style="color:red;">*</span></label>
                <input type="text" name="alt" class="form-control" id="alt" placeholder="Please enter alt" required>
            </div> 

            <div class="form-group">
                <label for="imagex">Image<span style="color:red;">*</span></label>
                <input type="file" name="imagex" class="form-control" id="imagex" required>
            </div>

            <br/>
            <h4>Add side & front images</h4>
            <br/>

            <div class="row">
                <div class="col-4">
                    <label for="imagex">Side view image 1<span style="color:red;">*</span></label>
                    <input type="file" name="side_view_1" class="form-control" id="side_view_1" required>
                </div>
                <div class="col-4">
                    <label for="imagex">Front image<span style="color:red;">*</span></label>
                    <input type="file" name="front_view" class="form-control" id="front_view" required>                    
                </div>
                <div class="col-4">
                    <label for="imagex">Side view image 2<span style="color:red;">*</span></label>
                    <input type="file" name="side_view_2" class="form-control" id="side_view_2" required>                    
                </div>
            </div>

            <br/>

            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-orange">Save Frame</button>
            </div> 
        </form>
	</div>
</main>
</body>
</html>