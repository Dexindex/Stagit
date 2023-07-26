<?php 

session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
require 'db.php'; 


if(isset($_POST['submit'])){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['stat']) ) { 
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $date = $_POST['date'];
        $stat = $_POST['stat'];
        $supId= $_SESSION['id'];
        $sql = 'INSERT INTO trainee (name, email, status, supervisorId, nextevaluationDate) VALUES(:name, :email,:stat,:supId, :date)'; 
        $statement = $connection->prepare($sql); 
        if($statement->execute([':name'=> $name, ':email'=> $email , ':date'=> $date, ':stat'=> $stat,':supId'=> $supId])) 
        { 
            header("Location: index.php");
        } 
    }
    else{
        echo '<script>alert("All Fields Are Required") </script>';
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Add New Trainee</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/normalize.css">
	<script src="js/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" href="images/Stagit-1.png" type="image/x-icon">
    <style>

    </style>
</head>
<body>
    <div class="container p-6 mt-6">



<!-- Table Section -->
<div class="box">
    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Jhon" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="date">
            <label for="floatingInput">Evaluation Date</label>
        </div>
        <div class="form-floating mb-6">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="stat">
                <option disabled selected>Status</option>
                <option value="Complet">Complet</option>
                <option value="Active">Active</option>
                <option value="Leave">Leave</option>
              </select>
        </div>
        <button class="btn btn-outline-success" style="width: 100%;" type="submit" name="submit"><i class="fas fa-add"></i> ADD</button>

          
    </form>
</div>
<!-- Table Section -->


        

</div>







    

    <!--Script Linking-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
	<script src="js/script.js"></script>
    <script src="js/tailwind-min.3.3.3.js"></script>


    <!--Script Linking End -->
</body>
</html>