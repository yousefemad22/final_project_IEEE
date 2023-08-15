<?php
$page_title="Menu Categories";
$css_file="home.css";
session_start();
    if(isset($_SESSION['name'])){
    include_once("includes/header.php");
    require_once("includes/function.php");

    $categories=get_all_data("menu_categories");

    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_STRING);
        add_category($category_name);       
    }

    
?>
    <div class="card m-5">
        <div class="card-header ">
            Menu Categories
        </div>
        <div class="card-body">
            <!-- ADD NEW CATEGORY BUTTON -->

            <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_category" data-placement="top">
                <i class="fa fa-plus"></i> 
                Add Category
            </button>

            <!-- Add New Category Modal -->

            <div class="modal" id="add_new_category" tabindex="-1">
                <div class="modal-dialog" >
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="category_name">Category name</label>
                                    <input type="text" name="category_name" class="form-control"  placeholder="Category Name"required >                
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="add_new_category">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- MENU CATEGORIES TABLE -->

            <table class="table table-striped categories-table">
                <thead >
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($categories as $Category){ ?>
                        <tr>
                        <td><?php echo $Category['category_id']?></td>
                        <td><?php echo $Category['category_name']?></td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?cat_id=<?php echo $Category['category_id']?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                        <?php } 
                ?>

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






