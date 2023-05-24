<?php
if (isset($_POST['register'])) {
    
    $msg = $user->registerGroup();
}

$group = $user->getGroup();
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Group registration</h2>
</div>
<div class="form">
<form method="POST" class=" row g-3">
    <div class="form-group">
        <?php if (isset($msg)) { ?>
        <div class="alert alert-success rounded-0 py-1"><?php echo @$msg; ?></div>
        <?php } ?>
    </div>
    <input type="hidden" name="id" value="<?php echo @$group[0]['id']; ?>">
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Group name</label>
        <input type="text" name="groupname" class="form-control" value="<?php echo @$group[0]['groupname']; ?>" id="floatingInput" placeholder="KILELO BODABODA GROUP " required>
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Short name</label>
        <input type="text" name="shortname" class="form-control" value="<?php echo @$group[0]['shortname']; ?>" id="floatingInput" placeholder="KBG" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Group phone number</label>
        <input type="text" name="phonenumber" class="form-control" value="<?php echo @$group[0]['phonenumber']; ?>" id="floatingInput" placeholder="0752123698" required>
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Email address</label>
        <input type="email" name="email" class="form-control" value="<?php echo @$group[0]['groupemail']; ?>" id="floatingInput" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo @$group[0]['location']; ?>" id="floatingInput" placeholder="VILLAGE/STREET, WARD, DISTRICT, REGION" required>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Post address</label>
        <input type="text" name="address" class="form-control" value="<?php echo @$group[0]['postaddress']; ?>" id="floatingInput" placeholder="P.O.BOX 0000 DAR ES SALAAM" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Contact person phone number</label>
        <input type="text" name="contactnumber" class="form-control" value="<?php echo @$group[0]['contactphone']; ?>" id="floatingInput" placeholder="0752123698" required>
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Contact person name</label>
        <input type="text" name="contactname" class="form-control" value="<?php echo @$group[0]['contactname']; ?>" id="floatingInput" placeholder="JOHN DOE" required>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Register Group</button>
</form>
</div>