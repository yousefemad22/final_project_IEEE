<?php
    $page_title="Order Now";
    $css_file="home.css";
    
    include_once("includes/header.php");
    include_once("includes/navbar.php");
    include_once("includes/connectDB.php");
    
        global $con;
        
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST")
    {
      
        // Selected Menus

        $numbers = $_POST["quant"];
        $selected_menus = $_POST['selected_menus'];
        
        // Selected quantatiy

        

       

        //Client Details


            $client_full_name = filter_var($_POST['client_full_name'], FILTER_SANITIZE_STRING);
            $delivery_address = filter_var($_POST['client_delivery_address'], FILTER_SANITIZE_STRING);
            $client_phone_number = filter_var($_POST['client_phone_number'], FILTER_SANITIZE_STRING);
            $client_email = filter_var($_POST['client_email'], FILTER_SANITIZE_STRING);
        

            
            
                $stmtgetCurrentClientID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'restaurant' AND TABLE_NAME = 'clients'");
                $stmtgetCurrentClientID->execute();
                $client_id = $stmtgetCurrentClientID->fetch();


                $stmtClient = $con->prepare("INSERT INTO clients (name,phone,email,address) VALUE (?,?,?,?)");
                $stmtClient->execute(array($client_full_name,$client_phone_number,$client_email,$delivery_address));



                $stmtgetCurrentOrderID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'restaurant' AND TABLE_NAME = 'orders'");
                $stmtgetCurrentOrderID->execute();
                $order_id = $stmtgetCurrentOrderID->fetch();


                $stmtgetCurrentInvoiceID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'restaurant' AND TABLE_NAME = 'invoice'");
                $stmtgetCurrentInvoiceID->execute();
                $invoice_id = $stmtgetCurrentInvoiceID->fetch();
                
                $stmt_order = $con->prepare("INSERT INTO orders(order_time, client_id,delivery_address) VALUE(?, ?,?)");
                $stmt_order->execute(array(Date("Y-m-d H:i"),$client_id[0],$delivery_address));


                    
                    $stmt = $con->prepare("INSERT INTO invoice(order_id,client_id) VALUE( ?,?)");
                    $stmt->execute(array($order_id[0],$client_id[0]));
                

                foreach($selected_menus as $menu )
                {
                    $stmt = $con->prepare("INSERT INTO bill(inovice_id,menu_id,quantatiy) VALUE(?,?,?)");
                    $stmt->execute(array($invoice_id[0],$menu, $numbers));
                }
            
                echo "<div class = 'alert alert-success container ' style='margin-top:150px; '>";
                    echo "Great! Your order has been created successfully.";
                echo "</div>";
            // header("refresh: 3; url = index.php");
     }
        else
        {
            
        }
    



?>
<link rel="stylesheet" href="css/home_footer.css">
<link rel="stylesheet" href="css/order_page.css">
<form id="regForm" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <!-- One "tab" for each step in the form: -->
    
 <div class="container w-75">
        <div class="all_menu tab " id="menu">

        <div class="alert alert-danger" role="alert" style="display: none">
					Please, select at least one item!
		</div>

        <div class="category_name">
            <span>
                1. Choice of Items
            </span>
        </div>

        <?php
            $stmt = $con->prepare("Select * from menu_categories");
            $stmt->execute();
            $categories = $stmt->fetchAll();


            foreach($categories as $category)
            {
                ?>
                    <div class="category_name">
                        <span>
                            <?php echo $category['category_name']; ?>
                        </span>
                    </div>
                    <div class="menus">
                        <?php
                            $stmt = $con->prepare("Select * from menus where category_id = ?");
                            $stmt->execute(array($category['category_id']));
                            $menus = $stmt->fetchAll();

                            foreach($menus as $menu)
                            {?>
                    
                                <div class='box'>
                                    <div class = 'row'>
                                        <div>
                                            <?php echo $menu['menu_name']?>
                                        </div>
                                        <div class = 'price'>
                                            <div class = >
                                                <span style = 'font-weight: bold;'>
                                                    <?php echo $menu['price']."$";?>
                                                </span>
                                            </div>
                                            <div class ="quantatiy">
                                                 <input type="number" name="quant" value="1" min="1"  step="1"> 
                                                                      
                                            </div>
                                            <div class="select_button">
                                                <div class="btn-group-toggle" data-toggle="buttons">
                                                        <label class=" label btn btn-outline-dark">
                                                        <input type="checkbox"  name="selected_menus[]" value="<?php echo $menu['menu_id'] ?>">Select
                                                        </label>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                <?php
            }
        ?>

        </div>				
        <div class="tab  client_details "id="clients">
            <h5 >2.client details</h5>
            <div class="form-group colum-row row">
                <div class="col-sm-12">
                    <input type="text" name="client_full_name" id="client_full_name" class="form-control"
                        placeholder="Full name" required>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 pt-3 pb-3">
                    <input type="email" name="client_email" id="client_email" class="form-control" placeholder="E-mail">

                </div>
                <div class="col-sm-6 pt-3 pb-3">
                    <input type="text" name="client_phone_number" id="client_phone_number" class="form-control"
                        placeholder="Phone number">

                </div>
            </div>
            <div class="form-group colum-row row pt-3 pb-3">
                <div class="col-sm-12">
                    <input type="text" name="client_delivery_address" id="client_delivery_address" class="form-control"
                        placeholder="Delivery Address">

                </div>
            </div>
        </div>
        <div style="text-align:end;">
                <button type="button" class="btn btn-secondary"id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
        <div style="text-align:center;">
            <span class="step"></span>
            <span class="step"></span>
        </div>
 </div>

</form>


  <?php
    include_once("home_footer.php");
    include_once("includes/footer.php");

?>