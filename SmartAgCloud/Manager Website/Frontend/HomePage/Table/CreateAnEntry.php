<?php
// Include config file
require_once "../Database/config.php";
 
// Define variables and initialize with empty values
$SensorName = $SensorHealth = $NodeName = $NodeHealth = $ClusterName = $ClusterHealth = $RegionName = $RegionHealth = $FarmerName = $FarmerHealth = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
      
    // Check input errors before inserting in database
    if(!(empty($SensorName) && empty($NodeName) && empty($ClusterName))){
        // Prepare an insert statement
        $sql = "INSERT INTO data (SensorName, SensorHealth, NodeName, NodeHealth, ClusterName, ClusterHealth, RegionName, RegionHealth, FarmerName, FarmerHealth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_sname, $param_shealth, $param_nname, $param_nhealth, $param_cname, $param_chealth, $param_rname, $param_rhealth, $param_fname, $param_fhealth );
            
            // Set parameters
            $param_sname = $SensorName;
            $param_shealth = $SensorHealth;
            $param_nname = $NodeName;
            $param_nhealth = $NodeHealth;
            $param_cname = $ClusterName;
            $param_chealth = $ClusterHealth;
            $param_rname = $RegionName;
            $param_rhealth = $RegionHealth;
            $param_fname = $FarmerName;
            $param_fhealth = $FarmerHealth;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>SensorName</label>
                            <input type="text" name="SensorName" class="form-control" value="<?php echo $SensorName; ?>">
                        </div>
                        <div class="form-group">
                            <label>SensorHealth</label>
                            <textarea name="SensorHealth" class="form-control"><?php echo $SensorHealth; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>NodeName</label>
                            <input type="text" name="NodeName" class="form-control" value="<?php echo $NodeName; ?>">
                        </div>
                        <div class="form-group">
                            <label>NodeHealth</label>
                            <textarea name="NodeHealth" class="form-control"><?php echo $NodeHealth; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>ClusterName</label>
                            <input type="text" name="ClusterName" class="form-control" value="<?php echo $ClusterName; ?>">
                        </div>
                        <div class="form-group">
                            <label>ClusterHealth</label>
                            <textarea name="ClusterHealth" class="form-control"><?php echo $ClusterHealth; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>RegionName</label>
                            <input type="text" name="RegionName" class="form-control" value="<?php echo $RegionName; ?>">
                        </div>
                        <div class="form-group">
                            <label>RegionHealth</label>
                            <textarea name="RegionHealth" class="form-control"><?php echo $RegionHealth; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>FarmerName</label>
                            <input type="text" name="FarmerName" class="form-control" value="<?php echo $FarmerName; ?>">
                        </div>
                        <div class="form-group">
                            <label>FarmerHealth</label>
                            <textarea name="FarmerHealth" class="form-control"><?php echo $FarmerHealth; ?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>