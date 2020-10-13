<style>
    #grad1 {
        height: 55px;
        background: url("<?php echo base_url() . '/images/th.jpg'?>") no-repeat;
        background-size: cover;
    }

    .login-form {
        padding: 20px;
        background: #ffffff73;
        border-radius: 5px;
        margin-top: 60px;
        margin-bottom: 60px;
    }

    .login-icon {
        border-radius: 50%;
        height: 90px;
        width: 90px;
        background: #4e888c;
        color: #ffffff;
        margin: -60px auto auto;
    }

    .btn-login {
        background: #4e888c;
    }
</style>
<body id="grad1">
<div class="container h-100">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 align-middle">
            <div class="card login-form text-center">
                <span class="login-icon"><i class="fa fa-user fa-4x p-4"></i></span>
                <h1 class=" mb-5">Login</h1>
                <form action="<?php echo base_url('Login'); ?>" name="login" id="login" method="post"
                      accept-charset="utf-8">
                    <div class="text-center">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group text-left">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Password"
                                   autocomplete="off" required>
                            <input class="mt-3" type="checkbox" onclick="f_pasword()"> Show Password
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-login w-100">Login</button>
                        </div>
                        <div>
                            <span class="text-danger"><b> <?php echo $_SESSION['login_msg']; ?> </b></span>
                        </div>
                        <p>Don't Have a account? <a class="btn btn-link px-1 text-dark "
                                                    href="<?php echo base_url('User/create'); ?>">Click Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function f_pasword() {

        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>