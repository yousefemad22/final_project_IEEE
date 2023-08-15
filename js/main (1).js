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

/********************************************************************************************** choice_item **************************************************************/
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function validateForm()
        {
            var x, id_tab, valid = true;
            x = document.getElementsByClassName("tab");
            id_tab = x[currentTab].id;

            if(id_tab == "menu")
            {
                if(x[currentTab].querySelectorAll('input[type="checkbox"]:checked').length == 0)
                {
                    x[currentTab].getElementsByClassName("alert")[0].style.display = "block";
                    valid = false;
                }
                else
                {
                    x[currentTab].getElementsByClassName("alert")[0].style.display = "none";
                }
            }
            if(id_tab == "clients")
            {
                y = x[currentTab].getElementsByTagName("input");
                z = x[currentTab].getElementsByClassName("invalid-feedback");

                for (var i = 0; i < y.length; i++) 
                {
                    if(y[i].value == "")
                    {
                      y[i].className += " invalid";   
                      valid = false;
                    }
                   
                }
            }

            if (valid) 
            {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }

            return valid;
        }

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
/********************************************************************************************** choice_item **************************************************************/



// var m=document.getElementsByClassName(".round")
// var y=document.createElement("img");
// var l=y.setAttribute("src",$('#myfile').val());
// m.appendchild(l);

// // ----------------------------------------
// var currentTab = 0; // Current tab is set to be the first tab (0)
// showTab(currentTab); // Display the current tab

// function showTab(n) {
//   // This function will display the specified tab of the form ...
//   var x = document.getElementsByClassName("tab");
//   x[n].style.display = "block";
//   // ... and fix the Previous/Next buttons:
//   if (n == 0) {
//     document.getElementById("prevBtn").style.display = "none";
//   } else {
//     document.getElementById("prevBtn").style.display = "inline";
//   }
//   if (n == (x.length - 1)) {
//     document.getElementById("nextBtn").innerHTML = "Submit";
//   } else {
//     document.getElementById("nextBtn").innerHTML = "Next";
//   }
//   // ... and run a function that displays the correct step indicator:
//   fixStepIndicator(n)
// }

// function nextPrev(n) {
//   // This function will figure out which tab to display
//   var x = document.getElementsByClassName("tab");
//   // Exit the function if any field in the current tab is invalid:
//   if (n == 1 && !validateForm()) return false;
//   // Hide the current tab:
//   x[currentTab].style.display = "none";
//   // Increase or decrease the current tab by 1:
//   currentTab = currentTab + n;
//   // if you have reached the end of the form... :
//   if (currentTab >= x.length) {
//     //...the form gets submitted:
//     document.getElementById("regForm").submit();
//     return false;
//   }
//   // Otherwise, display the correct tab:
//   showTab(currentTab);
// }

// function validateForm() {
//   // This function deals with validation of the form fields
//   var x, y, i, valid = true;
//   x = document.getElementsByClassName("tab");
//   y = x[currentTab].getElementsByTagName("input");
//   // A loop that checks every input field in the current tab:
//   for (i = 0; i < y.length; i++) {
//     // If a field is empty...
//     if (y[i].value == "") {
//       // add an "invalid" class to the field:
//       y[i].className += " invalid";
//       // and set the current valid status to false:
//       valid = false;
//     }
//   }
//   // If the valid status is true, mark the step as finished and valid:
//   if (valid) {
//     document.getElementsByClassName("step")[currentTab].className += " finish";
//   }
//   return valid; // return the valid status
// }

// function fixStepIndicator(n) {
//   // This function removes the "active" class of all steps...
//   var i, x = document.getElementsByClassName("step");
//   for (i = 0; i < x.length; i++) {
//     x[i].className = x[i].className.replace(" active", "");
//   }
//   //... and adds the "active" class to the current step:
//   x[n].className += " active";
// }
