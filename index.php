<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

$supId=$_SESSION['id'];

require 'db.php';
$sql = 'SELECT * FROM trainee WHERE supervisorId=:supId';
$statement = $connection->prepare($sql);
$statement->execute([':supId'=> $supId]);
$trainees = $statement->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⏹ List Of Trainees</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/normalize.css">
	<script src="js/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" href="images/Stagit-1.png" type="image/x-icon">
</head>
<body>
    <div class="container">
<!-- Nav Section -->
        <div class="row mb-6">
            <div class="col-6">
                <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="fas fa-bars icn"></i></a>
            </div>
        </div>
<!-- Nav Section -->


<!-- Table Section -->
<div class="box">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th class="tdPh" scope="col">Join Date</th>
            <th class="tdPh" scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Next Evaluation Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($trainees as $person) : ?>
          <tr>
            <td><?= $person->name; ?></td>
            <td class="tdPh"><?= $person->dateJoin; ?></td>
            <td class="tdPh"><?= $person->email; ?></td>
            <td><?= $person->status; ?></td>
            <td><?= $person->nextevaluationDate; ?></td>
            <td>
                <a href="editT.php?id=<?= $person->id ?>"><i class="fas fa-pen icnT mr-1 text-bg-primary"></i></a>
                <a 
                onclick="return confirm('Are You Sure ?')" 
                href="del.php?id=<?= $person->id ?>"><i class="fas fa-trash icnT text-bg-danger"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
</div>
<!-- Table Section -->


        

</div>


<!-- Offcanvas Section -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <!-- <img src="images/Stagit-1 (1).png" width="160" height="170"> -->
    </div>
    <div class="offcanvas-body">
      <div>
        <form action="search.php" method="get">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="q">
                <label for="floatingInput">Serach For A Trainee</label><br>
                <button class="btn btn-outline-success" style="width: 100%;" type="submit"><i class="fas fa-magnifying-glass"></i> Search</button>
              </div>
              
        </form>
      </div>
      <br><br>
      <aside class="menu">
        <p class="menu-label">
          General
        </p>
        <ul class="menu-list">
          <li ><a class="is-active">⏹ List Of Trainees</a></li>
          <li><a href="todayCheck.php">🕛Today's check-in list</a></li>
        </ul>
        <p class="menu-label">
          Administration
        </p>
        <ul class="menu-list">
          <li><a href="addT.php" class="text-bg-info">➕ Add New Trainee</a></li>
          <li><br>
            <a class="text-bg-primary">Actions</a>
            <ul>
              <li><a href="editP.php"><i class="fas fa-pen-alt"></i> Edit Profile </a></li>
              <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </aside>
      
    </div>
  </div>
  
<!-- Offcanvas Section -->




    

    <!--Script Linking-->
   <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
	<script src="js/script.js"></script>
  <script src="js/tailwind-min.3.3.3.js"></script>


    <!--Script Linking End -->
</body>
</html>