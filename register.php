<?php
include ('includes/header.php');

?>
<body>
    <main class="form-signin">
    <form method="POST" class=" row g-3 col-4">
            <h1 class="h3 mb-4 fw-normal"><?php echo $systemName ?></h1>

            <div class="form-group">
                <?php if (isset($loginError)) { ?>
                <div class="alert alert-danger rounded-0 py-1"><?php echo @$loginError; ?></div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <label for="floatingInput">First name</label>
                <input type="firstname" name="firstname" class="form-control" id="floatingInput" placeholder="John">
            </div>
            
            <div class="col-md-6">
                <label for="floatingInput">Last name</label>
                <input type="firstname" name="firstname" class="form-control" id="floatingInput" placeholder="Doe">
            </div>
            <div class="mb-1">
                <label for="floatingInput">Email address</label>
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="mb-1">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
            </div>
            <div class="mb-1">
                <label for="Password">Confirm password</label>
                <input type="password" name="password2" class="form-control is-invalid" id="Password" placeholder="Password">
                <div class="invalid-feedback">
              Password do not match!
            </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign Up</button>
            <div class="mt-3">
                <p>Already have an Account? <a href="login.php">Sign In</a></p>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
        </form>
    </main>
</body>
</html>