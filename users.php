<?php include "header_admin.php"; 

    include 'DB.php';
    session_start();
    $currentUser = $_SESSION['emailSession'];
    $sql = "SELECT role FROM admin WHERE email='$currentUser'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if ($row['role'] == "Super Admin") {
?>

            <!-- start of user components for super admin-->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Users
                            <a href="signup.php" class="btn btn-sm btn-outline-success float-end "><i class="fas fa-plus-circle"></i> Add User</a>
                            <a href="dashboard.php" class="btn btn-sm btn-outline-primary float-end me-1"><i class="fas fa-caret-left"></i><span class="btn-header"> Return</span></a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="">
                                <thead>
                                    <tr>
                                        <!--Interface only without PHP-->
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Profile Picture</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php 
                                    include 'DB.php';
                                    $sql2 = "SELECT * FROM admin";
                                    $result = $conn->query($sql2);
                                    if($result->num_rows > 0){?>
                                        <?php while($row = $result->fetch_assoc()){
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['role']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['tel']; ?></td>
                                        <td><img src="assets/img/admin/<?php echo $row['profilePic']; ?>" style="width: 100px; height: 100px;"/></td>
                                        <?php
                                        if ($row['role'] == "Super Admin") {?>
                                        <td><button type="button" class="btn btn-outline-danger btn-rounded" disabled><i class="fas fa-trash"></i></button></td>
                                        <?php
                                        }
                                        else {?>
                                        <td> <button type="button" class="btn btn-outline-danger btn-rounded" data-id="<?php echo $row['email']; ?>" onclick="confirmDelete(this);"><i class="fas fa-trash"></i></button></td>
                                        <?php
                                        }?>
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
                    </div>
                    <!--Ends of users Ccomponents-->

                    <!---Delete confirmation modal starts here-->
                    <div id="deleteModal" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal">×</button>
                                </div>
                    
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this user?<br>This process cannot be undone</p>
                                    <form method="POST" action="delete-profile.php" id="form-delete-profile">
                                        <input type="hidden" name="id">
                                    </form>
                                </div>
                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" form="form-delete-profile" class="btn btn-danger">Delete</button>
                                </div>
                    
                            </div>
                        </div>
                    </div>
                    <!---Delete confirmation modal ends here-->
         <?php
            } 
            else {?>

            <!-- start of user components for  admin-->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Users
                        <a href="signup.php" class="btn btn-sm btn-outline-primary float-end "><i class="fas fa-plus-circle"></i> Add User</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="">
                                <thead>
                                    <tr>
                                        <!--Interface only without PHP-->
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Profile Picture</th>
                                    </tr>
                                </thead>
                                <?php 
                                    include 'DB.php';
                                    $sql3 = "SELECT * FROM admin";
                                    $result = $conn->query($sql3);
                                    if($result->num_rows > 0){?>
                                        <?php while($row = $result->fetch_assoc()){
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['role']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['tel']; ?></td>
                                        <td><img src="assets/img/admin/<?php echo $row['profilePic']; ?>" style="width: 100px; height: 100px;"/></td>
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
                    </div>
                    <!--Ends of users Ccomponents-->
        
                    <?php
                        }
                    }
                }
                else{
                    echo "No results found";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    
    <script>
    function confirmDelete(self) 
    {
        var id = self.getAttribute("data-id");
    
        document.getElementById("form-delete-profile").id.value = id;
        $("#deleteModal").modal("show");
    }
    </script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>