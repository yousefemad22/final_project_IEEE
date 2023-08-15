<script>


$(document).ready(function(){
  //$(".data").hide()


	  $("#recent_orders").click(function(){
	$(".r").show()
		  $(".c").hide()
		  //$("p").show()
		  //$("p").slideToggle(1000)//if show then hide & if hide then show

	  })

  

	  $("#copleted_orders").click(function(){
	$("#menu").html("Menu")
		  $(".c").hide()
	$(".r").hide()
		  //$("p").show()
		  //$("p").slideToggle(1000)//if show then hide & if hide then show

	  })

  $("#canceled_orders").click(function(){
	$(".c").show()
		  $(".r").hide()
		  //$("p").show()
		  //$("p").slideToggle(1000)//if show then hide & if hide then show

	  })

  })

</script> 
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<script src=" https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-3.5.1.min.js"></script>
	<script src="../JS/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	
    </body>
</html>
