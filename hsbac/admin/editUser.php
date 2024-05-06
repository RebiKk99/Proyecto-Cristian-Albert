<?php
    include_once "db_hsbac.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    if( isset($_REQUEST['save']) ){

        $email= mysqli_real_escape_string($con,$_REQUEST['email']??'') ;
        $pass= md5( mysqli_real_escape_string($con,$_REQUEST['pass']??'')) ;
        $name= mysqli_real_escape_string($con,$_REQUEST['name']??'') ;
        $id= mysqli_real_escape_string($con,$_REQUEST['id']??'') ;

        $query="UPDATE users SET
        email='" . $email . "',pass='" . $pass . "',name='" . $name . "'
        where id='" . $id . "';
        ";
        $res=mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?module=users&message=User '.$name.' successfully updated" /> ';
        }
        else {           
?>
            <div class="alert alert-danger" role="alert">
                Error while updating user <?php echo mysqli_error($con); ?>
            </div>
<?php
        }
    }
$id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
$query=" SELECT id,email,pass,name from users where id='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);

?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit user</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
                <div class="card-body">
                    <form action="panel.php?module=editUser" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"  class="form-control" value="<?php echo $row['email'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Pass</label>
                            <input type="password" name="pass"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name"  class="form-control" value="<?php echo $row['name'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" required="required">
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                    </form>                    
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>