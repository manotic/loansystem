
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
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Group name</label>
        <input type="text" name="groupname" class="form-control" id="floatingInput" placeholder="KILELO BODABODA GROUP " required>
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Short name</label>
        <input type="text" name="shortname" class="form-control" id="floatingInput" placeholder="KBG" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Group phone number</label>
        <input type="text" name="phonenumber" class="form-control" id="floatingInput" placeholder="0752123698" required>
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Email address</label>
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Location</label>
        <input type="text" name="location" class="form-control" id="floatingInput" placeholder="VILLAGE/STREET, WARD, DISTRICT, REGION" required>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Post address</label>
        <input type="text" name="postaddress" class="form-control" id="floatingInput" placeholder="P.O.BOX 0000 DAR ES SALAAM" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Contact person phone number</label>
        <input type="text" name="contactnumber" class="form-control" id="floatingInput" placeholder="0752123698" required>
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Contact person name</label>
        <input type="text" name="contactname" class="form-control" id="floatingInput" placeholder="JOHN DOE" required>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Register Group</button>
</form>
</div>