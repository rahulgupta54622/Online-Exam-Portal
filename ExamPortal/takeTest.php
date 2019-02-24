<?php

  session_start();

  if(!isset($_SESSION["username"])){

        header("Location: /ExamPortal/exam_portal/front.php");
    }

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "login_details";

    $conn = mysqli_connect($host, $dbUsername, "", $dbName);

    $query = "SELECT time FROM description";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $SESSION['test_duration'] = $row['time'];

?>


<!DOCTYPE html>
<html>
<head>
  <title>Test</title>

  <script type="text/javascript">
  var total_q = 0;
  var q_no = 0;
  var selectedOPtionArray = [];

  var duration = <?php echo $SESSION['test_duration'] ?>

  function showNextQuestion(obj,choice) {


   if(q_no == 0) setTestDuration(duration);
  
    if (obj == "") {
        document.getElementById("question_view").innerHTML = "Sorry question could not be loaded";
        return;
    } else { 

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();  

             } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }     
        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              console.warn(xmlhttp.responseText);

              try{
                var myObj = JSON.parse(xmlhttp.responseText);
              }
              catch(e){
              alert(e);
            }
                total_q = myObj.total_questions;
               document.getElementById("current_q_no").innerHTML = "Question number: " + q_no + " of " + myObj.total_questions;
               
               document.getElementById("question_statement").innerHTML = myObj.question_statement;
               document.getElementById("a").nextSibling.innerHTML = myObj.option_a;
               document.getElementById("b").nextSibling.innerHTML = myObj.option_b;
               document.getElementById("c").nextSibling.innerHTML = myObj.option_c;
               document.getElementById("d").nextSibling.innerHTML = myObj.option_d;

              //document.getElementById("question_view").innerHTML = xmlhttp.responseText;
            }
        };

        if(choice == 1){
            q_no++;
            if (q_no > total_q) {q_no = 1;}

            if(selectedOPtionArray[q_no - 1] == null){
                document.getElementById("a").checked = false; 
                document.getElementById("b").checked = false; 
                document.getElementById("c").checked = false; 
                document.getElementById("d").checked = false; 
                //alert(selectedOPtionArray[q_no - 1]);
              }

              else if(q_no > 0){
                 document.getElementById(selectedOPtionArray[q_no - 1]).checked = true;
             }
        }

        if(choice == -1){
           q_no--;

           if(q_no <= 0){q_no = total_q;}


           if(selectedOPtionArray[q_no - 1] == null){
                document.getElementsByName("option").checked = false; 
                //alert(selectedOPtionArray[q_no - 1]);
              }

              else if(q_no > 0){
                 document.getElementById(selectedOPtionArray[q_no - 1]).checked = true;
             }
        }

        console.warn(q_no);
       
        xmlhttp.open("GET","server.php?q="+q_no);
        xmlhttp.send(null);
        
    }
  }

    
    function saveSelectedOption(id){

       if(q_no <= 0) return;
        if( selectedOPtionArray[q_no-1] != null){

             if(id == selectedOPtionArray[q_no-1]){
                 document.getElementById(id).checked = false;
                  selectedOPtionArray[q_no-1] = null;
                  window.localStorage.setItem("selectedOPtionArrayStorage",JSON.stringify(selectedOPtionArray));
                  return;
             }
               
             document.getElementById(id).checked = true;
             selectedOPtionArray[q_no-1] = id;

             window.localStorage.setItem("selectedOPtionArrayStorage",JSON.stringify(selectedOPtionArray));
             return;
        }

        if(document.getElementById(id).checked == true){
          selectedOPtionArray[q_no-1] = id;
        }
        
        if(document.getElementById(id).checked == false){
          selectedOPtionArray[q_no-1] = null;
        }

        window.localStorage.setItem("selectedOPtionArrayStorage",JSON.stringify(selectedOPtionArray));
    }

    function callSubmitTest(){
      
      window.localStorage.setItem("selectedOPtionArrayStorage",JSON.stringify(selectedOPtionArray));

      setCookie("testDuration",-1,1);

      window.open("result_ui.php", '_self');
    }


 </script>


  <style type="text/css">
  	
  	header{

  		height: 40px;
  		background-color: #999;
  		box-shadow: 0 4px 8px 0 rgba(0 , 0 ,0, 0.8);
		transition: 0.1s;
		padding: 20px;

  	}

  	.question_selector{

  		float: left;
  		display: none;
  		width: 10%;
  		height: 100%;
  	}

  	.timer{
  		width: 20px;
  		height: 20px;
  		border: solid;
  		border-width: 2px;
  		border-color: green;
  		box-shadow: 0 4px 8px 0 rgba(0 , 0 ,0, 0.8);
  		transition: 0.1s;
  		border-radius: 10px;
  		padding: 10px;
  		background: #fff;

  	}

  	.submit_btton{

  		width: 80px;
  		height: 40px;
  		border: solid;
  		border-width: 2px;
  		border-color: green;
  		box-shadow: 0 4px 8px 0 rgba(0 , 0 ,0, 0.8);
  		transition: 0.1s;
  		border-radius: 10px;
  		padding: 10px;
  		background: green;
  	}



  footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #555;
      padding: 10px;
    }
  
  	.{
  		box-sizing: border-box;
  	}

  	.question_box{

      width: 100;
      height: 100%;
      border: solid;
      margin-top: 20px;
      border-width: 2px;
      border-color: green;
      box-shadow: 0 4px 8px 0 rgba(0 , 0 ,0, 0.8);
      transition: 0.1s;
      border-radius: 20px;
      padding: 10px;
      background: cyan;

  	}

    .clear-left:after{
      clear: left;
    }
     .clear-right:after{
      clear: right;
    }
  	@media only screen and (max-width: 600px) {


  	}
    
  </style>
</head>
<body onload="showNextQuestion(this,1)">
	<header>
	   <h2 style="float: left; margin: 12px; " class="clear-left"><u><i>Mock Test</i></u></h2>

		<div style="float: right;" class="clear-right">

			<div >	
				Time reamining: <span class="timer" id="timer_display">  </span>

				&nbsp &nbsp &nbsp &nbsp			
 				<button  class="submit_btton" id = "SubmitTest" onclick="callSubmitTest()" >Submit</button>	
 				&nbsp &nbsp &nbsp &nbsp	
			</div>

		</div>

	</header>


<div class="question_box" id="question_view">
  
  <h4 id="current_q_no"></h4>

  <ul type= "none" >
    
    <li>
      <p>
        <pre id="question_statement"></pre>
      </p>
    </li>

   <li>
      
      a)<input type= radio name="option" id="a" onclick="saveSelectedOption(this.id)"><span></span>
      <br>
      b)<input type= radio name="option" id="b" onclick="saveSelectedOption(this.id)"><span></span>
      <br>
      c)<input type= radio name="option" id="c" onclick="saveSelectedOption(this.id)"><span></span>
      <br>
      d)<input type= radio name="option" id="d" onclick="saveSelectedOption(this.id)"><span></span>

    </li  >

    
 </ul>
  
</div>


<script src="takeTest.js" type="text/javascript">
</script>



<footer>
  <button onclick="showNextQuestion(this,-1)" class="submit_btton"><font color="white" size="3px">Prev</font></button>&nbsp&nbsp&nbsp&nbsp

  <button onclick="showNextQuestion(this,1)" class="submit_btton" ><font color="white" size="3px">Next</font></button>&nbsp&nbsp&nbsp&nbsp
</footer>

</body>
</html>