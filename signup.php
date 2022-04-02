<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HELPSHI Admin</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>

<body style="background-color: #F4C2C2;">
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <?php 
                        include 'DB.php';       
                    ?>
                    <div class="mb-4">
                        <img class="brand" src="assets/img/logo/authlogo.png" alt="logo">
                    </div>
                    <h6 class="mb-4 text-muted">Create new account</h6>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="tel" class="form-label">Phone Number</label>
                            <input name="tel" type="tel" class="form-control" pattern="[0]{1}[0-9]{}-[0-9]{7}" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" minlength="8" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-5 text-start">
                            <label class="form-label">Profile Picture</label><br>
                            <input class="" name="image" type="file" id="image">
                        </div>
                        <input type="submit" name="create" value ="Create" class="btn btn-success"></input>
                        <a href="users.php"> <button type="button" class="btn btn-secondary">  Cancel  </button></a>
                    </form>
                    <?php

                    if(isset($_POST['create']))
                    {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $tel = $_POST['tel'];
                        $role = "Admin";
                        $image =$_FILES['image']['name'];
                        $dir = "assets/img/admin/";
                        $file = $dir . basename($_FILES['image']['name']);
                        move_uploaded_file($_FILES['image']['tmp_name'],$dir.$image);
                        $imageFileType = strtolower(pathinfo($dir,PATHINFO_EXTENSION));
                        
                        $extensions_arr = array("jpg","jpeg","png","gif");
                        if( in_array($imageFileType,$extensions_arr) ){
                                
                        
                        
                        }
                        $sqlCreate = "INSERT INTO admin (email, password, name, tel, role, profilePic) 
                                VALUES ('$email', '$password', '$name', '$tel' , '$role','$image')";
                        $insert = $conn->query($sqlCreate);
                        
                        if ($insert) {
                            echo '<script type = "text/javascript"> alert("Account is successfully created"); window.location.replace("users.php"); </script>';
                        } else {
                            $_SESSION['msg'] = "Error creating account " . $conn->error;
                            $_SESSION['status'] = "Fail";
                        }
                        echo "<meta http-equiv='refresh' content='0'>";
                        
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>