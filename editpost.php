<?php
require_once 'db/conn.php';    
//Get values fro, post operation
if (isset($_POST['submit'])){
    //Extract Values from the $_POST Array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['doa'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $brand = $_POST['brand'];

    //Call Crud function
    $result = $crud->editphotographer($id, $fname, $lname, $dob, $email, $contact, $brand);

    //Redirect to viewrecords.php
    if($result){
        header("Location: viewrecords.php");
    }

        else{                                                                                                                            
            //echo 'error';
            include 'includes/errormessage.php';
        }
    }
    else{
        echo 'error';
    }    


?>