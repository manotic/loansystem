
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Group registration</h2>
    </div>
    <div class="form">
    <form method="POST" class=" row g-3">
        <!-- <h1 class="h3 mb-4 fw-normal"><?php echo $systemName ?></h1> -->

        <div class="form-group">
            <?php if (isset($loginError)) { ?>
            <div class="alert alert-danger rounded-0 py-1"><?php echo @$loginError; ?></div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <label for="floatingInput">First name</label>
            <input type="firstname" name="firstname" class="form-control" id="floatingInput" value="<?php echo @$_POST['firstname'] ?>" placeholder="John " required>
        </div>
        
        <div class="col-md-6">
            <label for="floatingInput">Last name</label>
            <input type="lastname" name="lastname" class="form-control" id="floatingInput" value="<?php echo @$_POST['lastname'] ?>" placeholder="Doe" required>
        </div>
        <div class="mb-1">
            <label for="floatingInput">Email address</label>
            <input type="email" name="email" class="form-control" id="floatingInput" value="<?php echo @$_POST['email'] ?>" placeholder="name@example.com" required>
        </div>
        <div class="mb-1">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control <?php if (isset($passwordError)) echo "is-invalid" ?>" id="Password" placeholder="Password" required>
        </div>
        <div class="mb-1">
            <label for="Password">Confirm password</label>
            <input type="password" name="password2" class="form-control <?php if (isset($passwordError)) echo "is-invalid" ?>" id="Password" placeholder="Password" required>
            <div class="invalid-feedback">
            <?php if (isset($passwordError)) echo $passwordError; ?>
        </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Sign Up</button>
        <div class="mt-3">
            <p>Already have an Account? <a href="login.php">Sign In</a></p>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
    </form>
    </div>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>