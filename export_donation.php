<?php
	include('DB.php');
    $fromDate=$_POST['fromDate'];
    $toDate=$_POST['toDate'];
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename= report-donation(".date('d-m-Y').").xls");

?>	

<h2 style="text-align: center">Report Donation</h2>

<table border="1">
	  <tr>
      <th>ID</th>
	  <th>Date</th>
      <th>Donor</th>
      <th>Email</th>
      <th>Phone Number</th>
 	  <th>Amount (RM)</th>									                                 
      </tr>
	
 <?php 
		echo $fromDate, $toDate	;						
		$no = 1;
        $sql = "SELECT * FROM donation WHERE date BETWEEN '$fromDate' and '$toDate'";		
		$result = $conn->query($sql);
        if($result->num_rows > 0){
            while($data = $result->fetch_assoc()){							
		?>							
        <tr>
            <td><?php echo $data['donationID'] ?></td>
            <td><?php echo $data['date'] ?></td>
            <td><?php echo $data['donor'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['telNo'] ?></td>
            <td><?php echo $data['amount'] ?></td>								
            </tr>
		<?php }}?>
</table>