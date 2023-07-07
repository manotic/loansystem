<?php 

if (isset($_POST['apply'])) {
    
    $msg = $user->submitApplication();
}
$application = $user->getApplication();
$group = $user->getGroup();

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Loan application</h2>
</div>

<!-- <div class="form mt-5">
    <h2 class="h4 mb-3">Aprove or disaprove participation</h2>
</div> -->
<?php 
if ($application == NULL && $_SESSION['email']) {
    ?>
<div class="alert alert-info alert-dismissible fade show col-md-6" role="alert">
Apply loan for your group, confirm all your details and make sure they are all good.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<form method="POST" class=" row alert g-3 col-md-6">
    <?php if (isset($msg)) { ?>
    <div class="alert alert-danger rounded-0 py-1"><?php echo @$msg; ?></div>
    <?php } ?>
    <div class="">
        <label for="floatingInput">Amount for request in TSh</label>
        <input type="number" name="amount" class="form-control" id="floatingInput" required>
    </div>
<button class="w-100 btn btn-lg btn-primary" type="submit" name="apply">Save your choice</button>
</form>
<?php 
} else {
?>
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
    <th scope="col">Amount</th>
    <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
<?php 
if (isset($_GET['click']) && $application[0]['status'] != "IN REVIEW") {
    $message = '<div class="alert alert-info rounded-0 py-1">'.$application[0]['description'].'</div>';
} else {
    $message = '<div class="alert alert-info rounded-0 py-1">No more information</div>';

}
echo '<tr>';
// echo '<th scope="row">'.$rownum.'</th>';
echo '<td>'.@$group[0]['groupname'].'</td>';
echo '<td>'.@$group[0]['shortname'].'</td>';
echo '<td>'.@$group[0]['phonenumber'].'</td>';
echo '<td>'.@$group[0]['groupemail'].'</td>';   
echo '<td>'.@$group[0]['location'].'</td>';
echo '<td>'.@$group[0]['postaddress'].'</td>';  
echo '<td>'.$application[0]['amount'].'</td>';
echo '<td class="table-info">'.@$application[0]['status'].' <a class="badge squire-pill bg-info" href="index.php?url=request&click=view-more">View more</a></td>';
// echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-members&member_del='.$member[$i]['id'].'&email='.$member[$i]['email'].'">Delete</a></td>';
echo '</tr>';
?>
    </tbody>
</table>
</div>
<?php 

echo @$message;
}
?>