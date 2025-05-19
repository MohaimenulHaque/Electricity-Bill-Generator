<?php
    session_start();
    include('connectPHP.php');

    $meter = $_SESSION['meter'];

    $query = "SELECT * FROM history WHERE meter_no = '$meter'";
    $data =mysqli_query($conn,$query); 
    $show_data = mysqli_num_rows($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="history.css">
</head>
<body>
<div >
        <table class="tableBody">
            <tr>
                <th id="Tablehead" colspan="10">Customer Record</th>
            </tr>
            <tr>
                <th id="tablehead">History Id</th>
                <th id="tablehead">Account No</th>
                <th>Meter No</th>
                <th>Date</th>
                <th>Bill</th>
            </tr>
            <?php
                if($show_data!=0)
                {
                    while($result = mysqli_fetch_assoc($data)){
                        echo "<tr>
                        <td>".$result['hid']."</td>
                        <td>".$result['account_no']."</td>
                        <td>".$result['meter_no']."</td>
                        <td>".$result['date']."</td>                
                        <td>".$result['paid_bill']." Tk </td>                
                        </tr>";
                    }    
                }
                else{
                }
            ?>

        </table>
    </div>

    <div class="LINK">
        <p>
            <a href="admin_page.php">Back</a>
        </p>
    </div>
    
</body>
</html>