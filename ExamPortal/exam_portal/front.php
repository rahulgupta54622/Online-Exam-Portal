<!DOCTYPE html>
<html>
<head>
	<title>EXAM PORTAL</title>

	<script type="text/javascript">
		function resetForm()
		{
			document.getElementById("signupForm").reset();
			document.getElementById("LoginForm").reset();
		}
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body onload="resetForm()">

	

	<header >QUIZ PORTAL</header>
	<div class="signup-form-popup" id="signUpForm">
		<br>
		
		<form action="insert.php" method="POST" class="form-container-personal" name="signupForm" id = "signupForm" onsubmit="return validateForm()">
			<div class="x">
			    <h2 align="center" style="color: #191970;">PERSONAL DETAILS</h2>

			    <h3 style="color: #800000; font-size: 15px "><b>Name</b></h3>
			    <input type="text" placeholder="Enter Name" name="name" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>DOB</b></h3>
			    <input type="date" placeholder="Enter DOB" name="dob" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px;"><b>Email</b></h3>
			    <input type="email" placeholder="Enter Email" name="email" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>Mobile</b></h3>
			    <input type="tel" placeholder="Enter mobile no" name="mobile_no" maxlength="10" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>Password</b></h3>
			    <input type="password" placeholder="Enter Password" name="psw1" id="psw1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>Password</b></h3>
			    <input type="password" placeholder="Confirm Password" name="psw2" required>
			    <br>
			    <br>
			</div> 
		    <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->

			<div class="x">
				<br>
			    <h2 align="center" style="color: #191970;">ACEDEMIC DETAILS</h2>

			    <h3 style="color: #800000; font-size: 15px "><b>Roll Number</b></h3>
			    <input type="text" placeholder="Roll Number" name="roll" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>Branch</b></h3>
			    <input type="text" placeholder="Branch" name="branch" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px;"><b>SGPA</b></h3>
			    <input type="text" placeholder="SGPA" name="sgpa" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>CGPA</b></h3>
			    <input type="text" placeholder="CGPA" name="cgpa" required>
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>10th Marks</b></h3>
			    <input type="text" placeholder="10th marks" name="tenth">
			    <br>
			    <br>
			    <h3 style="color: #800000; font-size: 15px"><b>12th Marks</b></h3>
			    <input type="text" placeholder="12th marks" name="twelth">
			    <br>
			    <br>
			    
			    <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
			</div>
			<button type="submit" class="submit">Sign Up</button>
		</form>
	</div>

	<div class="login-form-popup" id="loginForm">
		<form action="validate.php" method="POST" class="form-container" name="loginForm">
<!-- 		    <h1>Login</h1>
 -->
		    <label for="email"><h3 style="color: #800000; font-size: 20px;"><b>Email</b></h3></label>
		    <input type="email" placeholder="Enter Email" name="email" required>
		    <br>
		    <br>
		    <label for="psw"><h3 style="color: #800000; font-size: 20px"><b>Password</b></h3></label>
		    <input type="password" placeholder="Enter Password" name="psw"  required>
		    <br>
		    <br>
		    <button type="submit" class="submit" onclick="loginMe()">Login</button>
		    <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
		</form>
	</div>
<div class="options" id="options">
		<button id="login_btn" onclick="loginPopup()">LOGIN</button>
		<br>
		<br>
		<br>
		<br>
		<button id="signup_btn" onclick="signupPopup()">SIGN UP</button>
</div>
	

<div class="message" id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>


