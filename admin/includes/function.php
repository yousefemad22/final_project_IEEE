<?php
    require_once("connectDB.php");
    

    function add_user($user_name,$email,$hased_password){
        global $con;
        $stmt = $con->prepare("INSERT INTO users(user_name , email	 , password) VALUE (?,?,?)");
        $stmt->execute(array($user_name, $email, $hased_password));
        echo "
        <script>
            toastr.success('Added successfull')
        </script>";
        @header('Refresh:3;url=dashboard.php');
            
    }



    function get_all_data($table){
        global $con;
        $stmt = $con->prepare("SELECT * FROM $table");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    function add_table($Capacity){
        global $con;
        $stmt = $con->prepare("INSERT INTO tables(capacity) VALUE (?)");
        $stmt->execute(array($Capacity));
        echo "
        <script>
            toastr.success('Added successfull')
        </script>";
        @header('Refresh:3;url=dashboard.php');

    }

    function select_orders($table){
        global $con;
        $stmt = $con->prepare("SELECT orders.order_id, clients.name, orders.Order_time ,clients.address
        FROM orders INNER JOIN clients ON orders.client_id=clients.client_id;");
        $stmt->execute();
        $orders=$stmt->fetchAll();
        return $orders;
    }

    function add_category($category_name){
        global $con;
        $stmt = $con->prepare("INSERT INTO menu_categories(category_name) VALUE (?)");
        $stmt->execute(array($category_name));
        echo "
        <script>
            toastr.success('Added successfull')
        </script>";
        @header('Refresh:3;url=dashboard.php');

    }


    function add_new_menu($menu_name,$menu_description,$price,$personal_image_destination,$menu_category){
        global $con;
        $stmt = $con->prepare('INSERT INTO menus(menu_name,menu_description,price,menu_image,category_id) VALUE( ?,?,?,?,?)');
        $stmt->execute(array($menu_name,$menu_description,$price,$personal_image_destination,$menu_category));

        echo "
        <script>
            toastr.success('Added successfull')
        </script>";
    }


    
    function select_menu($table1,$table2){
        global $con;
        $stmt = $con->prepare("SELECT *, menu_categories.category_name 
        FROM $table1 INNER JOIN $table2 ON menus.category_id =menu_categories.category_id;");
        $stmt->execute();
        $menus = $stmt->fetchAll();
        return $menus;
    }

    function login($email,$password){
        global $con;
        $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute(array($email));
        $user_data = $stmt->fetch();
        $row_count = $stmt->rowCount();
        if($row_count > 0){
            
            if(password_verify($password,$user_data['password'])){
                @session_start();
                $_SESSION['id']    = $user_data['user_id'];
                $_SESSION['name']  = $user_data['user_name'];
                $_SESSION['email']  = $user_data['email'];
                echo "
                <script>
                    toastr.success('login successful')
                </script>";
                header("Refresh:1;url=dashboard.php");
            }else{
                echo "
                <script>
                    toastr.error('uncorrect password')
                </script>";
            }
        }else{
            echo "
            <script>
                toastr.error('uncorrect Email')
            </script>";
    
          
         }
     }
    

    function add_img($image_name,$personal_image_destination){
        global $con;
        $stmt = $con->prepare('INSERT INTO images(imge_name, image) VALUE(?,?)');
        $stmt->execute(array($image_name,$personal_image_destination));

        echo "
        <script>
            toastr.success('Added successfull')
        </script>";

    }


?>