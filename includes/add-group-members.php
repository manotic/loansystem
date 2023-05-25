
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Group members</h2>
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
        <label for="floatingInput">First name</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo @$group[0]['groupname']; ?>" id="floatingInput" placeholder="" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Last name</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo @$group[0]['phonenumber']; ?>" id="floatingInput" placeholder="" required>
    </div>
    <div class="col-md-4">
        <label for="floatingInput">Gender</label>
        <input type="text" name="gender" class="form-control" value="<?php echo @$group[0]['groupemail']; ?>" id="floatingInput" placeholder="MALE/FEMALE" required>
    </div>
    <div class="col-md-4">
        <label for="floatingInput">Email address</label>
        <input type="email" name="email" class="form-control" value="<?php echo @$group[0]['groupemail']; ?>" id="floatingInput" placeholder="name@example.com" required>
    </div>
    <div class="col-md-4">
        <label for="floatingInput">Phone number</label>
        <input type="text" name="phonenumber" class="form-control" value="<?php echo @$group[0]['groupemail']; ?>" id="floatingInput" placeholder="" required>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Physical address</label>
        <input type="text" name="address" class="form-control" value="<?php echo @$group[0]['postaddress']; ?>" id="floatingInput" placeholder="VILLAGE/STREET, WARD, DISTRICT, REGION" required>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Economic activities</label>
        <input type="text" name="activities" class="form-control" value="<?php echo @$group[0]['postaddress']; ?>" id="floatingInput" placeholder="VILLAGE/STREET, WARD, DISTRICT, REGION" required>
    </div>
    <div class="col-md-6 mb-2">
        <select name="position" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
        <option selected="">Select member position in group</option>
        <option value="CHAIRPERSON">CHAIRPERSON</option>
        <option value="SECRETARY">SECRETARY</option>
        <option value="MEMBER">MEMBER</option>
        </select>
    </div>
    <div class="col-md-6">
        <select name="education" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
        <option selected="">Education level</option>
        <option value="SECONDARY">SECONDARY</option>
        <option value="CERTIFICATES">CERTIFICATES</option>
        <option value="O'LEVEL">O'LEVEL</option>
        <option value="UNIVERSITY">UNIVERSITY</option>
        </select>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="add-memmber">Add member</button>
</form>
</div>