<script type="text/javascript">
	var x = 0;


	/////password validation
	var myInput = document.getElementById("psw1");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");
	myInput.onfocus = function() 
	{
 		 document.getElementById("message").style.display = "block";
	}

	myInput.onblur = function() {
  		document.getElementById("message").style.display = "none";
	}

	myInput.onkeyup = function() 
	{
			  // Validate lowercase letters
			  var lowerCaseLetters = /[a-z]/g;
			  if(myInput.value.match(lowerCaseLetters)) {  
			    letter.classList.remove("invalid");
			    letter.classList.add("valid");
			  } else {
			    letter.classList.remove("valid");
			    letter.classList.add("invalid");
			  }
			  
			  // Validate capital letters
			  var upperCaseLetters = /[A-Z]/g;
			  if(myInput.value.match(upperCaseLetters)) {  
			    capital.classList.remove("invalid");
			    capital.classList.add("valid");
			  } else {
			    capital.classList.remove("valid");
			    capital.classList.add("invalid");
			  }

			  // Validate numbers
			  var numbers = /[0-9]/g;
			  if(myInput.value.match(numbers)) {  
			    number.classList.remove("invalid");
			    number.classList.add("valid");
			  } else {
			    number.classList.remove("valid");
			    number.classList.add("invalid");
			  }
			  
			  // Validate length
			  if(myInput.value.length >= 8) {
			    length.classList.remove("invalid");
			    length.classList.add("valid");
			  } else {
			    length.classList.remove("valid");
			    length.classList.add("invalid");
			  }
	}



	function loginPopup()
	{
		if(x==0)
		{
			document.getElementById("loginForm").style.display = "block";
			// document.getElementById("login_btn").style.display = "none";
			document.getElementById("signup_btn").style.display = "none";
			document.getElementById("options").style.left = "350px";
			x=1;
		}
		else
		{
			document.getElementById("options").style.left = "690px";
			document.getElementById("options").style.top = "315px";
			document.getElementById("loginForm").style.display = "none";
			document.getElementById("login_btn").style.display = "block";
			document.getElementById("signup_btn").style.display = "block";
			x=0;
		}
	}

	var y=0;
	function signupPopup()
	{
		if(y==0)
		{
			document.getElementById("signUpForm").style.display = "block";
			document.getElementById("login_btn").style.display = "none";
			document.getElementById("options").style.left = "250px";
			y=1;
		}
		else
		{
			document.getElementById("options").style.left = "690px";
			document.getElementById("options").style.top = "315px";
			document.getElementById("signUpForm").style.display = "none";
			document.getElementById("login_btn").style.display = "block";
			document.getElementById("signup_btn").style.display = "block";
			y=0;
		}
	}

	function validateForm()
	{
		var pswd1=document.forms["signupForm"]["psw1"].value;
		var pswd2=document.forms["signupForm"]["psw2"].value; 
		var cgpa =Number(document.forms["signupForm"]["cgpa"].value);
		var sgpa =Number(document.forms["signupForm"]["sgpa"].value);
		var tenth =Number(document.forms["signupForm"]["tenth"].value);
		var twelth=Number(document.forms["signupForm"]["twelth"].value);

		var str_pswd_error="";
		var str_cgpa_error="";
		var str_sgpa_error="";
		var str_ten_error="";
		var str_twelve_error="";
		var str_finalerror__message="";
		if(pswd1.toString() != pswd2.toString())
			 str_finalerror__message =  str_finalerror__message + "Passwords are not same";
		if(isNaN(cgpa) || cgpa < 0 || cgpa > 10)
			 str_finalerror__message =  str_finalerror__message + "\n" + "Not a valid CGPA";
		if(isNaN(sgpa) || sgpa < 0 || sgpa > 10)
			 str_finalerror__message =  str_finalerror__message + "\n" + "Not a valid SGPA";
		if( isNaN(tenth) || tenth< 0 || tenth > 100)
			 str_finalerror__message =  str_finalerror__message + "\n" + "Not a valid 10th percentage";
		if(isNaN(twelth) || twelth < 0 || twelth > 100)
			 str_finalerror__message =  str_finalerror__message + "\n" + "Not a valid 12th percentage";

		if(  str_finalerror__message != "")
			{alert( str_finalerror__message);
			return false;}

		alert("Submited successfully");
		

	}
		
	

	// function loginMe() {
	// 	// body...
	// 	document.forms["loginForm"][""]
	// }
</script>

</body>
</html>