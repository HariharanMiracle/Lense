<br/>
<main class="container">
	<form action="<?php echo base_url('Payment');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <h3>Payment details</h3>
            <div class="form-group">
                <label for="type">Payment type<span style="color:red;">*</span></label>
                <select name="type" class="form-control" id="type">
                    <option value="0">Choose...</option>
                    <option value="ez-cash">Ez cash</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Reference<span style="color:red;">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon" id="glass_name"><i class="fa fa-camera"></i></span>
                    <input type="file" name="pic" class="form-control" id="pic">
                </div>
            </div>

            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-secondary">Submit</button>
            </div>	
	</form>
</main>
<br/>