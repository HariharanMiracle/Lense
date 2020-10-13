<style>
    #grad1 {
        height: 55px;
        background: url("<?php echo base_url() . '/images/th.jpg'?>") no-repeat;
        background-size: cover;
    }
</style>
<body id="grad1">
<main>
    <br/>
    <form action="<?php echo base_url('User/store'); ?>" name="user_create" id="user_create" method="post"
          accept-charset="utf-8" onsubmit="return validateForm()">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="padding: 20px; background: #ffffff7a;border-radius: 5px;">
                    <div class="row">
                        <div class="col-12 border-bottom mb-4">
                            <div class="float-left">
                                <h2 class="pt-0">Registration</h2>
                            </div>
                            <div class="float-right  "><a href="<?php echo base_url('Home'); ?>"><input
                                            class="btn btn-primary"
                                            type="button" value="Home"
                                            name="Home"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="username">Username &nbsp; <span
                                            style="color:red;"><?php echo $userErrMsg; ?></span></label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email<span style="color:red;">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="passwordS">Password</label>

                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Password" required onkeyup="chkPassword()">
                                <span id="sp-password" style="color:red;">*</span>
                                <input type="checkbox" onclick="f_pasword()"> &nbsp; Show Current Password
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="repassword">Re-type Password</label>

                                <input type="password" name="repassword" id="repassword" class="form-control"
                                       placeholder="Re-type password" required onkeyup="chkRePassword()">
                                <span id="sp-repassword" style="color:red;">*</span>
                                <input type="checkbox" onclick="f_re_pasword()"> &nbsp; Show Re-type Password
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fname">First name<span style="color:red;">*</span></label>
                                <input type="text" name="fname" id="fname" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="lname">Last name<span style="color:red;">*</span></label>
                                <input type="text" name="lname" id="lname" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="contact">Contact<span style="color:red;">*</span></label>
                                <input type="text" name="contact" id="contact" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dob">Date of birth<span style="color:red;">*</span></label>
                                <input type="date" name="dob" id="dob" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city">City<span style="color:red;">*</span></label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="country">Country<span style="color:red;">*</span></label>
                                <input type="text" name="country" id="country" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="description">Description<span style="color:red;">*</span></label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="address">Address<span style="color:red;">*</span></label>
                                <textarea class="form-control" name="address" id="address"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row text-right">
                        <div class="col-12">
                            <input class="btn btn-primary" type="submit" value="Submit" name="submit"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
</main>
</body>
</html>

<script type="text/javascript">

    var passwordS = false;
    var repasswordS = false;

    function validateForm() {

        if (passwordS == true && repasswordS == true) {
            return true;
        } else {
            return false;
        }

    }

    function chkPassword() {
        var password = document.getElementById("password").value;
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

        if (password.match(strongRegex)) {
            document.getElementById("sp-password").innerHTML = "";
            passwordS = true;
        } else {
            document.getElementById("sp-password").innerHTML = "must contain at least one digit, one upper case, one special symbol and minimum of 8 character";
            passwordS = false;
        }

        chkRePassword();
    }

    function chkRePassword() {
        var password = document.getElementById("password").value;
        var repassword = document.getElementById("repassword").value;

        // console.log(password);
        // console.log(repassword);

        if (password == repassword) {
            document.getElementById("sp-repassword").innerHTML = "";
            repasswordS = true;
            // console.log("true");
            // console.log(password);
        } else {
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


