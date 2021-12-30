<?php $title = 'Success';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';
     require_once 'sendemail.php';

    if (isset($_POST['submit'])){
        //Extract Values from the $_POST Array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $brand = $_POST['brand'];
        $doa = $_POST['doa'];
        $avatar = $_POST['avatar'];
        

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'Uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);

        
         //Call function to insert and track if success or not 
        $isSuccess = $crud->insertphotgraphers($fname, $lname, $address, $email, $contact, $brand, $doa,$avatar);
        $brandName = $crud->getbrandById($brand);

        if($isSuccess){
            SendEmail::SendMail($email, 'Welcome to Photography Class Registration', 'You have been registered for this year\'s Photography');
            //echo '<h1 class="text-center  text-success">You Have Been Registered! </h1>';
            include 'includes/successmessage.php';
        }
        else{
            //echo '<h1 class="text-center  text-danger">There was an error in processing</h1>';
            include 'includes/errormessage.php';
        }

    }

?> 
    

<!-- This prints out values that were passed to the action page using method="get"-->
<!-- <div class="card" style="width: 18rem;">
    <div class="card-body">
            <h5 class="card-title"><?php echo $_GET['firstname'] . ' ' . $_GET['lastname'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"> 
                <?php echo $_GET['brand']; ?>                
            </h6>
            <p class="card-text">
                Date Of Acquistion: <?php echo $_GET['doa']; ?>
            </p>
            <p class="card-text">
                Email: <?php echo $_GET['email']; ?>
            </p>
            <p class="card-text">
                Contact: <?php echo $_GET['phone']; ?>
            </p>
                
    </div> -->
    <img src="<?php echo $destination; ?>" class="rounded-circle"style="width: 25%; height: 25%" />
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'] ?>
            </h5>
            <p class="card-text">
                Address: <?php echo $_POST['address']; ?>
            </p>
            <h6 class="card-subtitle mb-2 text-muted"> 
                <?php echo $brandName['name']; ?>                
            </h6>
            <p class="card-text">
                Date Of Acquisition: <?php echo $_POST['doa']; ?>
            </p>
           
            <p class="card-text">
                Email: <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
                Contact: <?php echo $_POST['phone']; ?>
                </p>
        </div>
    </div>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>