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
            $bill_no = $all1['bill_no'];
            $bill = $all1['total_bill'];
            $issueDate = $all1['issue_date'];
            $lastdate = $all1['due_date'];
            $kwh_consumed = $all1['kwh_consumed'];
            $kwh_charge = $all1['kwh_charge'];
            $due = $all1['due'];
            $vat = $all1['vat'];
            $total_bill = $all1['total_bill'];
            $late_bill = $all1['late_bill'];

        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Check</title>
    <link rel="stylesheet" href="billCheck.css">
    <script src="script.js"></script>
</head>
<body>

    <div class="a4">

        <div class="head">
            <h2>"দেশ প্রেমের শপথ নিন, দূর্নীতিকে বিদায় দিন"</h2>
            <img src="mujib3.png" alt="">
            <h1>(Customer's Copy)</h1>
        </div>

        <div class="table">
            <table>
                <tr>
                    <td class="desco">
                        <img src="desco2.png" alt="">
                        <div class="descoInfo">
                            <h3>Dhaka Electic Supply Company Ltd (DESCO)</h3>
                            <p>Sales & Disribution Division <br>
                            Electricity Bill
                            </p>
                        </div>
                    </td>
                    <td class="descoInfo2" colspan="2">
                        <p>Tariff&emsp;&emsp;&emsp;&emsp;&emsp;: A <br>
                        Zone/Block&emsp;&emsp;&ensp;: MPCA <br>
                        Walking Order &emsp;: B02
                        </p>
                    </td>
                </tr>

                <tr>
                    <td rowspan="2" class="name">
                        <div>
                            <p>Name & Address : <?php echo $Name.'<br>'.$Address?></p>
                        </div>

                    </td>
                    <td class="info" colspan="2">
                            Meter No&emsp; &emsp;&emsp;: <?php echo $Meter_no?> <br>
                            Sanctioned Load&ensp;: <?php echo rand(1,10) ?> <br>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td class="info2">Normal</td>
                    <td class="info2">Amount(Taka)</td>
                </tr>

            </table>

            <table class="table2">
                <tr>
                    <td colspan="2" >Billing Month : January</td>
                    <td rowspan="3" style="width:45%">
                        Normal KWH Charge &emsp;&emsp; : <?php echo $kwh_charge?>.00 <br>
                        PFC Charge &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : 57.00<br>
                        X-formsr Loss &emsp;&emsp;&emsp;&emsp;&emsp; : 30.00
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">Bill No. : <?php echo $bill_no?></td>
                </tr>
                <tr>
                    <td>Issue Date : <?php echo $issueDate?></td>
                    <td>Due Date : <?php echo $lastdate?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        Current : <?php echo $issueDate?><br>
                        Previous : <?php $Date= Date('y-m-d', strtotime('-30 days')); echo $Date; ?>
                    </td>
                    <td>Total Energy Charges &emsp;&emsp;&ensp;: <?php $Energy_Charge = $kwh_charge+57+30; echo $Energy_Charge?>.00<br>
                        Demand Charge&emsp;&emsp;&emsp;&emsp;&emsp;: 120.00
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Difference : 55</td>
                    <td rowspan="2">
                        Sub-Total or Minimum Charge : <?php $sub_total = $Energy_Charge+120; echo $sub_total;?>.00<br>
                        Re-Print Charge &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: 20.00
                    </td>
                </tr>
                <tr>
                    <td colspan="2">KWH Consumed : <?php echo $kwh_consumed?></td>
                
                </tr>
                <tr>
                    <td colspan="2" rowspan="4" class="note">
                        সতর্কীকরনঃ- <br>
                        নির্ধারিত ব্যাংক, ব্যাংক বুথ, ইন্টারনেট, বিকাশ কিংবা গ্রামীন ফোন ও <br> রবির মোবাইল ফোন 
                        বা বিল পে সেন্টার/পয়েন্ট ব্যতীত অন্য কোথাও <br> ডেসকো’র বিদ্যুৎ বিল গ্রহন করা হয় না।
                    
                    </td>
                    <td>Total Dues (Rounded)&emsp;&emsp;&emsp;&emsp;: <?php $total_dues = $sub_total+20; echo $total_dues;?>.00</td>
                </tr>
                <tr>
                    <td>VAT (On Current Dues)&emsp;&emsp;&emsp; : <?php echo $vat?></td>
                </tr>
                <tr>
                    <td>Total Bill &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: 
                        <?php 
                            $totalBill = $total_dues+$vat;
                            echo $totalBill;
                            
                            $_SESSION['totalBill'] = $totalBill;
                        ?>.00</td>
                </tr>
                <tr>
                    <td>Late Bill &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: 
                        <?php 
                            $lateFee = (15/100) * $totalBill; 
                            echo $totalBill+$lateFee;
                        ?></td>
                </tr>
                
            </table>
        </div>

        <div class="printBTN">
            <button type="button" onclick="print()" class="btn btn-primary" id="print">
                <img src="https://img.icons8.com/?size=512&id=123&format=png" width="30" height="30">
            </button>
        </div>

    </div>


    <!-- <div>
        <button type="button" onclick="print()" class="btn btn-primary" id="print">
            <img src="https://img.icons8.com/?size=512&id=123&format=png" width="30" height="30">
        </button>
    </div> -->
    

</body>
</html>