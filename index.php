<?php
$page_title="Home";
$css_file="home.css";
    include_once("includes/header.php");
    include_once("includes/navbar.php");
    include_once("includes/connectDB.php");
    global $con;
?>

<link rel="stylesheet" href="css/home_footer.css">
<!-- ********************************************start top home******************************************************************** -->
    <div class="part1 ">
      <div class="container homesec1">

        <div class="div1">
          <h3 class="header2 pb-3">VINCENT PIZZA.</h3>
          <h5 class="header3 pb-3">MAKING PEOPLE HAPPY</h5>
        </div>
        <p class="pb-3 pt-3">Italian Pizza With Cherry Tomatoes and Green Basil</p>
        <a class="link1" href="chioce_items.php" style=" text-decoration: none;">ORDER NOW</a>
        <a class="link2" href="#" style=" text-decoration: none;">VEIW MENU<i class="fas fa-angle-right pl-2"></i></a>
      </div>
    </div>
<!-- ********************************************top home******************************************************************** -->




<!-- ********************************************start about home********************************************************************-->

  <div class="sec2">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="qualityfood">
            <img src="img/quality_food_img.png" alt="">
            <h3> Quality Foods</h3>
            <p> Sit amet, consectetur adipiscing elit quisque eget maximus velit,
              non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="qualityfood">
            <img src="img/fast_delivery_img.png" alt="">
            <h3> Quality Foods</h3>
            <p> Sit amet, consectetur adipiscing elit quisque eget maximus velit,
              non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="qualityfood">
            <img src="img/original_taste_img.png" alt="">
            <h3> Quality Foods</h3>
            <p> Sit amet, consectetur adipiscing elit quisque eget maximus velit,
              non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
 <!-- ******************************************** about home********************************************************************-->




  <!-- ******************************************** gallry********************************************************************-->

  <section class="image-gallery" id="gallery"  style="background-color:#121618;color:white;padding-top:40px;">
		<div class="container" >
			<h2 style="text-align: center;margin-bottom: 30px">IMAGE GALLERY</h2>
			<?php
				$stmt_image_gallery = $con->prepare("Select * from images");
                $stmt_image_gallery->execute();
                $rows_image_gallery = $stmt_image_gallery->fetchAll();

                echo "<div class = 'row'>";

	                foreach($rows_image_gallery as $row_image_gallery)
	                {
	                	echo "<div class = 'col-md-4 col-lg-3' style = 'padding: 15px;'>";
	                		
	                		?>
	                		<div style = "background-image: url('<?php echo  "admin/".$row_image_gallery['image'] ?>') !important;background-repeat: no-repeat;background-position: 50% 50%;background-size: cover;background-clip: border-box;box-sizing: border-box;overflow: hidden;height: 230px ;">
	                		</div>

	                		<?php
	                	echo "</div>";
	                }

	            echo "</div>";
			?>
		</div>
	</section>
  <!-- ******************************************** gallry********************************************************************-->




