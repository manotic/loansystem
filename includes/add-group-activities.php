<?php 
if (isset($_POST['add-activity'])) {
    
    $msg = $user->saveActivity();
}

$activity = $user->getActivity();

if (isset($_GET['activity_del'])) {

    $del = $user->delGroupActivity($_GET['activity_del']);
    header("Location:index.php?url=group-activities");
}
?>
<div class="form mb-5">
<h1 class="h3 mt-5">Add group activities</h2>
<div class="form-group">
    <?php if (isset($msg)) { ?>
    <div class="alert alert-primary rounded-0 py-1"><?php echo @$msg; ?></div>
    <?php } ?>
</div>
<form method="POST" class=" row g-3 mt-3">
    <input type="hidden" name="id" value="<?php echo @$group[0]['id']; ?>">
    <div class="mb-3">
        <label for="floatingInput">Activity</label>
        <input type="text" name="activity" class="form-control" value="<?php echo @$group[0]['groupname']; ?>" id="floatingInput" placeholder="" required>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="add-activity">Add activity</button>
</form>
</div>


<div class="bd-example mt-5">
<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Activities</th>
    <th scope="col">Action</th>
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
        echo '<td><a class="badge squire-pill bg-danger" href="index.php?url=group-activities&activity_del='.$activity[$i]['id'].'">Delete</a></td>';
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