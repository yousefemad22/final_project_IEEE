<?php
    session_start();
    if(isset($_SESSION['name'])){
        $page_title="Menus";
        $css_file="home.css";
            include_once("includes/header.php");
            require_once("includes/function.php");

            $menus = select_menu('menus','menu_categories');
        ?>
            <div class="card m-5">
                <div class="card-header ">
                    Menus 
                </div>
                <div class="card-body">
                    <!-- ADD NEW CATEGORY BUTTON -->
                    <a href="new_menu.php" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                        <i class="fa fa-plus"></i>    
                        Add New Menu 
                    </a>
                    <!-- MENU CATEGORIES TABLE -->

                    <table class="table table-bordered categories-table">
                        <thead>
                            <tr>
                                <th scope="col">Menu Name</th>
                                <th scope="col">Menu Category	</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($menus as $menu)
                            {
                                ?>
                            <tr>
                                <td><?php echo $menu['menu_name']?></td>
                                <td><?php echo $menu['category_name']?></td>
                                <td><?php echo $menu['menu_description']?></td>
                                <td><?php echo $menu['price']." $ " ?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit_menu.php?menu_id=<?php echo $menu['menu_id']?>">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a class="btn btn-danger" href="delete.php?menu_id=<?php echo $menu['menu_id']?>">
                                        <i class="fa-solid fa-trash"></i>
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


<?php
    include_once("includes/footer.php");
  }else{
    header('location:login.php');
}

?>






