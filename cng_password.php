<?php
    session_start();
    include('connectPHP.php');
    $meter = $_SESSION['meter'];
    $query = "SELECT * FROM customer WHERE meter_no = '$meter'";
    $data =mysqli_query($conn,$query); 
    $show_data = mysqli_num_rows($data);
    if($show_data>0){
        while ($all = mysqli_fetch_assoc($data)){
            $Name = $all['name'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change PassWord</title>\
    <link rel="stylesheet" href="cng_password.css">
</head>
<body>

    <div class="wrapper">
        <h1>Change Password</h1>
        <form action="" method="post">

            <label for=""><?php echo $Name; ?> want to change password</label><br>

            <div class="input_box">
                <input type="text" placeholder="old pssword*" name="oldpass" required>
            </div>
            <div class="input_box">
                <input type="text" placeholder="new password*" name="newpass" required>
            </div>
            <div class="input_box">
                <input type="text" placeholder="confirm new password*" name="cnewpass" required>
            </div>

            <input type="submit" class="btn" id="form-submit0" value="Change Password" name="cng_pass">
            
            <div class="register-link">
                <p>
                <a href="userpage.php">Back</a>
                </p>
            </div>

            <?php

                if(isset($_POST['cng_pass'])){
                    $old_pass = $_POST['oldpass'];
                    $new_pass = $_POST['newpass'];
                    $cnew_pass = $_POST['cnewpass'];

                    $md5_old_pass = md5($old_pass);
                    $md5_new_pass = md5($new_pass);
                    $md5_cnew_pass = md5($cnew_pass);

                    if($new_pass == $cnew_pass){
                        $sql = "SELECT * FROM customer WHERE cpassword='$md5_old_pass' AND meter_no='$meter'";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);

                        if($count>0){
                            $cng_pass_query = "UPDATE customer SET cpassword='$md5_new_pass' WHERE meter_no='$meter'";
                            $cng_pass_query_run = mysqli_query($conn,$cng_pass_query);
                            echo 'Password Change Successfully';
                        }else{
                            echo 'Old password dose not match';
                        }

                    }else{
                        echo 'New password & confirmed password dose not match';
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