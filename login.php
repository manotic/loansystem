<?php
include ('includes/header.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $login = $user->login($email, $password); 
        if(!empty($login)) {
            $_SESSION['email'] = $login[0]['email'];
            $_SESSION['name'] = $login[0]['name'];			
            header("Location:index.php");
        } else {
            $loginError = "Invalid email or password!";
        }
    }
}


?>
</head>

<body>
    <main class="form-signin">
        <form method="POST" class="col-3">
            <h1 class="h3 mb-4 fw-normal"><?php echo $systemName ?></h1>

            <div class="form-group">
                <?php if (isset($loginError)) { ?>
                <div class="alert alert-danger rounded-0 py-1"><?php echo @$loginError; ?></div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="floatingInput">Email address</label>
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Log in</button>
            <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
        </form>
    </main>
</body>

</html>