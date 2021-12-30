    
    <?php $title = 'Index';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';

     $results = $crud->getbrand();
    
    ?>
    
        <!--
            - First Name   
            - Last Name
            - address
            - Email Address
            - Contact Number 
            - Date of Acquisition (Use DatePicker)
            - Brand ((Sony, Canon, Nikon, Panasonic, Other)
            - Avatar
        -->
   
        <h1 class="text-center">Photography Class Registration</h1>

    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input required type="address" class="form-control" id="address" aria-describedby="addressHelp" name="address">
            <div id="emailHelp" class="form-text">Your details are safe with us.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Your email will never be shared.</div>
        </div>
        
        <div class="mb-3">
            <label for="brand" class="form-label">Types of brands</label>
        <select class="form-select" id="brand" name="brand">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['brand_id'] ?>"><?php echo $r['name']; ?></option> 
                <?php }?>
        </select>
        </div>
        <div class="mb-3">
            <label for="doa" class="form-label">Date Of Acquisition</label>
            <input type="text" class="form-control" id="doa" name="doa">
        </div>
        
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">Your contact number will never be shared.</div>
        </div> 
        <br/>

        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Choose File</label>
            <div id="avatar" class="form-text text-danger">File Upload is Optional.</div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" name="submit" button class="btn btn-primary" >Submit Form</button>
            
        </div>

    </form>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>