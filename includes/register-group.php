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
        <div class="alert alert-primary rounded-0 py-1"><?php echo @$msg; ?></div>
        <?php } ?>
    </div>
    <input type="hidden" name="id" value="<?php echo @$group[0]['id']; ?>">
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Group name</label>
        <input type="text" value="<?php echo @$group[0]['groupname'] ?>" name="groupname" class="form-control" id="floatingInput" placeholder="KILELO BODABODA GROUP ">
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Short name</label>
        <input type="text" value="<?php echo @$group[0]['shortname'] ?>" name="shortname" class="form-control" id="floatingInput" placeholder="KBG">
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Group phone number</label>
        <input type="text" value="<?php echo @$group[0]['phonenumber'] ?>" name="phonenumber" class="form-control" id="floatingInput" placeholder="0752123698">
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Email address</label>
        <input type="email" value="<?php echo @$group[0]['groupemail'] ?>" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" >
    </div>
    <div class="mb-3">
        <label for="floatingInput">Location</label>
        <input type="text" value="<?php echo @$group[0]['location'] ?>" name="location" class="form-control" id="floatingInput" placeholder="VILLAGE/STREET, WARD, DISTRICT, REGION"  >
    </div>
    <div class="mb-3">
        <label for="floatingInput">Post address</label>
        <input type="text" value="<?php echo @$group[0]['postaddress'] ?>" name="address" class="form-control" id="floatingInput" placeholder="P.O.BOX 0000 DAR ES SALAAM"  >
    </div>
    <div class="col-md-6 mb-3">
        <label for="floatingInput">Contact person phone number</label>
        <input type="text" value="<?php echo @$group[0]['contactphone'] ?>" name="contactnumber" class="form-control" id="floatingInput" placeholder="0752123698"  >
    </div>
    <div class="col-md-6">
        <label for="floatingInput">Contact person name</label>
        <input type="text" value="<?php echo @$group[0]['contactname'] ?>" name="contactname" class="form-control" id="floatingInput" placeholder="JOHN DOE"  >
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Register Group</button>
</form>
</div>

<div class="bd-example mt-5">
<table class="table table-striped">
    <thead>
    <tr>
    <!-- <th scope="col">#</th> -->
    <th scope="col">Group name</th>
    <th scope="col">Short name</th>
    <th scope="col">Phone number</th>
    <th scope="col">Email address</th>
    <th scope="col">Location</th>
    <th scope="col">Post address</th>
    <th scope="col">Contact person name</th>
    <th scope="col">Contact person number</th>
    </tr>
    </thead>
    <tbody>
<?php 
echo '<tr>';
// echo '<th scope="row">'.$rownum.'</th>';
echo '<td>'.@$group[0]['groupname'].'</td>';
echo '<td>'.@$group[0]['shortname'].'</td>';
echo '<td>'.@$group[0]['phonenumber'].'</td>';
echo '<td>'.@$group[0]['groupemail'].'</td>';
echo '<td>'.@$group[0]['location'].'</td>';
echo '<td>'.@$group[0]['postaddress'].'</td>';
echo '<td>'.@$group[0]['contactphone'].'</td>';
echo '<td>'.@$group[0]['contactname'].'</td>';
// echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-members&member_del='.$member[$i]['id'].'&email='.$member[$i]['email'].'">Delete</a></td>';
echo '</tr>';
?>
    </tbody>
</table>
</div>