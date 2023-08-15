<?php
$page_title="Update  Menu";
$css_file="home.css";
session_start();
    if(isset($_SESSION['name'])){
    include_once("includes/header.php");
    include_once("includes/connectDB.php");

    if(isset($_GET['menu_id'])){
        $id=$_GET['menu_id'];
        $stmt = $con->prepare("SELECT * FROM menus WHERE menu_id=?");
        $stmt->execute(array($_GET['menu_id']));
        $menu_data = $stmt->fetch();
    }
    else{
        header("location:dashboard.php");
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
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
        $personal_image_destination = "img/" . $final_personal_image_name;

        move_uploaded_file( $personal_image_tmp_name , $personal_image_destination);
        global $con;
        $stmt = $con->prepare('UPDATE menus SET menu_name=? ,menu_description=?,price=?,menu_image=?,category_id=? WHERE menu_id=?');
        $stmt->execute(array($menu_name,$menu_description,$price,$personal_image_destination,$menu_category,$_GET['menu_id']));
       }
        echo"
        <script>
            toastr.success('Updated successfull')
        </script>";
      }


?>


    <!-- start add new menu -->

    <div class="container" style="width: 80%;">

        <div class="card mt-3  mb-3 ">
            <div class="card-header"> Update Menu</div>
            <div class="container" style="width: 60%;">
                <div class="card-body text-secondary ">
                    <div class="card mb-1 ml-2">
                        <div class="card-header"> Update Menu</div>
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
                                <div class="mb-3 ">
                                    <label class="form-label">Menu Name</label>
                                    <input type="text" class="form-control" value="<?php echo $menu_data['menu_name'];?>" name="menu_name" placeholder="Menu Name">
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Menu Category</label>
                                     <select class="form-control" aria-label="Default select example " name="menu_category">
                                            <?php
                                                        
                                             $stmt = $con->prepare("SELECT * FROM menu_categories");
                                             $stmt->execute();
                                             $categories = $stmt->fetchAll();                                                    
                                             
                                             foreach($categories as $category)
                                             {
                                                 if($category['category_id'] == $menu['category_id'])
                                                 {
                                                     echo "<option value = '".$category['category_id']."' selected>";
                                                         echo ucfirst($category['category_name']);
                                                     echo "</option>";
                                                 }
                                                 else
                                                 {
                                                     echo "<option value = '".$category['category_id']."'>";
                                                         echo ucfirst($category['category_name']);
                                                     echo "</option>";
                                                 }
                                             }
                                           ?>  
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Menu Description</label>
                                    <input  type="textarea" class="form-control"  value="<?php echo $menu_data['menu_description'];?>" name="menu_description"></input>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Menu Price($)</label>
                                    <input type="text" class="form-control"  value="<?php echo $menu_data['price'];?>" placeholder="Menu Price" name="price">
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Menu Image</label>
                                        <div class="round1 "style="text-align:center;" >
                                            <img src="<?php echo $menu_data['menu_image'];?>" alt="" id="upload-img" style="width: 140px;height: 140px;border-radius: 50%; border: 4px solid #007bff;">
                                            </div>
                                            <div class="custom-file ">
                                            <input name="personal_image" type="file" id="fileupload" style="display: none;"   >
                                            </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 

    <!-- <end add new menu -->

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







