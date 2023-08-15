<?php
$page_title="Add New Menu";
$css_file="home.css";
session_start();
    if(isset($_SESSION['name'])){
    include_once("includes/header.php");
    require_once("includes/function.php");
    
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        $menu_name = filter_var($_POST['menu_name'], FILTER_SANITIZE_STRING);
        $menu_category = filter_var($_POST['menu_category'], FILTER_SANITIZE_STRING);
        $menu_description = filter_var($_POST['menu_description'], FILTER_SANITIZE_STRING);
        $price= filter_var($_POST['price'], FILTER_SANITIZE_STRING);

        $personal_image_name = $_FILES["personal_image"]["name"];
        $personal_image_size = $_FILES["personal_image"]["size"];
        $personal_image_tmp_name = $_FILES["personal_image"]["tmp_name"];
        $personal_image_type = $_FILES["personal_image"]["type"];
        $extention_allowed = array("png","jpg","jpeg","webp");  
        
        
       @$personal_image_extention  = strtolower(end(explode(".",$personal_image_name)));
       if(in_array($personal_image_extention,$extention_allowed)){
        $final_personal_image_name = $_POST['menu_name'] . "_" . rand(0,1000) . "." . $personal_image_extention;
        $personal_image_destination = "img/img/" . $final_personal_image_name;

        move_uploaded_file( $personal_image_tmp_name , $personal_image_destination);


        add_new_menu($menu_name,$menu_description,$price,$personal_image_destination,$menu_category);
        
    }
    }
?>
    <!-- end add new menu -->

    <!-- start add new menu -->

    <div class="container" style="width: 80%;">

        <div class="card mt-3  mb-3 ">
            <div class="card-header"> Add New Menu</div>
            <div class="container" style="width: 60%;">
                <div class="card-body text-secondary ">
                    <div class="card mb-1 ml-2">
                        <div class="card-header"> Add New Menu</div>
                        <div class="card-body text-secondary">
                            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                <div style="display:flex;justify-content: space-between;">
                                    <div style="display:flex">
                                        <div class="icon"style="m-5"> <i class="fa-solid fa-sliders"></i> </div>
                                        <div class="title-container">Menu details</div>
                                    </div>
                                    <div class="button-controls" >
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Menu Name</label>
                                    <input type="text" class="form-control" name="menu_name" placeholder="Menu Name" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Menu Category</label>
                                    <select  name="menu_category" class="form-control" aria-label="Default select example" required>
                                        
                                                <?php
                                                  $stmt = $con->prepare("SELECT * FROM menu_categories");
                                                  $stmt->execute();
                                                  $categories = $stmt->fetchAll();
                                                    foreach($categories as $category)
                                                    {
                                                        echo "<option value = '".$category['category_id']."' selected>";
                                                        echo ucfirst($category['category_name']);
                                                        echo "</option>";
                                                            
                                                    }
                                                ?>
                                            </select>
                                </div>
                                <div class="mb-3">
                                    <label>Menu Description</label>
                                    <textarea class="form-control" name="menu_description" autocomplete="off" required></textarea>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Menu Price($)</label>
                                    <input type="text" class="form-control" placeholder="Menu Price" name="price" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                    <label for="fileupload">Menu Image</label>
                                    <div class="round1 "style="text-align:center;" >
                                    <img src="" alt="" id="upload-img" style="width: 140px;height: 140px;border-radius: 50%; border: 4px solid #007bff;">
                                    </div>
                                    <div class="custom-file ">
                                    
                                            <input type="file" id="fileupload" style="display: none;" name="personal_image" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 

    <!--  end add new menu -->
    <script >
            $('.round1').click(function(){
            $('#fileupload').click()
            });
            $(function(){
            $("#fileupload").change(function(event){
                var x=URL.createObjectURL(event.target.files[0]);
                $("#upload-img").attr("src",x);
                console.log(event)

            })
            })
    </script>

<?php
    include_once("includes/footer.php");
}else{
    header('location:login.php');
}
?>







