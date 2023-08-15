<?php
    $page_title="Invoice";
    $css_file="invoice.css";
    include_once("includes/header.php");
    include_once("includes/connectDB.php");

    global $con;
    // $stmt = $con->prepare("SELECT *
    // FROM invoice INNER JOIN orders ON invoice.order_id=orders.order_id
       // INNER JOIN menus ON invoice.menu_id=menu.menu.i_d;");
    
      //  $stmtgetCurrentOrderID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'restaurant' AND TABLE_NAME = 'invoice'");
      //  $stmtgetCurrentOrderID->execute();
      //  $invoice_id = $stmtgetCurrentOrderID->fetch();
      //  print_r ($invoice_id);

    
    
    // $stmt = $con->prepare("SELECT orders.*,clients.*
    // FROM orders 
    //         INNER JOIN clients ON orders.client_id=clients.client_id ;
            
    //         ");
    // $stmt->execute();
    // $orders=$stmt->fetchAll();


    
    

    $stmt = $con->prepare("SELECT orders.*,clients.*,menus.*
    FROM bill
    INNER JOIN menus ON bill.menu_id=menus.menu_id 
    INNER JOIN invoice ON bill.inovice_id=invoice.id 
    INNER JOIN clients ON invoice.client_id=clients.client_id 
    INNER JOIN orders ON invoice.order_id=orders.order_id ;
    ");
    $stmt->execute();
    $orders=$stmt->fetchAll();
    print_r($orders);
    print("******************************");
    ////////////////////////////////////////////////////////////////
    // $stmt = $con->prepare("SELECT menus.menu_name , menus.menu_description,menus.price  FROM bill 
    //         INNER JOIN menus ON bill.menu_id=menus.menu_id
    //         INNER JOIN invoice ON bill.inovice_id=invoice.id
    //          ;
            
    //         ");
    // $stmt->execute();
    // // print_r($orders);
    // $menus=$stmt->fetchAll();
    // $menuss=$menus[0];
    // print("******************************");
    // print_r($menus);



?>

  <div class="invoice ">
    <div class="invoice_left">
      <div class="logo">
        <h3>CONTACT</h3>
      </div>
      <div class="to">
        <div class="main_title">
          <p>Invoice To</p>
        </div>
        <div class="p_title">
          <p> <?php echo $orders[0]["name"]?></p>
        </div>
        <div class="p_title">
          <p> <?php echo $orders[0]["address"]?></p>
        </div>
        <div class="p_title">
          <p><?php echo $orders[0]["phone"]?></p>
        </div>
      </div>
      <div class=" details">
        <div class="main_title">
          <p>Invoice details</p>
        </div>
        <div class="p_title">
          <p>Invoice No:</p>
          <span><?php echo $orders[0]["order_id"]?></span>
        </div>
        <div class="p_title">
          <p>Invoice Date:</p>
          <span><?php echo $orders[0]["order_time"]?></span>
        </div>
      </div>


    </div>
    <div class="invoice_right">
      <div class="title">
        <h3>INVOICE</h3>
      </div>

      <div class="table">
        <div class="table_head">
          <div class=" row">
            <div class=" col w_55">
              <p class="p_title">Descrition</p>
            </div>
            <div class=" col w_15 text_center">
              <p class="p_title">Menu Name</p>
            </div>
            <div class=" col w_15 text_center">
              <p class="p_title">PRICE</p>
            </div>
            <div class=" col w_15 text_right">
              <p class="p_title">TOTAL</p>
            </div>
          </div>
        </div>

        
        <div class=" table_body">
          <?php
            // foreach($orders as $order){?>
            <div class=" row">
              <div class=" col w_55">
                <span><?php echo $orders[0]['menu_description']?></span>
              </div>
              <div class=" col w_15 text_center">
                <p><?php echo $orders[0]['menu_description']?></p>
              </div>
              <div class=" col w_15 text_center">
                <p><?php echo $orders[0]['price']?></p>
              </div>
              <div class=" col w_15 text_right">
                <p><?php echo $orders[0]['price']?></p>
              </div>
          
            <?php 
            // } 
            ?>
          </div>
          <hr>
          
          
        <div class=" table_foot">
          <div class=" row">
            <div class=" col w_50">
              <p>Sub Total</p>
              <p>Tax 10%</p>
            </div>
            <div class=" col w_50 text_right">
              <p>$580.00</p>

              <p>$15.00</p>
            </div>
          </div>
          <hr>
          <div class=" row grand_total_wrap">
            <div class=" col w_50">
              <h2>GRAND TOTAL:</h2>
            </div>
            <div class=" col w_50 text_right">
              <h2>$745.00</h2>
              
            </div>
          </div>
        </div>
      </div>
      
    <h3>THANKS FOR YOUR ORDER</h3>
    </div>

  </div>
<?php
include_once("includes/footer.php");
?>