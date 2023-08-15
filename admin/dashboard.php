<?php

$page_title="Dashboard";
$css_file="dashboard.css";
    include_once("includes/header.php");    
    require_once("includes/function.php");
     
    $total_clients=count(get_all_data('clients'));
    $total_menus=count(select_menu('menus','menu_categories'));
    $total_tabels=count(get_all_data("tables"));
    $total_orders=count(select_orders("orders"));
    $client_name="sama mohamed";
    $client_id="5";
    $cancelation_reason="too late";
    $selected_menus="pizza";
    $total_price=172;
  
?>

<!-- first div of total clients -->
<link rel="stylesheet" href="css/home.css">
<div class="container-fluid my-5">
    <div class="row cont">

      <div class="col-lg-3 col-md-4 mb-3">
        <div class="div1 pb-5">
        <div class="up row py-3">
            <div class="icon w-25">
            <i style="color: white; font-size: 60px;" class="fa-solid fa-user ml-2"></i>
            </div>
            <div class="txt">
                <h4 class="justify-content-end ml-5"><?php echo $total_clients;?></h4>
                <p>Total Clients</p>
            </div>

        </div>
        <div class="down p-3 view_links">
        <a href="clients.php" class="ms-3" style="text-decoration: none;color: green;font-size: 17px;font-weight: 300;">
            View Details  
        </a>
        <a href="#" style="text-decoration: none; color:green; float:right;">
            <i class="fa-solid fa-circle-arrow-right" style="width: 24px;height: 24px;display: inline-block;line-height: 24px;border-radius: 50%; "></i>
          </a>

        </div>
        </div>
      </div>


      <!-- second div of total menu -->
      <div class="col-lg-3 col-md-4 mb-3 ">
        <div class="div1 pb-5">
        <div class="up row py-3" style="background-color: #B22222;">
            <div class="icon w-25">
            <i style="color: white; font-size: 60px;"class="fa-solid fa-utensils ml-2"></i>
            </div>
            <div class="txt">
                <h4 class="justify-content-end ml-5"><?php echo $total_menus?></h4>
                <p>Total Menus</p>
            </div>

        </div>
        <div class="down p-3 view">
        <a href="menus.php" class="ms-3" style="text-decoration: none;color: #B22222  ;font-size: 17px;font-weight: 300;">
            View Details  
        </a>
        <a href="#" style="text-decoration: none; color: #B22222; float:right;">
            <i class="fa-solid fa-circle-arrow-right" style="width: 24px;height: 24px;display: inline-block;line-height: 24px;border-radius: 50%; "></i>
          </a>

        </div>
        </div>
      </div>



      <!-- third div of total appointments -->
      <div class="col-lg-3 col-md-4 mb-3">
        <div class="div1 pb-5">
        <div class="up row py-3"style="background-color: #4169E1;">
            <div class="icon w-25">
            <i style="color: white; font-size: 60px;" class="fa-solid fa-calendar-days ml-2"></i>
            </div>
            <div class="txt">
                <h4 class="justify-content-end ml-5"><?php echo $total_tabels?></h4>
                <p>Total tabels</p>
            </div>

        </div>
        <div class="down p-3 view">
        <a href="tabels.php" class="ms-3" style="text-decoration: none;color: #4169E1;font-size: 17px;font-weight: 300;">
            View Details  
        </a>
        <a href="#" style="text-decoration: none; color:#4169E1; float:right;">
            <i class="fa-solid fa-circle-arrow-right" style="width: 24px;height: 24px;display: inline-block;line-height: 24px;border-radius: 50%; "></i>
          </a>

        </div>
        </div>
      </div>



      <!-- forth div of total orders -->
      <div class="col-lg-3 col-md-4 mb-3">
        <div class="div1 pb-5">
        <div class="up row py-3"style="background-color: #DAA520;">
            <div class="icon w-25">
            <i style="color: white; font-size: 60px;" class="fa-solid fa-pizza-slice ml-2"></i>
            </div>
            <div class="txt">
                <h4 class="justify-content-end ml-5"><?php echo $total_orders?></h4>
                <p>Total Orders</p>
            </div>

        </div>
        <div class="down p-3 view">
        <a href="orders.php" class="ms-3" style="text-decoration: none;color: yellow;font-size: 17px;font-weight: 300;">
            View Details  
        </a>
        <a href="#" style="text-decoration: none; color:#DAA520; float:right;">
            <i class="fa-solid fa-circle-arrow-right" style="width: 24px;height: 24px;display: inline-block;line-height: 24px;border-radius: 50%; "></i>
          </a>

        </div>
        </div>
      </div>



    </div>
</div>


<!-- recent_orders_table-->
<div class="container-fluid col-lg-12 col-md-9">
<table class="w-100 table" id="table">
  <thead style="background-color:#1E90FF;color:white;">
   <tr class="links">
    <th class="my-5 py-3"><a  id="recent_orders" class="ml-2 py-3" href="#" style="text-decoration: none; color:lightblue;">Recent Orders</a></th>
    <th class="my-5 py-3"><a href="#"  id="copleted_orders" class="ml-2 py-3" style="text-decoration: none; color:lightblue;">Completed Orders</a></th>
    <th class="my-5 py-3" colspan="4"><a href="#" class="ml-2 py-3" id="canceled_orders" style="text-decoration: none; color:lightblue;">Canceled Orders</a></th>
  </tr>
  </thead>
  <thead class="data">
    <tr>
      <th scope="col" >Order Time Created</th>
      <th scope="col" id="menu" >Selected Menus</th>
      <th scope="col" class="r">Total Price</th>
      <th scope="col" >Client</th>
      <th scope="col" class="c">Cancelation Reason</th>
      <th scope="col" class="r">Cancel</th>
    </tr>
  </thead>
  <tbody class="data">
   <tr>
      <td id="x">
        <script>
          $(document).ready(function(){
          setInterval(function(){
   	  		//alert("Hii")
   	  			var date = new Date()
   	  		document.getElementById("x").innerHTML=(date.getHours()+" : "+date.getMinutes()+" : "+date.getSeconds())
   	  	
   	  	},1000)
   	  	
   	  })
        </script>
      </td>
      <td><?php echo $selected_menus?></td>
      <td class="r"><?php echo $total_price?></td>
      <td><?php echo $client_name?></td>
      <td class="c"><?php echo $cancelation_reason?></td>
      <td class="r">
      <button type="button" class="btn btn-danger">Cancel</button>

      </td>
      
    </tr>
    <tr>
      <td id="y">
        <script>
          $(document).ready(function(){
          setInterval(function(){
   	  		//alert("Hii")
   	  			var date = new Date()
   	  		document.getElementById("y").innerHTML=(date.getHours()+" : "+date.getMinutes()+" : "+date.getSeconds())
   	  	
   	  	},1000)
   	  	
   	  })
        </script>
      </td>
      <td><?php echo $selected_menus?></td>
      <td class="r"><?php echo $total_price?></td>
      <td><?php echo $client_name?></td>
      <td class="c"><?php echo $cancelation_reason?></td>
      <td class="r">
      <button type="button" class="btn btn-danger">Cancel</button>

      </td>
      
    </tr>
   
  
  </tbody>

  
</table> 
</div>

<?php
    include_once("includes/footer.php");
?>