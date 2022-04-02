<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assets/img/logo/logoatas.png">
    <title>HELPSHI Admin</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <link href="assets/vendor/airdatepicker/css/datepicker.min.css" rel="stylesheet">
    <link href="assets/vendor/mdtimepicker/mdtimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <style>
        /* inline style for mdtimepicker demo */
        .mdtp__wrapper.inline {display: block !important;position: relative;box-shadow: none;border: 1px solid #E0E0E0;max-width: 300px;margin: 0 !important;padding: 0 !important;transform: inherit;left: 0;top: 0;}
        .mdtp__wrapper.inline .mdtp__time_holder {width: auto;}
    </style>
</head>

<body>
    <div class="wrapper">
        <div id="body" class="">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-pastelpink">
                <a href="dashboard.php"><img src="assets/img/logo/dashboardlogo.png" alt="logo" class="app-logo"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user" style="color: rgb(134, 37, 77); margin-left: 40px;"></i>  <i style="font-size: .8em; color: rgb(134, 37, 77); margin-right: 40px;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="users.php" class="dropdown-item"><i class="fas fa-user-friends" style="color: rgb(134, 37, 77)"></i> Users</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a  href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt" style="color: rgb(134, 37, 77)"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of navbar navigation -->
            <!-- starts of report page -->
            <?php 
                include 'DB.php';
                $sql1 = "SELECT * FROM donation ORDER BY donationID DESC";
                $result1 = $conn->query($sql1);
                $sql2 = "SELECT * FROM contact ORDER BY contactID DESC";
                $result2 = $conn->query($sql2);
                $num = 0;
    
            ?>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                        <h3>Blog Post
                            <a href="dashboard.php" class="btn btn-sm btn-outline-primary float-end "><i class="fas fa-caret-left"></i> Return</a>
                        </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="donation-tab" data-bs-toggle="tab" href="#donation" role="tab" aria-controls="donation" aria-selected="true">Donation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="requestHelp-tab" data-bs-toggle="tab" href="#requestHelp" role="tab" aria-controls="requestHelp" aria-selected="false">Contact</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <!--Donation tab starts here-->
                                        <div class="tab-pane fade active show" id="donation" role="tabpanel" aria-labelledby="donation-tab">
                                            <div class="head">
                                                <h5 class="mb-0">List of Donation<a href="#" class="btn btn-sm btn-outline-primary float-end " data-bs-toggle="modal" data-bs-target="#donationModal"><i class="fas fa-file-export"></i> Generate Report</a></h5>
                                            </div><br>
                                            <table id="datatableid1" class="table table">
                                                <thead class="success">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Donor</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Amount (RM)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    if($result1->num_rows > 0){
                                                ?>
                                                    <tr>
                                                    <?php while($row = $result1->fetch_assoc()){ 
                                                        $currID = $row['donationID'];
                                                        $currDate = $row['date'];
                                                        $currDonor = $row['donor'];
                                                        $currEmail = $row['email'];
                                                        $currTel = $row['telNo'];
                                                        $currAmt = $row['amount'];                                                  
                                                    ?>
                                                        <td><?= $currID; ?></td>
                                                        <td><?= $currDate; ?></td>
                                                        <td><?= $currDonor; ?></td>
                                                        <td><?= $currEmail; ?></td>
                                                        <td><?= $currTel; ?></td>
                                                        <td><?= $currAmt; ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    else{
                                                        echo "No results found";
                                                    }                                                   
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--Donation tab ends here-->
                                        <!--Contact tab starts here-->
                                        <div class="tab-pane fade" id="requestHelp" role="tabpanel" aria-labelledby="requestHelp-tab">
                                            <div class="head">
                                                <h5 class="mb-0">List of Contact Messages<a href="3" class="btn btn-sm btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#contactModal" ><i class="fas fa-file-export"></i> Generate Report</a></h5>
                                            </div><br>
                                            <table id="datatableid2" class="table table">
                                                <thead class="success">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                    if($result2->num_rows > 0){
                                                ?>
                                                    <tr>
                                                    <?php while($row = $result2->fetch_assoc()){
                                                        $currID = $row['contactID'];
                                                        $currDate = $row['date'];
                                                        $currName = $row['name'];
                                                        $currEmail = $row['email'];
                                                        $currMsg = $row['message'];
                                                    ?>
                                                        
                                                        <td><?= $currID ?></td>
                                                        <td><?= $currDate; ?></td>
                                                        <td><?= $currName; ?></td>
                                                        <td><?= $currEmail; ?></td>
                                                        <td><?= $currMsg; ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    else{
                                                        echo "No results found";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--Contact tab ends here-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--********************************************-->

                        <!--donation generate report modal starts here-->
                        <div class="col-lg-6">
                            <div class=""> 
                                <div class="card-body text-center">
                                    <div class="modal fade" id="donationModal" role="dialog" tabindex="-1">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Generate Report</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body text-start">
                                            <p>Please fill in the information below.</p>
                                            <form action="export_donation.php" method="POST">
                                                <div class="mb-3">
                                                    <p>REPORT DATE:</p>
                                                    <label class="form-label">From </label>
                                                    <input type="date" id="fromDate" name="fromDate" />
                                                    <label class="form-label">  To </label>
                                                    <input type="date" id="toDate" name="toDate" />
                                                </div>
                                                <div class="mb-3">
                                                <input type="submit" name="submit" class="btn btn-info" value="Export">
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--donation generate report modal ends here-->
                        <!--contact generate report modal starts here-->
                        <div class="col-lg-6">
                            <div class=""> 
                                <div class="card-body text-center">
                                    <div class="modal fade" id="contactModal" role="dialog" tabindex="-1">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Generate Report</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body text-start">
                                            <p>Please fill in the information below.</p>
                                            <form action="export_contact.php" method="POST">
                                                <div class="mb-3">
                                                    <p>REPORT DATE:</p>
                                                    <label class="form-label">From </label>
                                                    <input type="date" id="fromDate" name="fromDate" />
                                                    <label class="form-label">  To </label>
                                                    <input type="date" id="toDate" name="toDate" />
                                                </div>
                                                <div class="mb-3">
                                                <input type="submit" name="submit" class="btn btn-info" value="Export">
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--contact generate report modal ends here-->
                </div>
            </div>
            <?php
            $conn->close();
            ?>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>

        $(document).ready(function() {
    $('#datatableid1').DataTable();
} );

</script>
<script>

        $(document).ready(function() {
    $('#datatableid2').DataTable();
} );

</script>
</body>

</html>
