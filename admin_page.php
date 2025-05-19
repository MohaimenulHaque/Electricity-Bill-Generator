<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin_page.css">
    <link rel="icon" href="desco.png" type="image">
</head>

<body>
    <!-- <div class="bgimg"></div> -->
    <div class="header">
        <h1> DESCO Dhaka Electric Supply Company Ltd.</h1>
        <div class="logo">
            <img src="desco2.png" alt="Desco Logo">
        </div>
    </div>


    <div class="wrapper">

        <h1>Admin Control</h1>

        <a href="register.php">
            <div class="btn">
                <h4>User Details Addition</h4>
            </div>
        </a>

        <form action="" method="post">
            <!-- <h1>Admin Control</h1> -->
            <div class="input_box">
                <input type="text" placeholder="Meter no." name="meter" required>
            </div>


            <input type="submit" class="btn" id="form-submit0" value="Bill Unit Input" name="BillUnitInputBTN">
            <input type="submit" class="btn" id="form-submit0" value="Bill Check" name="BillCheckBTN">
            <input type="submit" class="btn" id="form-submit0" value="PDF Generate" name="PDFGenerateBTN">
            <input type="submit" class="btn" id="form-submit0" value="Bill Update" name="BillUpdateBTN">
            <input type="submit" class="btn" id="form-submit0" value="History" name="HistoryBTN">


            <div class="register-link">
                <p>
                    <a href="HomePage.php">Back</a>
                </p>
            </div>

            
            <?php
            session_start();
            include "connectPHP.php";

            // Bill Unit Input BTN function

            if (isset($_POST['BillUnitInputBTN'])) {
                $meterNo = $_POST['meter'];

                $_SESSION['meter'] = $meterNo;

                if (!empty($meterNo)) {
                    $sql = "SELECT * FROM customer WHERE meter_no = '$meterNo'";
                    $sql_query = mysqli_query($conn, $sql);
                    $mysqli_num_rows = mysqli_num_rows($sql_query);
                    if ($mysqli_num_rows) {
                        header('Location: bill_input.php');
                    } else {
                        echo 'Invalid Meter Number';
                    }
                } else {
                }
            }

            // Bill Unit Input BTN function End


            // Bill Ckeck BTN function

            if (isset($_POST['BillCheckBTN'])) {

                $meterNo = $_POST['meter'];
                $_SESSION['meter'] = $meterNo;

                if (!empty($meterNo)) {

                    $check = "SELECT * FROM bill WHERE meter_no = '$meterNo'";
                    $check_query = mysqli_query($conn, $check);
                    $check_mysqli_num_rows = mysqli_num_rows($check_query);
                    if ($check_mysqli_num_rows > 0) {

                        $sql = "SELECT * FROM customer WHERE meter_no = '$meterNo'";
                        $sql_query = mysqli_query($conn, $sql);
                        $mysqli_num_rows = mysqli_num_rows($sql_query);
                        if ($mysqli_num_rows) {
                            header('Location: checkBill.php');
                        } else {
                            echo 'Invalid Meter Number';
                        }
                    } else {
                        echo 'This User has no due bill.';
                    }
                } else {
                }
            }

            // Bill Ckeck BTN function End


            // PDF BTN function

            if (isset($_POST['PDFGenerateBTN'])) {
                $meterNo = $_POST['meter'];
                $_SESSION['meter'] = $meterNo;
                if (!empty($meterNo)) {

                    $check = "SELECT * FROM bill WHERE meter_no = '$meterNo'";
                    $check_query = mysqli_query($conn, $check);
                    $check_mysqli_num_rows = mysqli_num_rows($check_query);
                    if ($check_mysqli_num_rows > 0) {

                        $sql = "SELECT * FROM customer WHERE meter_no = '$meterNo'";
                        $sql_query = mysqli_query($conn, $sql);
                        $mysqli_num_rows = mysqli_num_rows($sql_query);
                        if ($mysqli_num_rows) {
                            header('Location: billCheck.php');
                        } else {
                            echo 'Invalid Meter Number';
                        }
                    } else {
                        echo 'This User has no due bill.';
                    }
                } else {
                }
            }

            // PDF BTN function End


            // Bill Update BTN function

            if (isset($_POST['BillUpdateBTN'])) {
                $meterNo = $_POST['meter'];
                $_SESSION['meter'] = $meterNo;
                if (!empty($meterNo)) {

                    $check = "SELECT * FROM bill WHERE meter_no = '$meterNo'";
                    $check_query = mysqli_query($conn, $check);
                    $check_mysqli_num_rows = mysqli_num_rows($check_query);
                    if ($check_mysqli_num_rows > 0) {

                        $sql = "SELECT * FROM customer WHERE meter_no = '$meterNo'";
                        $sql_query = mysqli_query($conn, $sql);
                        $mysqli_num_rows = mysqli_num_rows($sql_query);
                        if ($mysqli_num_rows) {
                            header('Location: billUpdate.php');
                        } else {
                            echo 'Invalid Meter Number';
                        }
                    } else {
                        echo 'This User has no due bill.';
                    }
                } else {
                }
            }

            // Bill Update BTN function End


            // Bill Update BTN function

            if (isset($_POST['HistoryBTN'])) {
                $meterNo = $_POST['meter'];
                $_SESSION['meter'] = $meterNo;
                if (!empty($meterNo)) {
                    $sql = "SELECT * FROM customer WHERE meter_no = '$meterNo'";
                    $sql_query = mysqli_query($conn, $sql);
                    $mysqli_num_rows = mysqli_num_rows($sql_query);
                    if ($mysqli_num_rows) {
                        header('Location: history.php');
                    } else {
                        echo 'Invalid Meter Number';
                    }
                } else {
                }
            }

            // Bill Update BTN function End
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