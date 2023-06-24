<?php 
$group = $user->getGroupsDetails($_GET['group']);
$activity = $user->getActivityDetails($group[0]['groupadminid']);
$member = $user->getMembersDetails($group[0]['groupadminid']);
$application = $user->getApplicationDetails($group[0]['groupadminid']);
$check = $user->applicationValidation($group[0]['groupadminid']);
    
if (isset($_POST['application'])) {

        $update = $user->updateApplication($group[0]['groupadminid']);


}

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Admin dashboard</h2>
</div>

<div class="form mt-5">
    <h2 class="h4 mb-3">Group details</h2>
</div>
<div class="bd-example mt-3">
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
    <!-- <th scope="col">More</th> -->
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
        // echo '<td class="table-info">'.@$application[0]['status'].'</td>';
        // echo '<td><a class="badge squire-pill bg-info" href="index.php?url=group-details&group='.@$group[$i]['id'].'">View more</a></td>';
        echo '</tr>';

?>
    </tbody>
</table>
</div>

<div class="form mt-5">
    <h2 class="h4 mb-3">Group members</h2>
</div>
<div class="bd-example mt-3">
<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">First name</th>
    <th scope="col">Last name</th>
    <th scope="col">Phone number</th>
    <th scope="col">Position</th>
    <th scope="col">Activities</th>
    <th scope="col">Member status</th>
    <!-- <th scope="col">Action</th> -->
    </tr>
    </thead>
    <tbody>
<?php
$rownum = 1;
for ($i=0; $i < sizeof($member); $i++) {

    echo '<tr>';
    echo '<th scope="row">'.$rownum.'</th>';
    echo '<td>'.$member[$i]['firstname'].'</td>';
    echo '<td>'.$member[$i]['lastname'].'</td>';
    echo '<td>'.$member[$i]['phonenumber'].'</td>';
    echo '<td>'.$member[$i]['position'].'</td>';
    echo '<td>'.$member[$i]['activities'].'</td>';
    echo '<td>'.$member[$i]['status'].'</td>';
    // echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-members&member_del='.$member[$i]['id'].'&email='.$member[$i]['email'].'">Delete</a></td>';
    echo '</tr>';

    $rownum++;
}
?>
    </tbody>
</table>
</div>

<div class="form mt-5">
    <h2 class="h4 mb-3">Group activities</h2>
</div>
<div class="bd-example mt-3">
<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Activities</th>
    <th scope="col">Attachment</th>
    <!-- <th scope="col">Action</th> -->
    </tr>
    </thead>
    <tbody>
<?php
$rownum = 1;
if ($activity != NULL) {

    for ($i=0; $i < sizeof($activity); $i++) {

        echo '<tr>';
        echo '<th scope="row">'.$rownum.'</th>';
        echo '<td>'.$activity[$i]['group_activity'].'</td>';
        echo '<td><a href="uploads/'.$activity[$i]['file_name'].'" target="_blank">View attachiment</a></td>';
        // echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-activities&activity_del='.$activity[$i]['id'].'">Delete</a></td>';
        echo '</tr>';
    
        $rownum++;
    }
} else {
    echo '<tr>';
    echo '<th scope="row" colspan="3">No results</th>';
    echo '</tr>';
}
?>
    </tbody>
</table>
</div>


<?php 
if ($application[0]['status'] == 'IN REVIEW' || $application[0]['status'] == 'NOT APPROVED') {
?>
<!-- <div class="alert alert-info alert-dismissible fade show col-md-6" role="alert">
Are you willing to participate in this application?
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
<form method="POST" class=" row g-3 mt-5 mb-5">
<div class="input-group">
          <span class="input-group-text">Description</span>
          <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
        </div>
        
    <div class="col-md-6">
        <select name="status" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
        <?php
        if ($check == false) { 
        ?>
        <option value="NOT APPROVED">REJECT APPLICATION</option>
        <?php
    } else if ($check == true) {
        ?>
        <option value="ACCEPTED">ACCEPT APPLICATION</option>
        <option value="NOT APPROVED">REJECT APPLICATION</option>
        <?php
    } ?>
        </select>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="application">Save your choice</button>
</form>
</div>
<?php 
} else {
    ?>
    <div class="alert alert-info alert-dismissible fade show col-md-6 mb-5 mt-5" role="alert">
APPLICATION TO THIS GROUP WAS ACCEPTED 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?PHP
}
?>