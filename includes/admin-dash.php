<?php 
$group = $user->getGroups();
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Admin dashboard</h2>
</div>

<div class="bd-example mt-3">
<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Group name</th>
    <th scope="col">Short name</th>
    <th scope="col">Phone number</th>
    <th scope="col">Email address</th>
    <th scope="col">Location</th>
    <th scope="col">Post address</th>
    <th scope="col">More</th>
    </tr>
    </thead>
    <tbody>
<?php

$rownum = 1;

if ($group != NULL) {
    for ($i=0; $i < sizeof($group); $i++) {

        echo '<tr>';
        echo '<th scope="row">'.$rownum.'</th>';
        echo '<td>'.@$group[$i]['groupname'].'</td>';
        echo '<td>'.@$group[$i]['shortname'].'</td>';
        echo '<td>'.@$group[$i]['phonenumber'].'</td>';
        echo '<td>'.@$group[$i]['groupemail'].'</td>';
        echo '<td>'.@$group[$i]['location'].'</td>';
        echo '<td>'.@$group[$i]['postaddress'].'</td>';
        // echo '<td class="table-info">'.@$application[0]['status'].'</td>';
        echo '<td><a class="badge squire-pill bg-info" href="index.php?url=group-details&group='.@$group[$i]['id'].'">View more</a></td>';
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