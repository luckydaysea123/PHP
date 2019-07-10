<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "../config.php";    
    $sql = "SELECT * FROM departments WHERE department_id = ?";
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_GET["id"]);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_array(MYSQLI_ASSOC);
                // $name = $row["name"];
                // $address = $row["address"];
                // $phone = $row["phone"];
            } else{
                header("location: ../error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    $stmt->close();
    $mysqli->close();
} else{
    header("location: ../error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["department_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["department_address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <p class="form-control-static"><?php echo $row["department_phone"]; ?></p>
                    </div>
                    <p><a href="create.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>