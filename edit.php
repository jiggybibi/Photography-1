    
    <?php
        $title = 'Edit Record';

        require_once 'includes/header.php'; 
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        $results = $crud->getbrands();

        if(!isset($_GET['id']))
        {
            //echo 'error';
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
        }
        else{
            $id = $_GET['id'];
            $photographer = $crud->getphotographerDetails($id);
                
    ?>
    
         
        <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $photographer['photographer_id'] ?>" />
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $photographer['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $photographer['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $photographer['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Area of Expertise</label>
        <select class="form-select" value="<?php echo $photographer['brand'] ?>"="brand" name="brand">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['brand_id'] ?>" <?php if($r['brand_id']==
                    $photographer['brand_id']) echo 'selected' ?>>
                    <?php echo $r['name']; ?>
                </option> 
                <?php }?> 
        </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $photographer['emailaddress'] ?> "id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $photographer['contactnumber'] ?>" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
    
            <a href="viewrecords.php" class="btn btn-default">Back To List</button>
            <button type="submit" name="submit" button class="btn btn-success" >Save Changes</button>
        </div>    
    </form>   

    <?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>