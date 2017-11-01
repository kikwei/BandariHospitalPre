<?php
require ('Connection.php');
session_start();
if(!isset($_SESSION['lab_login']))
    header('Location:staff_login.php');
if(isset($_POST['postResults'])) {
    if (isset($_GET['patients_id'])) {
        $id = $_POST['patient_id'];
        $results = $_POST['results'];
        $date = date('Y-m-d');

        $query = "UPDATE  lab SET results='$results',results_date='$date',TestsStatus='attended' WHERE cardnumber='" . $_GET['patients_id'] . "'";

        mysqli_query($connection, $query);

        header('Location:labViewPostedTests.php');

//    if(mysqli_affected_rows($connection)>0)
//    {
//        echo "Results Submitted Successfully";
//    }
//    else
//        echo 'No Results Submitted';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Laboratory Results</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Post Laboratory Results</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="" method="POST">

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Results</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="results" placeholder="Enter Results"></textarea>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="postResults">Post Results</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
