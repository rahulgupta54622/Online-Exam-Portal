<?php
    session_start();

    if(!isset($_SESSION["username"])){

        header("Location: /ExamPortal/exam_portal/front.php");
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<style type="text/css">
	
	body{


		background-color: cyan;
		color: black;
	}

	</style>
</head>
<body >

<center><h2><u>Test Result</u></h2>

<p id ="test_result"></p>
	

</center>

<ol id="result_list" >
    
 </ol>


<script>
 disableBackButton();
 var totalAttempted = 0;
 var totalCorrect = 0;
 var totalScore = 0;
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

            //alert(myObj[0].question_statement);

            var x = document.getElementById("result_list");

            for (var i = 0 ; i < myObj.length ; i++) 
            {
            	
            	var p = document.createElement("li");

            	var pr = document.createElement("pre");
            	pr.innerHTML = myObj[i].question_statement;
            	p.appendChild(pr);

            	var a = document.createElement("input");
            	var b = document.createElement("input");
            	var c = document.createElement("input");
            	var d = document.createElement("input");

            	a.setAttribute("type", "radio");
            	b.setAttribute("type", "radio");
            	c.setAttribute("type", "radio");
            	d.setAttribute("type", "radio");

            	a.setAttribute("id", i+"a");
            	b.setAttribute("id", i+"b");
            	c.setAttribute("id", i+"c");
            	d.setAttribute("id", i+"d");


            	spa = document.createElement("span");
            	spb = document.createElement("span");
            	spc = document.createElement("span");
            	spd = document.createElement("span");

            	
            	p.appendChild(a);
            	p.appendChild(b);
            	p.appendChild(c);
            	p.appendChild(d);

            	x.appendChild(p);

            	p.insertBefore(document.createTextNode("a) "),a);
            	p.insertBefore(document.createTextNode("b) "),b);
            	p.insertBefore(document.createTextNode("c) "),c);
            	p.insertBefore(document.createTextNode("d) "),d);

            	spa.innerHTML = myObj[i].option_a + "<br>";
            	p.insertBefore(spa, a.nextSibling);

            	spb.innerHTML = myObj[i].option_b + "<br>";
            	p.insertBefore(spb, b.nextSibling);

            	spc.innerHTML = myObj[i].option_c + "<br>";
            	p.insertBefore(spc, c.nextSibling);

            	spd.innerHTML = myObj[i].option_d + "<br>";
            	p.insertBefore(spd, d.nextSibling);

            	p.appendChild(document.createElement("hr"));

        				if(myObj[i].correct_option == 'd'){
            				d.nextSibling.innerHTML = myObj[i].option_d + " " + "&#10004" + "<br>";
            				d.nextSibling.style.color = "green";
            			}

            			if(myObj[i].correct_option == 'c'){
            				c.nextSibling.innerHTML = myObj[i].option_c + " " + "&#10004" + "<br>";
            				c.nextSibling.style.color = "green";
            			}

            			if(myObj[i].correct_option == 'b'){
            				b.nextSibling.innerHTML = myObj[i].option_b + " " + "&#10004" + "<br>";
            				b.nextSibling.style.color = "green";
            			}

            			if(myObj[i].correct_option == 'a'){
            				a.nextSibling.innerHTML = myObj[i].option_a + " " + "&#10004" + "<br>";
            				a.nextSibling.style.color = "green";
            			}

            	if((t = JSON.parse(window.localStorage.getItem("selectedOPtionArrayStorage"))[i]) != null){

            		totalAttempted++;

            		if(t == myObj[i].correct_option){

            			totalScore++;
            			totalCorrect++;
            			
            			
            		}


            		else{

            			if(t == 'd'){
            				d.nextSibling.innerHTML = myObj[i].option_d + " " + "&#x274C" + "<br>";
            				d.nextSibling.style.color = "red";
            			}

            			if(t == 'c'){
            				c.nextSibling.innerHTML = myObj[i].option_c + " " + "&#x274C" + "<br>";
            				c.nextSibling.style.color = "red";
            			}

            			if(t == 'b'){
            				b.nextSibling.innerHTML = myObj[i].option_b + " " + "&#x274C" + "<br>";
            				b.nextSibling.style.color = "red";
            			}

            			if(t == 'a'){
            				a.nextSibling.innerHTML = myObj[i].option_a + " " + "&#x274C" + "<br>";
            				a.nextSibling.style.color = "red";
            			}

            		}



            		p.appendChild(document.createElement("p")).innerHTML = "Your answer: option " + t;
            		p.appendChild(document.createElement("p")).innerHTML = "Correct answer: option " + myObj[i].correct_option;
            	}

            	else{

            		p.appendChild(document.createElement("p")).innerHTML = "Your answer: Not answered";

            		p.appendChild(document.createElement("p")).innerHTML = "Correct answer: option " + myObj[i].correct_option;
            	}

            	p.appendChild(document.createElement("hr"));

            }

           		 document.getElementById("test_result").innerHTML = "Attempted: " + totalAttempted + "/"+ myObj.length + "<br>" + "Correctly answered: " + totalCorrect + "/"+ myObj.length + "<br>" + "Wrongly answered: " + (totalAttempted - totalCorrect) + "/"+ myObj.length + "</br>" + "Total points scored: " + totalScore + "/"+ myObj.length;

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp1 = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp1.onreadystatechange = function(){

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                      document.getElementById("saved_satus").innerHTML = xmlhttp1.responseText;
                    }

                };
                //document.getElementById("saved_satus").innerHTML = totalScore;
                xmlhttp1.open("GET", "submit_test_details.php?q="+totalScore);
                xmlhttp1.send(null); 
            }
        };
        xmlhttp.open("GET","result.php");
        xmlhttp.send(null);


        function disableBackButton(){
            history.pushState(null, null, location.href);

            window.onpopstate = function () {
                history.go(1);
            };

        }

        function thanks()
        { 
            window.open("thanks_page.php", "_self") ;
        }

</script>

<center>
    <p id = "saved_satus"></p>
    <button onclick="thanks()">Logout</button>
</center>
<br>

</body>
</html> 