<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
    .wrapper {
        width: 650px;
        margin: 0 auto;
    }

    .page-header h2 {
        margin-top: 0;
    }

    table tr td:last-child a {
        margin-right: 15px;
    }
    </style>
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <a href="../employees/index.php">Employees</a>
                    </div>
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Department Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Department</a>
                    </div>
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Include config file                 
                                require_once "../config.php";
                                header("Content-type: text/html; charset=utf-8");                 
                                // Attempt select query execution
                                $sql = "SELECT * FROM departments";
                                if($result = $mysqli->query($sql)){
                                if($result->num_rows > 0){                          
                                while($row = $result->fetch_array()){
                            ?>
                            <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3];?></td>
                                <td>
                                    <a href='read.php?id=<?php echo $row[0]; ?>' title='View Record'
                                        data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                    <a href='update.php?id=<?php echo $row[0]; ?>' title='Update Record'
                                        data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='delete.php?id=<?php echo $row[0];?>' title='Delete Record'
                                        data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                            // Free result set
                            $result->free();
                            } else{
                        ?>
                    <p class='lead'><em>No records were found.</em></p>
                    <?php
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }                   
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>