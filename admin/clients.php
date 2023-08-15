<?php
 $page_title="Clients";
 $css_file="home.css";
 session_start();
    if(isset($_SESSION['name'])){
    include_once("includes/header.php");
    require_once("includes/function.php");

    $clients=get_all_data('clients');
    
?>
    <div class="card m-5">
        <div class="card-header ">
            Clients
        </div>
        <div class="card-body">

            <!-- MENU CATEGORIES TABLE -->

            <table class="table table-bordered categories-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"> Name	</th>
                        <th scope="col">Phone </th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Address</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($clients as $client){ ?>
                    <tr>
                    <td><?php echo $client['client_id']?></td>
                    <td><?php echo $client['name']?></td>
                    <td><?php echo $client['phone']?></td>
                    <td><?php echo $client['email']?></td>
                    <td><?php echo $client['address']?></td>
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






