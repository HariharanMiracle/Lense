<br/>
<main class="container">
	<div class="border border-light row">
		<div class="col-12">
			<div class="row">
				<div class="col-12 bg-light">
					<div class="text-center">
						<h3>Change Password</h3>
					</div>
				</div>
			</div>	
			<div>
				<form action="<?php echo base_url('login/changePassword');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return validateForm()">

		            <div class="form-group">
		                <label for="current_pw">Current Password &nbsp; <span id="current_pw_span" style="color:red;">*</span><span id="current_pw_span1" style="color:green;"></span></label>
		                <input type="password" name="current_pw" class="form-control" id="current_pw" onkeyup="check_current_pw()" required>
		                <input type="checkbox" onclick="f_current_pw()"> &nbsp; Show Current Password
		            </div>	

		            <div class="form-group">
		                <label for="new_pw">New Password &nbsp; <span id="new_pw_span" style="color:red;">*</span><span id="new_pw_span1" style="color:green;"></label>
		                <input type="password" name="new_pw" class="form-control" id="new_pw" onkeyup="check_new_pw()" required>
		                <input type="checkbox" onclick="f_new_pw()"> &nbsp; Show New Password
		            </div>	

		            <div class="form-group">
		                <label for="retype_pw">Retype Password &nbsp; <span id="retype_pw_span" style="color:red;">*</span><span id="retype_pw1" style="color:green;"></label>
		                <input type="password" name="retype_pw" class="form-control" id="retype_pw" onkeyup="chkRePassword()" required>
		                <input type="checkbox" onclick="f_retype_pw()"> &nbsp; Show Retype Password
		            </div>			            		            				

		            <div class="form-group">
		            	<button type="submit" id="send_form" class="btn btn-secondary">Change password</button>
		            </div>
				</form>
			</div>
		</div>		
	</div>
</main>
<br/>

<script type="text/javascript">
	var current_password_status = false;
	var new_pw_status = false;
	var re_pw_status = false;

    function validateForm(){

        if(current_password_status == true && new_pw_status == true && re_pw_status == true){
            return true;
        }
        else{
            return false;   
        }

    }

	function chkRePassword(){
        var re_pw = document.getElementById("retype_pw").value;
        var password = document.getElementById("new_pw").value;

        if(password == re_pw){
            document.getElementById("retype_pw_span").innerHTML = "";
            document.getElementById("retype_pw1").innerHTML = ":)";
            re_pw_status = true;
        }
        else{
            document.getElementById("retype_pw_span").innerHTML = "Re-typed password doesn't match";
            document.getElementById("retype_pw1").innerHTML = "";
            re_pw_status = false;
        }
	}

    function check_new_pw(){
        var new_pw = document.getElementById("new_pw").value;

        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

        if(new_pw.match(strongRegex)){
            document.getElementById("new_pw_span").innerHTML = "";
            document.getElementById("new_pw_span1").innerHTML = ":)";
            new_pw_status = true;
        }
        else{
            document.getElementById("new_pw_span").innerHTML = "must contain at least one digit, one upper case, one special symbol and minimum of 8 character";
            new_pw_status = false;
        }

        chkRePassword();
    }

	function check_current_pw(){
        var current_password = document.getElementById("current_pw").value;

		var exact_val = "<?php echo $_SESSION['pw']; ?>";
		if(current_password != exact_val){
			document.getElementById("current_pw_span").innerHTML = "Password does not match current password";
			current_password_status = false;
		}
		else{
			document.getElementById("current_pw_span").innerHTML = "";
			document.getElementById("current_pw_span1").innerHTML = ":)";
			current_password_status = true;
		}
	}

	function f_current_pw() {
	  var x = document.getElementById("current_pw");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}

	function f_new_pw() {
	  var x = document.getElementById("new_pw");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}

	function f_retype_pw() {

	  var x = document.getElementById("retype_pw");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}
			
</script>