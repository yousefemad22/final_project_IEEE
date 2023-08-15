$(document).ready(function () {
  $(".homesec1").hide();
  $(".homesec1").show(2000);
 
  $(".box2").hide();
  $(".show1").show();
  $(".btn1").css({
    color: "#ffc107",
  });

  $(".btn1").click(function () {
    $(".link4").css({
      color: "white",
    });

    $(".btn1").css({
      color: "#ffc107",
    });

    $(".box2").hide();
    $(".show1").show();
   
  });
  $(".btn2").click(function () {
    $(".link4").css({
      color: "white",
    });
    $(".btn2").css({
      color: "#ffc107",
    });

    $(".box2").hide();
    $(".show2").show();
  });
  $(".btn3").click(function () {
    $(".link4").css({
      color: "white",
    });
    $(".btn3").css({
      color: "#ffc107",
    });

    $(".box2").hide();
    $(".show3").show();
  });
  $(".btn4").click(function () {
    $(".link4").css({
      color: "white",
    });
    $(".btn4").css({
      color: "#ffc107",
    });

    $(".box2").hide();
    $(".show4").show();
  });
  $(".btn5").click(function () {
    $(".link4").css({
      color: "white",
    });
    $(".btn5").css({
      color: "#ffc107",
    });

    $(".box2").hide();
    $(".show5").show();
  });
  $(".btn6").click(function () {
    $(".link4").css({
      color: "white",
    });
    $(".btn6").css({
      color: "#ffc107",
    });

    $(".box2").hide();
    $(".show6").show();
  });
});

$('.round1').click(function(){
  $('#fileupload').click()
});
$(function(){
  $("#fileupload").change(function(event){
    var x=URL.createObjectURL(event.target.files[0]);
    $("#upload-img").attr("src",x);
    console.log(event)

  })
})
