<?php
    session_start();
    include('connectPHP.php');

    $meter = $_SESSION['meter'];
    $totalBill = $_SESSION['totalBill'];

    $query = "SELECT * FROM customer WHERE meter_no = '$meter'";
    $data =mysqli_query($conn,$query); 
    $show_data = mysqli_num_rows($data);

    if($show_data>0){
        while ($all = mysqli_fetch_assoc($data)){
            $account_no = $all['account_no'];
            $Name = $all['name'];
            $Address = $all['address'];
            $Phone = $all['phone'];
            $Meter_no = $all['meter_no'];
        }
    }

    $query1 = "SELECT * FROM bill WHERE meter_no = '$meter'";
    $data1 =mysqli_query($conn,$query1); 
    $show_data1 = mysqli_num_rows($data1);

    if($show_data1>0){
        while ($all1 = mysqli_fetch_assoc($data1)){
            $total_bill = $all1['total_bill'];   
            $vat = $all1['vat'];   
            $kwh = $all1['kwh_charge'];   
            $date = $all1['issue_date'];   
        }
    }



?>


<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <link rel="stylesheet" href="makePayment.css">
    <link rel="icon" href="desco.png" type="image">
    <script src="script.js"></script>
</head>
<body>

    <div class="header">
        <h1> DESCO Dhaka Electric Supply Company Ltd.</h1>
        <div class="logo">
            <img src="desco2.png" alt="Desco Logo">
        </div>
    </div>

    <!-- Main container for the payment form -->
    <div class="container">
        <h1 class="title">Make Payment</h1>
        <!-- Form section where users enter payment details -->
        <form action="" method="post">
            <!-- Amount input field -->
            <div>
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" class="form-control" value="<?php echo $totalBill; ?> Tk" readonly>
            </div>

            <!-- Account number input field -->
            <div>
                <label for="account_no">Meter No:</label>
                <input type="text" id="meter_no" name="meter_no" class="form-control" value="<?php echo $meter; ?>" readonly>
            </div>

            <!-- Payment method selection dropdown -->
            <div>
                <label for="payment_method">Payment Method:</label>

                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="debit_card">Debit Card</option>
                    <option value="mobile_banking">Mobile Banking</option>
                </select>
            </div>

            <div>
                <label for="account_no">Account No:</label>
                <input type="text" id="account_no" name="account_no" class="form-control"  required>
            </div>

            <div>
                <input type="submit" value="Submit Payment" name="submit">
            </div>


            <?php 

            
                if(isset($_POST['submit'])){
                    $BILL = $kwh+$vat+227;
                    
                    $history_sql = "INSERT INTO history(account_no,meter_no,date,paid_bill) VALUES('$account_no','$meter','$date','$BILL')";
                    $history_query_run = mysqli_query($conn, $history_sql);
                    
                    $dropDatabase = "DELETE FROM bill WHERE meter_no='$meter'";
                    $dropDatabaseRun = mysqli_query($conn,$dropDatabase);

                    ?>
                        <script>
                            alert('Payment successfull.');
                            userPage();
                        </script>
                    <?php                    
                }
            
            ?>


        </form>
    </div>

</body>
</html>
