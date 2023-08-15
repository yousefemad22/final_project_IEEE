<?php
    session_start();

    $page_title="Tabels";
    $css_file="home.css";

    if(isset($_SESSION['name'])){
        include_once("includes/header.php");
        require_once("includes/function.php");
    
        $tabels=get_all_data('tables');
    
     
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $Capacity=$_POST['Capacity'];
            add_table($Capacity);        
        }
        
        ?>
    
        <div class="card m-5">
            <div class="card-header ">
                Tabels
            </div>
            <div class="card-body">
                 <!-- add new users button -->
    
                 <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_users" >
                <i class="fa fa-plus"></i>
                    Add Table
                </button>
    
                <!-- add new users model -->
    
                <div class="modal" id="add_new_users" tabindex="-1">
                    <div class="modal-dialog" >
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Table</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="user_name">Table Capacity</label>
                                        <input type="number" name="Capacity" class="form-control"  placeholder="Capacity"required >
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="add_new_users">Add Table</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    
                <!-- MENU CATEGORIES TABLE -->
                <?php
                    $stmt = $con->prepare("SELECT * FROM tables");
                    $stmt->execute();
                    $tabels = $stmt->fetchAll();
                    
                ?>
    
           
                <table class="table table-bordered categories-table" style="text-center">
                    <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Capacity</th>
                            
                            </tr>
                    </thead>
                        <tbody>
                        <?php foreach($tabels as $table){ ?>
                            <tr>
                            <td><?php echo $table['table_id']?></td>
                            <td><?php echo $table['capacity']?></td>
                            
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







