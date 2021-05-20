function SubmitFormData() {
    console.log("Script Started");
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    $.post("submit.php", { name: name, email: email, phone: phone, }, function(data) {
        $('#results').html(data);
        //   $('#myForm')[0].reset();
    });
    var x = document.getElementById("otp-div");
    x.style.display = "block";
    var y = document.getElementById("send-otp");
    y.style.display = "none";
    var z = document.getElementById("submit-otp");
    z.style.display = "block";
}

function ValidateOtp() {
    var email = $("#email").val();
    var otp = $("#otp").val();
    console.log(otp);
    console.log(email);
    $.post("submit.php", { otp: otp, email: email }, function(data){
      var check = data;
      console.log(typeof(check));
      console.log(check);
      if(check=="true"){
        window.location.href = "./admin/reservation.php";
      }
      else{
        console.log("error");
        document.getElementById("results").innerHTML = "Invalid OTP!!!";

      }
    });
}

/*
function myFunction() {
	var x = document.getElementById("myDIV");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
  }
  */
 /*,
        function() {
            //$('#results').html(data);
           // window.location("./admin/reservation.php");
            //   $('#myForm')[0].reset();
        }*/