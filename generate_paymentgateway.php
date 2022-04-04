<?php
$donor = $_POST['donor'];
$email = $_POST['email'];
$telNo = $_POST['telNo'];
$amount = $_POST['amount'];

$rmx100=($amount*100);
  $some_data = array(
    'userSecretKey'=>'',
    'categoryCode'=>'',
    'billName'=>'HELPSHI Donation',
    'billDescription'=>'Donation Amount RM'.$amount,
    'billPriceSetting'=>1,
    'billPayorInfo'=>1,
    'billAmount'=>$rmx100,
    'billReturnUrl'=>'http://localhost/HELPSHI/response.php', // change based on domain name
    'billCallbackUrl'=>'',
    'billExternalReferenceNo'=>'',
    'billTo'=>$donor,
    'billEmail'=>$email,
    'billPhone'=>$telNo,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'0',
  ); 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result,true);
  $billcode=$obj[0]['BillCode'];
?>
<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
    //redirect to payment gateway
   window.location.href="https://toyyibpay.com/<?php echo $billcode;?>"; 
 </script>
