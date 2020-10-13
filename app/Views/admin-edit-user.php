<main>
<br/>
<br/>
<div class="container">
    <h2>Edit User</h2>
</div>
<br/>
    <form action="<?php echo base_url('User/update0');?>" name="user_create" id="user_create" method="post" accept-charset="utf-8">
        <input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo $user['id'] ?>" required hidden> 

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username<span style="color:red;">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username'] ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email<span style="color:red;">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email'] ?>" required> 
                    </div>                    
                </div>
            </div>

<!--             <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="passwordS">Password</label>

                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required value="<?php echo $user['password'] ?>" onkeyup="chkPassword()">
                        <span id="sp-password" style="color:red;">*</span>
                        <input type="checkbox" onclick="f_pasword()"> &nbsp; Show Current Password
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="repassword">Re-type Password</label>

                        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-type password" required value="<?php echo $user['password'] ?>" onkeyup="chkRePassword()">
                        <span id="sp-repassword" style="color:red;">*</span>
                        <input type="checkbox" onclick="f_re_pasword()"> &nbsp; Show Re-typed Password
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="fname">First name<span style="color:red;">*</span></label>
                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['fname'] ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="lname">Last name<span style="color:red;">*</span></label>
                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['lname'] ?>" required> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact">Contact<span style="color:red;">*</span></label>
                        <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $user['contact'] ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="dob">Date of birth<span style="color:red;">*</span></label>
                        <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $user['dob'] ?>" required> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="city">City<span style="color:red;">*</span></label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $user['city'] ?>" required> 
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="country">Country<span style="color:red;">*</span></label>
                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $user['country'] ?>" required> 
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
                        <textarea class="form-control" name="address" id="address"><?php echo $user['description']; ?></textarea>
                    </div>
                </div>
            </div>    

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="privilege">Privilege<span style="color:red;">*</span></label>
                        <select class="form-control" name="privilege" id="privilege">
                            <option vlaue="0">Choose...</option>
                           	<?php
                           		if($user['privilege'] == 1){
                           			?>
			                            <option vlaue="1" selected>Admin</option>
			                            <option vlaue="2">Customer</option>
                           			<?php
                           		}
                           		else{
                           			?>
			                            <option vlaue="1">Admin</option>
			                            <option vlaue="2" selected>Customer</option>
                           			<?php
                           		}
                           	?>

                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="status">Status<span style="color:red;">*</span></label>
                        <select class="form-control" name="status" id="status">
                            <option vlaue="0">Choose...</option>
                           	<?php
                           		if($user['status'] == 0){
                           			?>
			                            <option vlaue="0" selected>In active</option>
			                            <option vlaue="1">Active</option>
                           			<?php
                           		}
                           		else{
                           			?>
			                            <option vlaue="0">In active</option>
			                            <option vlaue="1" selected>Active</option>
                           			<?php
                           		}
                           	?>

                        </select>
                    </div>
                </div>
            </div>       

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact">Temporary Password &nbsp; <span style="color:red;">Use this if only you need to create a temporary password.</span></label>
                        <input type="text" name="password" id="password" class="form-control"> 
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
</body>
</html>

<script type="text/javascript">

    var passwordS = false;
    var repasswordS = false;

    function validateForm(){

        if(passwordS == true && repasswordS == true){
            return true;
        }
        else{
            return false;   
        }

    }

    function chkPassword(){
        var password = document.getElementById("password").value;
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

        if(password.match(strongRegex)){
            document.getElementById("sp-password").innerHTML = "";
            passwordS = true;
        }
        else{
            document.getElementById("sp-password").innerHTML = "must contain at least one digit, one upper case, one special symbol and minimum of 8 character";
            passwordS = false;
        }

        chkRePassword();
    }

    function chkRePassword(){
        var password = document.getElementById("password").value;
        var repassword = document.getElementById("repassword").value;

        // console.log(password);
        // console.log(repassword);

        if(password == repassword){
            document.getElementById("sp-repassword").innerHTML = "";
            repasswordS = true;
            // console.log("true");
            // console.log(password);
        }
        else{
            document.getElementById("sp-repassword").innerHTML = "Re-typed password doesn't match";
            repasswordS = false;
            // console.log("false");
            // console.log(password);
        }
    }

    function f_pasword() {

      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function f_re_pasword() {

      var x = document.getElementById("repassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>