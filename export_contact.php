<?php
	include('DB.php');
    $fromDate=$_POST['fromDate'];
    $toDate=$_POST['toDate'];
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename= report-contact(".date('d-m-Y').").xls");

?>	

<h2 style="text-align: center">Report Contact</h2>

<table border="1">
	  <tr>
      <th>ID</th>
	  <th>Date</th>
      <th>Name</th>
      <th>Email</th>
 	  <th>Message</th>									                                 
      </tr>
	
 <?php 
		echo $fromDate, $toDate	;						
		$no = 1;
        $sql = "SELECT * FROM contact WHERE date BETWEEN '$fromDate' and '$toDate'";		
		$result = $conn->query($sql);
        if($result->num_rows > 0){
            while($data = $result->fetch_assoc()){							
		?>							
        <tr>
            <td><?php echo $data['contactID'] ?></td>
            <td><?php echo $data['date'] ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['message'] ?></td>								
            </tr>
		<?php }}?>
</table>