<?php 

$member = $user->getMember();
$adminid = $member[0]['adminid'];
$group = $user->getMemberGroup($adminid);

if (isset($_POST['choice'])) {

    $saveChoice = $user->memberSign();
    header('Location:index.php?url=member');
}

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Group member dashboard</h2>
</div>
<div class="form mb-5">
<div class="form-group">
    <?php if (isset($msg)) { ?>
    <div class="alert alert-primary rounded-0 py-1"><?php echo @$msg; ?></div>
    <?php } ?>
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
    <th scope="col">Participation</th>
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
echo '<td class="table-info">'.@$member[0]['status'].'</td>';
// echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-members&member_del='.$member[$i]['id'].'&email='.$member[$i]['email'].'">Delete</a></td>';
echo '</tr>';
?>
    </tbody>
</table>
</div>
<?php 
if ($member[0]['status'] == 'NOT SET') {
?>
<div class="form mt-5">
    <h2 class="h4 mb-3">Aprove or disaprove participation</h2>
</div>
<div class="alert alert-info alert-dismissible fade show col-md-6" role="alert">
Are you willing to participate in this application?
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<form method="POST" class=" row g-3">
    <div class="col-md-6">
        <select name="status" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
        <option value="ACCEPTED">ACCEPT PARTICIPATION</option>
        <option value="REJECTED">REJECT PARTICIPATION</option>
</select>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="choice">Save your choice</button>
</form>
</div>
<?php 
}
?>