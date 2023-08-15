<?php
$page_title="Reserve table";
$css_file="home.css";
    include_once("includes/header.php");
    include_once("includes/navbar.php");
    include_once("includes/connectDB.php");
    global $con;
?>

<!-- <link rel="stylesheet" href="css/reservation.css"> -->

<link rel="stylesheet" href="css/home_footer.css">




<link rel="stylesheet" href="css/order_page.css">


<form id="regForm" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

 <div class=" ">
        <div class="all_menu tab " id="menu">

        <div class="alert alert-danger" role="alert" style="display: none">
					Please, select at least one item!
		    </div>

        <div class="">
            <span>
                1. Select Date & Time
            </span>
        </div>
           <div class="">
              <div class = ''>      
                <div class=" d-flex flex-row">
                        <div class="form-group m-5">
                            <label for="date">Date</label>
                            <input type="date" value="" class="form-control" name="date">
                        </div>
                        <div class="form-group  m-5">
                            <label for="time">Time</label>
                            <input type="time" value="" class="form-control" name="time">
                        </div>
                        <div class="form-group m-5" >
                            <label for="num_persons">How many person ?</label>
                            <input type="" value="" class="form-control" name="number">
                        </div>
                </div>           
              </div>
 
          </div>
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
