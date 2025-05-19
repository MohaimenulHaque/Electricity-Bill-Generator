<?php
    session_start();
    include "connectPHP.php";

    $meter = $_SESSION['meter'];

    $query = "SELECT * FROM customer WHERE meter_no = '$meter'";
    $data = mysqli_query($conn, $query);
    $show_data = mysqli_num_rows($data);

    if ($show_data > 0) {
        while ($all = mysqli_fetch_assoc($data)) {
            $Name = $all['name'];
            // echo $Name;
            $Meter_no = $all['meter_no'];
            $account_no = $all['account_no'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Unit Input</title>
    <link rel="stylesheet" href="bill_input.css">
    <link rel="icon" href="desco.png" type="image">
</head>

<body>

    <div class="wrapper">

        <h1>Bill Unit Input</h1>

        <form action="" method="post">

            <label for="">Customer Name : <?php echo $Name; ?> </label><br>
            <label for="">Meter No : <?php echo $Meter_no; ?></label>

            <div class="input_box">
                <input type="text" placeholder="Bill Unit" name="billUnit" required>
            </div>


            <input type="submit" class="btn" id="form-submit0" value="Add Bill Unit" name="AddBillUnitBTN">

            <div class="register-link">
                <p>
                    <a href="admin_page.php">Back</a>
                </p>
            </div>


            <?php

            if (isset($_POST['AddBillUnitBTN'])) {

                $date = date("y-m-d");
                $dueDate = Date('y-m-d', strtotime('+20 days'));

                $billUnite = $_POST['billUnit'];
                $kwh_charge = $billUnite * 7;
                $due = $kwh_charge + 227;

                $percentage = 10;
                $vat = ($percentage / 100) * $kwh_charge;

                $totalBill = $kwh_charge + $vat;

                $checkBill = "SELECT * FROM bill WHERE meter_no=$meter";
                $result1 = mysqli_query($conn, $checkBill);
                $count1 = mysqli_num_rows($result1);

                if ($count1 > 0) {
                    echo 'Already Bill Input Done';
                } else {
                    $sql = "INSERT INTO bill(meter_no,issue_date,due_date,kwh_consumed,kwh_charge,due,vat,total_bill) VALUES('$meter','$date','$dueDate','$billUnite','$kwh_charge','$due','$vat','$totalBill')";
                    $query_run = mysqli_query($conn, $sql);


                    // $history_sql = "INSERT INTO history(account_no,meter_no,date,paid_bill) VALUES('$account_no','$meter','$date','$totalBill')";
                    // $history_query_run = mysqli_query($conn, $history_sql);
                }
            }

            ?>



        </form>

    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>