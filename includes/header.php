<?php
//This icludes the session file. This file contains code that starts/resumes a session.
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page accross the website.'
include_once 'includes/session.php'?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />

    <title>Photography Class Registration - <?php echo $title ?> </title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Photography Class Registration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"  id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
                <a class="nav-item nav-link active"  href="index.php">Home <span class="sr-only"></span></a>
                <a class="nav-item nav-link" href="viewrecords.php">View Photographers</a>
            </div>
            <div class="navbar-nav ml-auto">
                <?php
                if(!isset($_SESSION['userid'])){
                ?>

                <a class="nav-item nav-link"  href="login.php">Login <span class="sr-only"></span></a>
                <?php } else { ?>
                <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only"></span></a>
                <a class="nav-item nav-link"  href="logout.php">Logout <span class="sr-only"></span></a>
                <?php } ?>

            </div>
     </div>
    </nav>
    <div class="container">
     

    <!-- <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">IT Conference</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarnavaltmarkup" aria-controls="navbarnavaltmarkup" aria-expanded="false" aria-label="toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarnavaltmarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link active"  href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="viewrecords.php">View attendees</a>
        </div>

        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link"  href="login.php">Login <span class="sr-only">(current)</span></a>
        </div>
    </div>
    </nav>
    <br/> -->