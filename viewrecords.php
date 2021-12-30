    
<?php 
    $title = 'View Records';
    
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    
    $results =$crud->getphotgrapher();
?>
<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th> 
        <th>brand</th> 
        <th>Date Of Acquisition</th>
        <th>Actions</th>


        <th>Actions</th>

    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
            <td><?php echo $r['photographer_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['name'] ?></td>
            <td><?php echo $r['dateofacquisition'] ?></td>
            <td>
                <a href = "view.php?id=<?php echo $r['photographer_id'] ?>" class="btn btn-primary">View</a>
                <a href = "edit.php?id=<?php echo $r['photographer_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" 
                href = "delete.php?id=<?php echo $r['photographer_id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>




<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>