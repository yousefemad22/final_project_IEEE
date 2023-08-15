<?php
$page_title="Reserve table";
$css_file="home.css";
    include_once("includes/header.php");
    include_once("includes/navbar.php");
    include_once("includes/connectDB.php");
    global $con;
?>

<link rel="stylesheet" href="css/style.css"> 
<link rel="stylesheet" href="css/home_footer.css"> 
<link rel="stylesheet" href="css/order_page.css">

<body>

  <!-- ------------- start section 2 in the frist page (home page )---------->
 
  <div class="above">
    <div class="fisrt">
      <img src="img/food_pic.jpg" alt=""class="w-100 reserve_img">
    </div>
    <div class="second">

    </div>
    <div class="third">
      <h1 style=" font-size: 120px; 
      color: white;
      font-family: 'Kristi', cursive;" >Book a Table</h1>
    </div>
  </div>


  <div class="container my-5 px-5">
        <form class="row g-3">
        <h3 class="col-lg-12 mb-4"> 1. Select Date & Time</h3>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="reservation_date">Date</label>
                            <input type="date" value="<?php echo (isset($_POST['reservation_date']))?$_POST['reservation_date']:date('Y-m-d',strtotime("+1day"));  ?>" class="form-control" name="reservation_date">
                        </div>
                    </div>
            <div class="col-auto mb-4">
              <label for="inputtime" class="visually-hidden">Time</label>
              <input type="time" class="form-control" id="inputtime" placeholder="Time">
            </div>
            <div class="dropdown col-auto colmn mt-1">
            <label for="inputtime" class="visually-hidden">How Many People?</label>
            <br>
                <button class="btn  dropdown-toggle drop" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  choose 
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">one person</a></li>
                  <li><a class="dropdown-item" href="#">two people</a></li>
                  <li><a class="dropdown-item" href="#">three people</a></li>
                  <li><a class="dropdown-item" href="#">four people</a></li>
                  <li><a class="dropdown-item" href="#">five people</a></li>
                  <li><a class="dropdown-item" href="#">six people</a></li>
                </ul>
              </div>
            <div class="col-auto my-4">
            <button type="button" class="btn btn-success px-4 py-2" id="nextButton" class="next">Next</button>
            </div>
          </form>
          



  </div>


  <div class="container my-5 px-5" id="details">
        <form class="row g-3">
        <h3 class="col-lg-12 mb-4"> 2. Client Details</h3>
            <div class="col-lg-12 mb-4">
              <input class="form-control col-lg-12" type="text" placeholder="Full-Name" aria-label="default input example">
            </div>
            <div class="col-lg-6 mb-4">
              <input type="email" class="form-control col-lg-12" id="inputtime" placeholder="Email">

            </div>
            <div class="col-lg-6 mb-4">
              <input type="text" class="form-control col-lg-12" id="inputtime" placeholder="Phone-Number">
            </div>
            <div class="col-lg-12 mb-4">
            <!-- <button type="button" class="btn btn-secondary px-4 py-2" id="reserve" class="previous">previous </button> -->
             <button type="button" class="btn btn-warning px-4 py-2" id="reserve">Reserve Now</button>
            </div>
            
          </form>
  </div>


  <script>

            $(document).ready(function(){
          $("#details").hide();
          
          $("#nextButton").click(function(){
              $("#details").slideDown(2000);
          });
          });
          function TDate() {
      var UserDate = document.getElementById("userdate").value;
      var ToDate = new Date();

      if (new Date(UserDate).getTime() <= ToDate.getTime()) {
            alert("The Date must be Bigger or Equal to today date");
            return false;
      }
      return true;
    }
    function TTime() {
      var UserTime = document.getElementById("time").value;
      var x=parseInt(UserTime);

      if (x<=9||x>=22) {
            alert("Time Must be between 9 am to 10pm");
            return false;
      }
      return true;
    }


    </script>

  

</body>
<?php
   
   include_once("home_footer.php");
   include_once("includes/footer.php");
?>
