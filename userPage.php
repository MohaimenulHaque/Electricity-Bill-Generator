<?php
    session_start();
    include('connectPHP.php');

    $METER = $_SESSION['meternumber'];

    $query = "SELECT * FROM customer WHERE meter_no = '$METER'";
    $data =mysqli_query($conn,$query); 
    $show_data = mysqli_num_rows($data);
    if($show_data>0){
        while ($all = mysqli_fetch_assoc($data)){
            $Name = $all['name'];
            // echo $Name;
        }
    }

    $_SESSION['meter'] = $METER;
?>

<!DOCTYPE html>
<html>

<head>
    <!-- main title in browser -->
    <title>User Control Panel</title>
    <link rel="stylesheet" href="userpage.css">
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

    <div><h1>Hello <?php echo $Name ?>, Welcome to our digital DESCO website</h1></div>

    <div class="content">

        <form action="" method="post">
            <div class="option">
                <h2>Change Password</h2>
                <button class="button" name="cng_pass">Edit Now</button>
            </div>

            <div class="option">
                <h2>Bill Check</h2>
                <button class="button" name="billCheck">Check Now</button>
            </div>

            <div class="option">
                <h2>PDF Generate</h2>
                <button class="button" name="pdfBTN">Generate PDF</button>
            </div>

            <div class="option">
                <h2>Make Payment</h2>
                <button class="button" name="paymentBTN" >Pay Now</button>
            </div>

            
        
            <?php
                //PHP code for change passowrd button
                if(isset($_POST['cng_pass'])){
                    header('Location: cng_password.php');
                }


                //PHP code for bill check button
                if(isset($_POST['billCheck'])){
                    $checkMeter = "SELECT * FROM bill WHERE meter_no = '$METER'";
                    $dropDatabase = mysqli_query($conn,$checkMeter);
                    $checkMeterCount = mysqli_num_rows($dropDatabase);

                    if($checkMeterCount>0){
                        header('Location: checkBill.php');
                    }else{
                        ?>
                            <script>
                                alert('You have no bill due!!');
                            </script>
                        <?php
                    }
                }


                //PHP code for PDF Generate button
                if(isset($_POST['pdfBTN'])){
                    $checkMeter = "SELECT * FROM bill WHERE meter_no = '$METER'";
                    $dropDatabase = mysqli_query($conn,$checkMeter);
                    $checkMeterCount = mysqli_num_rows($dropDatabase);

                    if($checkMeterCount>0){
                        header('Location: billCheck.php');
                    }else{
                        ?>
                            <script>
                                alert('You have no bill due!!');
                            </script>
                        <?php
                    }
                }


                //PHP code for make payment button
                if(isset($_POST['paymentBTN'])){
                    $checkMeter = "SELECT * FROM bill WHERE meter_no = '$METER'";
                    $dropDatabase = mysqli_query($conn,$checkMeter);
                    $checkMeterCount = mysqli_num_rows($dropDatabase);

                    if($checkMeterCount>0){
                        header('Location: makePayment.php');
                    }else{
                        ?>
                            <script>
                                alert('You have no bill due!!');
                            </script>
                        <?php
                    }
                }

            ?>

        </form>

    </div>

    <div class="register-link">
        <p>
            <a href="HomePage.php">Back</a>
        </p>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>