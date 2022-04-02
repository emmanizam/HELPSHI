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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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

            <!-- starts of manage crowdfund page -->
            <?php 
                include 'DB.php';
                $sql = "SELECT * FROM donation";
                $result = $conn->query($sql);

                $totalDonor = 0;
                $totalDonation = 0;
                $currYear = date("Y");
                $totalMonthly = array(0,0,0,0,0,0,0,0,0,0,0,0);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $totalDonation = $totalDonation + $row['amount'];
                        $totalDonor++;
                        $month = date("m",strtotime($row['date']));
                        $year = date("Y",strtotime($row['date']));
                        if ($year == $currYear) {
                            for($x = 0; $x<13; $x++)
                            {
                                if ($month == $x+1) {
                                    $totalMonthly[$x] += $row['amount'];                                      
                                }
                            }
                        }
                    }
                }
                
                $totalMonthly;
               
            ?>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">HELPSHI ADMIN</div>
                            <h3>Manage Blog 
                                <a href="https://toyyibpay.com/home" class="btn btn-sm btn-outline-success float-end "><i class="fas fa-cog"></i> Manage Payment Gateway</a>
                                <a href="dashboard.php" class="btn btn-sm btn-outline-primary float-end me-1"><i class="fas fa-caret-left"></i><span class="btn-header"> Return</span></a>
                            </h3> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-9 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="olive large-icon mb-2 fas fa-dollar-sign"></i>
                                            <h4 class="mb-0">RM<?= $totalDonation; ?></h4>
                                            <p class="text-muted">TOTAL DONATION AMOUNT</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="blue large-icon mb-2 fa fa-users"></i>
                                            <h4 class="mb-0"><?= $totalDonor; ?></h4>
                                            <p class="text-muted">TOTAL DONORS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Crowdfund Overview of <?= $currYear; ?> 
                                                <p class="text-muted">Amount of donation in Ringgit Malaysia (RM)</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <canvas id="myChart" style="width:100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script>
    
    var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var yValues = [<?php echo $totalMonthly[0] ?>,<?php echo $totalMonthly[1] ?>, <?php echo $totalMonthly[2] ?>, <?php echo $totalMonthly[3] ?>, <?php echo $totalMonthly[4] ?>, <?php echo $totalMonthly[5] ?>, <?php echo $totalMonthly[6] ?>, <?php echo $totalMonthly[7] ?>, <?php echo $totalMonthly[8] ?>, <?php echo $totalMonthly[9] ?>, <?php echo $totalMonthly[10] ?>, <?php echo $totalMonthly[11] ?>];
    var barColors = ["red", "green","blue","orange","brown", "purple", "yellow", "chartreuse","aqua","darkmagenta","hotpink", "slateblue"];

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: ""
        }
    }
    });
    </script>
    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    
    <script src="assets/js/script.js"></script>
</body>

</html>
