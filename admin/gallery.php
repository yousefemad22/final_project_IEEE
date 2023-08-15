<?php
$page_title="Gallery";
$css_file="home.css";
session_start();
    if(isset($_SESSION['name'])){
    include_once("includes/header.php");
    require_once("includes/function.php");
    $images=get_all_data("images");

    global $con;
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        $image_name = filter_var($_POST['image_name'], FILTER_SANITIZE_STRING);


        $personal_image_name = $_FILES["personal_image"]["name"];
        $personal_image_size = $_FILES["personal_image"]["size"];
        $personal_image_tmp_name = $_FILES["personal_image"]["tmp_name"];
        $personal_image_type = $_FILES["personal_image"]["type"];
        $extention_allowed = array("png","jpg","jpeg","webp");  
        
        
       @$personal_image_extention  = strtolower(end(explode(".",$personal_image_name)));
       if(in_array($personal_image_extention,$extention_allowed)){
        $final_personal_image_name = $_POST['image_name'] . "_" . rand(0,1000) . "." . $personal_image_extention;
        $personal_image_destination = "img/img_gallery/" . $final_personal_image_name;

        move_uploaded_file( $personal_image_tmp_name , $personal_image_destination);
        add_img($image_name,$personal_image_destination);


        
        
    }
}


  
?>
     <div class="card m-5">
        <div class="card-header ">
            Images
        </div>
        <div class="card-body">
             <!-- add new image button -->

             <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_images" >
            <i class="fa fa-plus"></i>
                Add Image
            </button>

            <!-- add new images model -->

            <div class="modal" id="add_new_images" tabindex="-1">
                <div class="modal-dialog" >
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New images</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="image_name">Image Name</label>
                                    <input type="text" name="image_name" class="form-control"  placeholder="Image Name"required >   
                                    <label for="image_name">Image Name</label>
                                    <div class="round1 "style="text-align:center;" >
                                    <img src="" alt="" id="upload-img" style="width: 200px;height: 200px;border-radius: 50%; border: 4px solid #007bff;">
                                    </div>
                                    <div class="custom-file ">
                                            <input type="file" id="fileupload" style="display: none;" name="personal_image" >
                                    </div>
                                    
                                </div>
                                
                            </div>
                            


                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="add_new_users">Add Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- MENU CATEGORIES TABLE -->
           

            <table class="table table-bordered categories-table "style="text-align:center;vertical-align: middle;">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Manage</th>
                        
                    </tr>
                </thead>
                <tbody >
                    <?php 
                    foreach($images as $image){ ?>
                        <tr>
                        <td ><?php echo $image['imge_id']?></td>
                        <td><?php echo $image['imge_name']?></td>
                        <td><img style="width: 100px;" src="<?php echo $image['image']?>" alt=""></td>
                        <td>
                            
                            <a class="btn btn-danger" href="delete.php?img_id=<?php echo $image['imge_id']?>" >
                            <i class="fa-solid fa-trash"></i>
                                Delete
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







