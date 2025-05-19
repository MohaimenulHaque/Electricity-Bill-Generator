<?php
    session_start();
    include "connectPHP.php";

    $meter = $_SESSION['meter'];

    $query = "SELECT * FROM customer WHERE meter_no = '$meter'";
    $data =mysqli_query($conn,$query); 
    $show_data = mysqli_num_rows($data);

    if($show_data>0){
        while ($all = mysqli_fetch_assoc($data)){
            $Name = $all['name'];
            // echo $Name;
            $Meter_no = $all['meter_no'];
        }
    }

    $query1 = "SELECT * FROM bill WHERE meter_no = '$meter'";
    $data1 =mysqli_query($conn,$query1); 
    $show_data1 = mysqli_num_rows($data1);

    if($show_data1>0){
        while ($all1 = mysqli_fetch_assoc($data1)){
            $bill = $all1['kwh_charge'];
            $lastdate = $all1['due_date'];
            $vat = $all1['vat'];

        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Check</title>
    <link rel="stylesheet" href="bill_input.css">
</head>
<body>

    <div class="wrapper">

        <h1>Bill</h1>

        <form action="" method="post">

            <label for="">Customer Name : <?php echo $Name; ?> </label><br>
            <label for="">Meter No : <?php echo $Meter_no; ?></label><br>
            <label for="">Bill Amount : <?php echo $bill+227+$vat; ?> Tk</label><br>
            <label for="">Last date of bill payment : <?php echo $lastdate; ?></label><br>

            <div class="register-link">
                <p>
                <!-- <a href="admin_page.php">Back</a> -->
                </p>
            </div>
            
        </form>

    </div>
    
</body>
</html>