<?php

include 'DB.php';

$status_id=$_GET['status_id'];
$billcode=$_GET['billcode'];

$some_data = array(
  'billCode' => $billcode,
  'billpaymentStatus' => $status_id,
  'billAmount'=>$rmx100,
  'billTo'=>$donor,
  'billEmail'=>$email,
  'billPhone'=>$telNo,
);    

$curl = curl_init();

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/getBillTransactions');  
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);  
curl_close($curl);

echo $result;

$arr = json_decode($result, true);

$email=$arr[0]["billEmail"];
$amountx100=$arr[0]["billAmount"];
$donor=$arr[0]["billTo"];
$telno=$arr[0]["billPhone"];
$currdate = date("Y-m-d");
$amount = ($amountx100/100);

$sqlCreate = "INSERT INTO donation (donor, email, telNo, amount, date) 
  VALUES ('$donor', '$email', '$telNo', $amount,'$currdate')";
$insert = $conn->query($sqlCreate);

if($insert)
{
  echo '<script type = "text/javascript"> alert("Thank you for the donation!"); window.location.replace("index.php"); </script>';
}
else
{
  echo '<script type = "text/javascript"> alert("An error occured! Please try again.")  window.location.replace("donation-form.php"); </script>';
}

?>