<?php 
if ($_SESSION['role'] == 'member') {

    $userData = $user->getMember();
} else {

    $userData = $user->getUser();
}
if (isset($_POST['update-user'])) {

    $msg = $user->updateUser($userData[0]['password']);

}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Account settings</h2>
</div>

<div class="form">
<form method="POST" class=" row g-3">
    <div class="form-group">
        <?php if (isset($msg)) { ?>
        <div class="alert alert-primary rounded-0 py-1"><?php echo @$msg; ?></div>
        <?php } ?>
    </div>
    <input type="hidden" name="id" value="<?php echo $userData[0]['id']; ?>">
    <div class="col-md-6 mb-3">
        <label for="floatingInput">First name</label>
        <input type="text" value="<?php echo @$userData[0]['firstname'] ?>" name="firstname" class="form-control" id="floatingInput">
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Last name</label>
        <input type="text" value="<?php echo @$userData[0]['lastname'] ?>" name="lastname" class="form-control" id="floatingInput">
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Create new password</label>
        <input type="password" name="password1" class="form-control" id="floatingInput">
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Confirm new password</label>
        <input type="password" name="password2" class="form-control" id="floatingInput">
    </div>
    <div class="">
        <label for="floatingInput">Enter old password to continue</label>
        <input type="password" name="password" class="form-control" id="floatingInput">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="update-user">Update data</button>
</form>
</div>