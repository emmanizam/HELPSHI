<?php include "header_admin.php";?>

            <!-- start of blog components -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Manage Blog 
                            <a href="create-post.php" class="btn btn-sm btn-outline-success float-end "><i class="fas fa-plus-circle"></i> Add Post</a>
                            <a href="dashboard.php" class="btn btn-sm btn-outline-primary float-end me-1"><i class="fas fa-caret-left"></i><span class="btn-header"> Return</span></a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="">
                                <thead>
                                    <tr>
                                        <!--Interface only without PHP-->
                                        <th>Post ID</th>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'DB.php';
                                    $sql = "SELECT * FROM blog";
                                    $result = $conn->query($sql);
                                    $num = 0;

                                    if($result->num_rows > 0){
                                        
                                ?>
                                    <tr>
                                    <?php while($row = $result->fetch_assoc()){
                                        $currentPost = $row['postID'];
                                        ?>
                                        <td><?= $currentPost; ?></td>
                                        <td><?= $row['dates']; ?></td>
                                        <td><?= $row['title']; ?></td>
                                        <td><?= $row['author_email']; ?></td>
                                        <td class="text-end">
                                            <a href="view-post.php?id= <?php echo $currentPost ?>" class="btn btn-info btn-rounded"><i class="fas fa-eye"></i></a>
                                            <a href="update-post.php?id= <?php echo $currentPost ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <button type="button" class="btn btn-outline-danger btn-rounded" data-id="<?php echo $currentPost ?>" onclick="confirmDelete(this);"><i class="fas fa-trash"></i></button>
                                        </td>
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
                    <!---Delete confirmation modal starts here-->
                    <div id="deleteModal" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Post</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal">×</button>
                                </div>
                    
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this post?<br>This process cannot be undone</p>
                                    <form method="POST" action="delete-post.php" id="form-delete-post">
                                        <input type="hidden" name="id">
                                    </form>
                                </div>
                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" form="form-delete-post" class="btn btn-danger">Delete</button>
                                </div>
                    
                            </div>
                        </div>
                    </div>
                    <!---Delete confirmation modal ends here-->
                    <?php
                        
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(self) {
        var id = self.getAttribute("data-id");
    
        document.getElementById("form-delete-post").id.value = id;
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