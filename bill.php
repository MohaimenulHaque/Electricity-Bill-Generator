<?php
// Get the current month and date
$currentMonth = date('F, Y'); 
$issueDate = date('Y-m-d');   



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DESCO Electricity Bill</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


<link rel="stylesheet" href="styleb.css"> 






</head>
<body>

<div class="flex-container">
  <div class="header">
   <label style="font-size: 18px; font-weight: bold;">Electricity bill for month:</label> 
<input type="text" name="billingMonth" value="<?php echo $currentMonth; ?>" required readonly><br>

   
    <div class="align-center">
      <span style="color: red;">"দেশ প্রেমের শপথ নিন, দুর্নীতিকে বিদায় দিন"</span>
      <img src="mujib3.png" alt="mujib image" style="margin-left: 20px;">
    </div>
</div>

  


<div class="consumers-copy">
    Consumers Copy
  </div>

  </div>

<div class="company-info">
  <div class="logo">
    <img src="desco2.png" alt="DESCO Logo">
  </div>
  <div class="text-info">
    <span class="company-name">DESCO Dhaka Electric Supply Company Ltd.</span><br>
    <span class="division">Sales & Distribution Division, Baridhara</span><br>
    <span class="motto">POWER IS YOURS</span>
  </div>

</div>
</div>
</div>


  <div class="form-container">


<form action="submit-bill.php" method="post" class="form-container">
 
 
 
        <div class="input-group">
    <label>Tariff:</label> <input type="text" name="tariff" required><br>
<label>Zone/Block:</label> <input type="text" name="zoneBlock" required><br>
<label>Walking Order:</label> <input type="number" name="walkingOrder" required><br>
<label>Account No.:</label> <input type="number" name="accountNo" required><br>
<label>Meter No.:</label> <input type="number" name="meterNo" required><br>
<label>Sanctioned Load:</label> <input type="text" name="sanctionedLoad" required><br>

<label>Name:</label> <input type="text" name="Name" required><br>
<label>Address:</label> <input type="text" name="Name" required><br>



<label>Billing Month:</label> <input type="text" name="billingMonth" required><br>
    <label>Issue Date:</label> <input type="date" name="issueDate" required><br>
 <label>Due Date:</label> <input type="date" name="dueDate" required><br>
  

  
  
    <label>Current:</label> <input type="date" name="currentReading" required><br>
    <label>Previous:</label> <input type="date" name="previousReading" required><br>
    <label>Difference:</label> <input type="number" name="difference" required><br>
    <label>KWH Consumed:</label> <input type="number" name="kwhConsumed" required><br>
  
    
 
  
    <label>Normal KWH Charge:</label> <input type="number" name="normalCharge" required><br>
    <label>PFC Charge:</label> <input type="number" name="pfcCharge" required><br>

<label>X-former Loss:</label> <input type="number" name="x-formerloss" required><br>

    <label>Total Energy Charges:</label> <input type="number" name="totalCharges" required><br>
    <label>Demand Charge:</label> <input type="number" name="demandCharge" required><br>
    <label>Sub-Total or Minimum Charge:</label> <input type="number" name="subTotalCharge" required><br>
    <label>Service Charge:</label> <input type="number" name="serviceCharge" required><br>
<label>Supplimentary Bill:</label> <input type="number" name="sup_bill" required><br>
<label>Adjustment:</label> <input type="number" name="adjst" required><br>
<label>Current dues:</label> <input type="number" name="Cur_dues" required><br>
<label>Re-Print Charge:</label> <input type="number" name="REP-charge" required><br>
<label>Installment of S/Drop:</label> <input type="number" name="installment" required><br>
<label>Meter Rent:</label> <input type="number" name="meter_rent" required><br>
<label>Total Dues (Rounded):</label> <input type="number" name="tot_dues" required><br>
<label>VAT (On current Dues):</label> <input type="number" name="vat" required><br>
<label>Total Bill:</label> <input type="number" name="tot_bill" required><br>
<label>Total if paid after due date:</label> <input type="number" name="" required><br>
<label>Not less than Tk:</label> <input type="text" name="written_number" required><br>

  <button id="downloadBtn" class="btn">Download PDF</button>
  </div>
 
   </div>


<script>
document.getElementById('downloadBtn').addEventListener('click', function() {
  const element = document.body; // The entire body element to be downloaded

  // Use html2pdf library to generate and download the PDF
  html2pdf()
    .from(element)
    .save('entire-webpage.pdf');
});
</script>



</form>


</body>
</html>
