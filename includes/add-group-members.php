<?php 
if (isset($_POST['add-member'])) {
    
    $msg = $user->saveMember();
}

$member = $user->getMembers();

if (isset($_GET['member_del']) && ($_GET['email'])) {

    $del = $user->delGroupMember($_GET['member_del'], $_GET['email']);
    header("Location:index.php?url=group-members");
}

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Group members</h2>
</div>

<div class="bd-example mt-5">
<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">First name</th>
    <th scope="col">Last name</th>
    <th scope="col">Email</th>
    <th scope="col">Phone number</th>
    <th scope="col">Position</th>
    <th scope="col">Member status</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
$rownum = 1;

if ($member != NULL) {
    for ($i=0; $i < sizeof($member); $i++) {

        echo '<tr>';
        echo '<th scope="row">'.$rownum.'</th>';
        echo '<td>'.$member[$i]['firstname'].'</td>';
        echo '<td>'.$member[$i]['lastname'].'</td>';
        echo '<td>'.$member[$i]['email'].'</td>';
        echo '<td>'.$member[$i]['phonenumber'].'</td>';
        echo '<td>'.$member[$i]['position'].'</td>';
        echo '<td>'.$member[$i]['status'].'</td>';
        echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-members&member_del='.$member[$i]['id'].'&email='.$member[$i]['email'].'">Delete</a></td>';
        echo '</tr>';

        $rownum++;
    } 
} else {
    echo '<tr>';
    echo '<th scope="row" colspan="8">No results</th>';
    echo '</tr>';
}
?>
    </tbody>
</table>
</div>

<div class="form mb-5">
<h1 class="h3 mt-5">Add member</h2>
<div class="form-group">
    <?php if (isset($msg)) { ?>
    <div class="alert alert-primary rounded-0 py-1"><?php echo @$msg; ?></div>
    <?php } ?>
</div>
<form method="POST" class=" row g-3">
    
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
        <input type="text" name="activities" class="form-control" value="<?php echo @$group[0]['postaddress']; ?>" id="floatingInput" placeholder="MJASIRIAMALI" required>
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
        <option value="O LEVEL">O'LEVEL</option>
        <option value="UNIVERSITY">UNIVERSITY</option>
        </select>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="add-member">Add member</button>
</form>
</div>