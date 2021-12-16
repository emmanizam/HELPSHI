<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/logoatas.png">
    <title>HELPSHI Admin</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-pastelpink">
                <a href="dashboard.html"><img src="assets/img/dashboardlogo.png" alt="logo" class="app-logo"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user" style="color: rgb(134, 37, 77)"></i>  <i style="font-size: .8em; color: rgb(134, 37, 77)" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="profile.php" class="dropdown-item"><i class="fas fa-address-card" style="color: rgb(134, 37, 77)"></i> Profile</a></li>
                                        <div class="dropdown-divider"></div>
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
            <!-- start of users components -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>List of Users
                            <a href="signup.php" class="btn btn-sm btn-outline-primary float-end "><i class="fas fa-plus-circle"></i> Add</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'DB.php';
                                    $sql = "SELECT * FROM admin";
                                    $result = $conn->query($sql);
                                    $num = 0;

                                    if($result->num_rows > 0){
                                        
                                ?>
                                    <tr>
                                        <?php while($row = $result->fetch_assoc()){?>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['tel']; ?></td>
                                        <td><img src="img/<?php echo $row['profilePic']; ?>" style="width: 100px; height: 100px;"/></td>

                                    </tr>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "No results found";
                                    }
                                    
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>