<!-- ******************************************** DISCOVER OUR MENUS********************************************************************-->

  <section class="our_menus" id="menus">
		<div class="container">
			<h2 style="text-align: center;margin-bottom: 30px">DISCOVER OUR MENUS</h2>
			<div class="menus_tabs">
				<div class="menus_tabs_picker">
					<ul style="text-align: center;margin-bottom: 70px">
						<?php

	                        $stmt = $con->prepare("Select * from menu_categories");
	                        $stmt->execute();
	                        $rows = $stmt->fetchAll();
	                        $count = $stmt->rowCount();

	                        $x = 0;

	                        foreach($rows as $row)
	                        {
	                        	if($x == 0)
	                        	{
	                        		echo "<li class = 'menu_category_name tab_category_links active_category' onclick=showCategoryMenus(event,'".str_replace(' ', '', $row['category_name'])."')>";
	                        			echo $row['category_name'];
	                        		echo "</li>";

	                        	}
	                        	else
	                        	{
	                        		echo "<li class = 'menu_category_name tab_category_links' onclick=showCategoryMenus(event,'".str_replace(' ', '', $row['category_name'])."')>";
	                        			echo $row['category_name'];
	                        		echo "</li>";
	                        	}

	                        	$x++;
	                     		
	                        }
						?>
					</ul>
				</div>

				<div class="menus_tab">
					<?php
                
                        $stmt = $con->prepare("Select * from menu_categories");
                        $stmt->execute();
                        $rows = $stmt->fetchAll();
                        $count = $stmt->rowCount();

                        $i = 0;

                        foreach($rows as $row) 
                        {

                            if($i == 0)
                            {

                                echo '<div class="menu_item  tab_category_content" id="'.str_replace(' ', '', $row['category_name']).'" style=display:block>';

                                    $stmt_menus = $con->prepare("Select * from menus where category_id = ?");
                                    $stmt_menus->execute(array($row['category_id']));
                                    $rows_menus = $stmt_menus->fetchAll();

                                    if($stmt_menus->rowCount() == 0)
                                    {
                                        echo "<div class= no_menus_div style='margin:auto'>No Available Menus for this category!</div>";
                                    }

                                    echo "<div class='row'>";
	                                    foreach($rows_menus as $menu)
	                                    {
	                                        ?>

	                                            <div class="col-md-4 col-lg-3 menu-column">
	                                                <div class="thumbnail" style="cursor:pointer">
	                                                    

	                                                    <div class="menu-image">
													        <div class="image-preview">
													            <div style="background-image: url('<?php echo"admin/".$menu['menu_image']; ?>');"></div>
													        </div>
													    </div>
														                                                    
	                                                    <div class="caption">
	                                                        <h5>
	                                                            <?php echo $menu['menu_name'];?>
	                                                        </h5>
	                                                        <p>
	                                                            <?php echo $menu['menu_description']; ?>
	                                                        </p>
	                                                        <span class="menu_price">
	                                                        	<?php echo "$".$menu['price']; ?>
	                                                        </span>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                        <?php
	                                    }
	                                echo "</div>";

                                echo '</div>';

                            }

                            else
                            {

                                echo '<div class="menus_categories  tab_category_content" id="'.str_replace(' ', '', $row['category_name']).'">';

                                    $stmt_menus = $con->prepare("Select * from menus where category_id = ?");
                                    $stmt_menus->execute(array($row['category_id']));
                                    $rows_menus = $stmt_menus->fetchAll();

                                    if($stmt_menus->rowCount() == 0)
                                    {
                                        echo "<div class = 'no_menus_div'>No Available Menus for this category!</div>";
                                    }

                                    echo "<div class='row'>";
	                                    foreach($rows_menus as $menu)
	                                    {
	                                        ?>

	                                            <div class="col-md-4 col-lg-3 menu-column">
	                                                <div class="thumbnail" style="cursor:pointer">
	            
	                                                    <div class="menu-image">
													        <div class="image-preview">
													            <div style="background-image: url('<?php echo "admin/".$menu['menu_image']; ?>');"></div>
													        </div>
													    </div>
	                                                    <div class="caption">
	                                                        <h5>
	                                                            <?php echo $menu['menu_name'];?>
	                                                        </h5>
	                                                        <p>
	                                                            <?php echo $menu['menu_description']; ?>
	                                                        </p>
	                                                        <span class="menu_price">
	                                                        	<?php echo "$".$menu['price']; ?>
	                                                        </span>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                        <?php
	                                    }
	                               	echo "</div>";

                                echo '</div>';

                            }

                            $i++;
                            
                        }
                    
                        echo "</div>";
                
                    ?>
				</div>
			</div>
		</div>
	</section>
<!-- ******************************************** DISCOVER OUR MENUS********************************************************************-->




  
<!-- ******************************************** send message********************************************************************-->
      <div class="send_message">
        <div class=" send_message container">
            <div class="row">
                <div class="col-lg-6 sm-padding">
                    <div class="right_part">
                        <h2>
                            Get in touch with us &
                            <br>send us message today!
                        </h2>
                        <p>
                            Saasbiz is a different kind of architecture practice. Founded by LoganCee in 1991, we’re an
                            employee-owned firm pursuing a democratic design process that values everyone’s input.
                        </p>

                        <h2>
                            1580 Boone street ,Corpus Chrisite,TX <br>
                            7890-USA
                        </h2>
                        <p>
                            Email: yara93@gmail.com<br>
                            phone:0215464125
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="left_part" >
                        <div class="form-group colum-row row">
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" placeholder="Name" >
                            </div>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="message" class="form-control message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="link2"  id="send">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ******************************************** send message********************************************************************-->

  


<script>
  function showCategoryMenus(evt, categoryName) 
	{
		var i, tab_category_content, tab_category_links;
		
		tab_category_content = document.getElementsByClassName("tab_category_content");
		
		for (i = 0; i < tab_category_content.length; i++) 
		{
			tab_category_content[i].style.display = "none";
		}
		
		tab_category_links = document.getElementsByClassName("tab_category_links");
		
		for (i = 0; i < tab_category_links.length; i++) 
		{
			tab_category_links[i].className = tab_category_links[i].className.replace(" active_category", "");
		}
		
		document.getElementById(categoryName).style.display = "block";
		evt.currentTarget.className += " active_category";
	}
</script>

<?php
   
    include_once("home_footer.php");
    include_once("includes/footer.php");
?>