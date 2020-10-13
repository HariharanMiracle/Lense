<br/>
<main class="container">
	<form action="<?php echo base_url('Checkout');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <h3>Shipping details</h3>
            <div class="form-group">
                <label for="shipping_type_id">Shipping type<span style="color:red;">*</span></label>
                <select name="shipping_type_id" class="form-control" id="shipping_type_id">
                    <option value="0">Choose...</option>
                    <?php
                        foreach($shipping_type as $shipping_typeObj) {
                            ?><option value="<?php echo $shipping_typeObj['id']; ?>"><?php echo $shipping_typeObj['type'].' - ',$shipping_typeObj['rate'].' LKR'; ?></option><?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address<span style="color:red;">*</span></label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Please enter address" required>
            </div>

            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-secondary">Order</button>
            </div>	
	</form>
</main>
<br/>