<?php
    session_start();
   if(isset($_SESSION['name'])){
    $page_title="Orders";
    $css_file="home.css";
    include_once("includes/header.php");
    require_once("includes/function.php");
    $orders=  select_orders("orders");
    ?>
  

    <div class="card m-5">
        <div class="card-header ">
            Orders 
        </div>
        <div class="card-body">
            <table class="table table-bordered categories-table" style="text-center">
                <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Time</th>
                        <th scope="col">Delivery Address</th>

                        </tr>
                </thead>
                    <tbody>
                    <?php foreach($orders as $order){ ?>
                        <tr>
                        <td><?php echo $order['order_id']?></td>
                        <td><?php echo $order['name']?></td>
                        <td><?php echo $order['Order_time']?></td>
                        <td><?php echo $order['address']?></td>
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







