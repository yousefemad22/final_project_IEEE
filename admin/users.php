<?php
    session_start();
    $page_title="Users";
    $css_file="home.css";
    if(isset($_SESSION['name'])){
        include_once("includes/header.php");
    require_once("includes/function.php");

    $users=get_all_data('users');

    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        
        $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $hased_password = password_hash($password,PASSWORD_DEFAULT);
        add_user($user_name,$email,$hased_password);
        
    }

    
    ?>

    <div class="card m-5">
        <div class="card-header ">
            Users
        </div>
        <div class="card-body">
             <!-- add new users button -->

             <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_users" >
            <i class="fa fa-plus"></i>
                Add User
            </button>

            <!-- add new users model -->

            <div class="modal" id="add_new_users" tabindex="-1">
                <div class="modal-dialog" >
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="user_name">User name</label>
                                    <input type="text" name="user_name" class="form-control"  placeholder="User Name"required >

                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control"  placeholder="E-mail" required>

                                    <label for="password">Passwotd</label>
                                    <input type="password" name="password" class="form-control"  placeholder="Password" required>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="add_new_users">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- MENU CATEGORIES TABLE -->
        
            
            <table class="table table-bordered categories-table" style="text-center">
                <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">E-mail</th>
                        </tr>
                </thead>
                    <tbody>
                    <?php foreach($users as $user){ ?>
                        <tr>
                        <td><?php echo $user['user_id']?></td>
                        <td><?php echo $user['user_name']?></td>
                        <td><?php echo $user['email']?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
            </table>
     
        </div>
      </div>
  
<?php
    include_once("includes/footer.php");
}else{
    header('location:login.php');
}
?>







