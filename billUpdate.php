<?php
    session_start();
    include "connectPHP.php";

    $meter = $_SESSION['meter'];

    $query = "SELECT * FROM bill WHERE meter_no = '$meter'";
    $data = mysqli_query($conn, $query);
    $show_data = mysqli_num_rows($data);

    if ($show_data > 0) {
        while ($all = mysqli_fetch_assoc($data)) {
            $Meter_no = $all['meter_no'];
            $totalBill = $all['total_bill'];
            $kwhCharge = $all['kwh_charge'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Update</title>
    <link rel="stylesheet" href="admin_page.css">
    <link rel="icon" href="desco.png" type="image">

</head>

<body>

    <div class="wrapper">

        <h1>Bill Update</h1>

        <form action="" method="post">
            <h4>Meter No: <?php echo $meter ?></h4><br>
            <h4>Total Bill: <?php echo $totalBill ?> Tk</h4><br>
            <div class="input_box">
                <input type="text" placeholder="enter amount" name="amount" required>
            </div>

            <input type="submit" class="btn" id="form-submit0" value="Add Amount" name="AddAmountBTN">
            <input type="submit" class="btn" id="form-submit0" value="Discount Amount" name="DiscountAmountBTN">

            <div class="register-link">
                <p>
                    <a href="admin_page.php">Back</a>
                </p>
            </div>

            <?php

                if (isset($_POST['AddAmountBTN'])) {
                    $addAmount = $_POST['amount'];
                    $newBill = $kwhCharge + $addAmount;
                    $updateBill = "UPDATE bill SET kwh_charge='$newBill' WHERE meter_no='$meter'";
                    $sqlRun = mysqli_query($conn, $updateBill);
                    ?>
                        <script>
                            alert('Bill Update successfull.')
                        </script>
                    <?php
                }



                if (isset($_POST['DiscountAmountBTN'])) {
                    $Dis_Amount = $_POST['amount'];
                    $newBill = $kwhCharge - $Dis_Amount;
                    $updateBill = "UPDATE bill SET kwh_charge='$newBill' WHERE meter_no='$meter'";
                    $sqlRun = mysqli_query($conn, $updateBill);
                    ?>
                        <script>
                            alert('Bill Update successfull.')
                        </script>
                    <?php
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