<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = mysqli_query($conn,"DELETE FROM `inquiry` WHERE `id` = $id");
        if($query)
        {
            ?>
                <script>
                    alert("Message deleted.")
                    window.location="inquiry.php";
                 </script>
            <?php
        }
        else{
            ?>
                <script>alert("Error Occured.")</script>
            <?php
        }
    }
?>
        <!-- Navbar -->
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <!-- /.modal -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1289.9px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contact Inquiry</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Inquiry</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                               <div class="card-header">
                                    <h3 class="card-title">Contacts</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div style="overflow-x:auto;">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Mail</th>
                                                    <th>Phone</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = mysqli_query($conn,"SELECT * FROM `inquiry` ORDER BY `created_at` DESC");
                                                    $count = 0;
                                                    while($row = mysqli_fetch_assoc($query)){
                                                        $count++;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count ?></td>
                                                                <td><?php echo $row['name'] ?></td>
                                                                <td><?php echo $row['mail'] ?></td>
                                                                <td><?php echo $row['mobile'] ?></td>
                                                                <td><?php echo $row['subject'] ?></td>
                                                                <td><?php echo $row['message'] ?></td>
                                                                <td>
                                                                    <a href="./inquiry.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
    <?php
        include('includes/footer.php');
    ?>

     <script>

  $(function () {

    $("#example1").DataTable({

      "responsive": true, "lengthChange": true, "autoWidth": false

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": true,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false,

      "responsive": true,

    });

  });

</script>