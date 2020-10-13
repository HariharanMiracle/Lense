<br/>


<main class="container">
<br/>
<br/>
<div class="container">
    <h2>Edit User</h2>
</div>
<br/>
    <form action="<?php echo base_url('User/update1');?>" name="user_create" id="user_create" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
        <div class="container">
        	<input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo $user['id']; ?>"  hidden required> 
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username<span style="color:red;">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username']; ?>" required readonly> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email<span style="color:red;">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>" required> 
                    </div>                    
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="fname">First name<span style="color:red;">*</span></label>
                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['fname']; ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="lname">Last name<span style="color:red;">*</span></label>
                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['lname']; ?>" required> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact">Contact<span style="color:red;">*</span></label>
                        <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $user['contact']; ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="dob">Date of birth<span style="color:red;">*</span></label>
                        <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $user['dob']; ?>" required> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="city">City<span style="color:red;">*</span></label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $user['city']; ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="country">Country<span style="color:red;">*</span></label>
                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $user['country']; ?>" required> 
                    </div>
                </div>                
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Description<span style="color:red;">*</span></label>
                        <textarea class="form-control" name="description" id="description"><?php echo $user['description']; ?></textarea>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Address<span style="color:red;">*</span></label>
                        <textarea class="form-control" name="address" id="address"><?php echo $user['address']; ?></textarea>
                    </div>
                </div>
            </div>       

            <div class="row text-center">
                <div class="col-12">
                    <input class="btn btn-primary" type = "submit" value = "Submit" name = "submit"/>
                </div>
            </div>   
        </div>
    </form>                    

</main>
<br/>