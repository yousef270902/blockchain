<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Payment Form</title>
</head>
<body style="background-color:black; color:white;">
<br>
   <center> 
    
   <h2 style="font-style:italic;"> Payment page</h2>
   <hr style="border: 1.5px solid white; width:14%;">
   <form action ="" method="post">
    <?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        echo '<label for="campaign">Campaign Title:</label>';
        echo '<input type="text" id="campaign" name="campaign" value="' . $id . '" readonly><br><br>';
    }
    ?>
    <label for="amount">Enter Amount:</label>
    <input type="text" id="amount" name="amount"><br><br>
    <input type="submit" class="btn btn-outline-primary" name="submit" value="Pay Now">
</form>

    <?php
require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/control.php"); 
?>
</body>
</html>