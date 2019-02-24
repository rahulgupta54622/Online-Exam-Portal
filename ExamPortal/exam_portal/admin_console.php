<?php 
    session_start();

    if(!isset($_SESSION["admin"])){

        header("Location: front.php");
    }
?>

<html>
<head>
    <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("member").value;
            var frm = document.createElement("form");
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                frm.appendChild(document.createTextNode("Question " + (i+1)));
                frm.appendChild(document.createElement("br"));
                var input = document.createElement("textarea");
                input.rows = 2;
                input.cols = 50
                input.name = "q" + i;
                frm.appendChild(input);
                // Append a line break 
                frm.appendChild(document.createElement("br"));

                frm.appendChild(document.createTextNode("options"));

                frm.appendChild(document.createElement("br"));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                frm.appendChild(document.createTextNode("a. "));
                input.type = "text";
                input.name = "a"+i;
                frm.appendChild(input);
                // Append a line break 
                frm.appendChild(document.createElement("br"));

                frm.appendChild(document.createTextNode("b. "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "b"+i;
                frm.appendChild(input);
                // Append a line break 
                frm.appendChild(document.createElement("br"));

                frm.appendChild(document.createTextNode("c. "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "c"+i;
                frm.appendChild(input);
                // Append a line break 
                frm.appendChild(document.createElement("br"));

                frm.appendChild(document.createTextNode("d. "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "d"+i;
                frm.appendChild(input);

                frm.appendChild(document.createElement("br"));

                frm.appendChild(document.createTextNode("CORRECT ANS "));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "ans"+i;
                frm.appendChild(input);
                // Append a line break 
                frm.appendChild(document.createElement("br"));
                frm.appendChild(document.createElement("br"));
                frm.appendChild(document.createElement("br"));
            }



            var btn = document.createElement("button");
            btn.type = "submit";
            var t = document.createTextNode("ADD");
            btn.appendChild(t);
            frm.appendChild(btn);
            frm.method = "POST";
            frm.action = "admin.php";
            container.appendChild(frm);
            btn.addEventListener("click", successAlert);
        }

        function successAlert(){
            alert("Successfully Added");
        }

    </script>
    <style type="text/css">

        body
        {
            background-color: #29cb8e;
        }

        #container{
            font-family: sans-serif;
            font-size: 17px;
            position: absolute;
            width: 500px;
            text-align: center;
            margin-left: 30%;
            margin-top: 475px;
            /*margin-top: 5%;*/
            
            color:black;
            padding-left: 3px;
        }
        .main{
            font-family: sans-serif;
            font-size: 15px;
            text-align: center;
            position: absolute;
            
            margin-left: 40%;
            margin-top:0px;
        }

        .admin_id
        {
           position: absolute;
            margin-left: 75%;
            margin-top: 0px;
            font-family:"Impact", "Charcoal", "sans-serif" ;
            font-size: 20px;
            color: #031330;
            
        }
        button
        {
            width:70%;
            border-radius:30px;
            margin-top: 2px;
            font-size: 16px;
            background-color: #031330;
            color: #a2a6ae;
            font-family:"Impact", "Charcoal", "sans-serif" ;
        }
        button:hover
        {
            color:#031330;
            background-color: #a2a6ae; 
        }

    </style>
</head>
<body>

    <div class="admin_id">
        
    <?php

        print_r($_SESSION["admin"]);
    ?>
    <br>
    <a href="logout.php"><button>LOGOUT</button></a>
    </div>
    
<div class="main">
        <h1>ADMIN PANEL </h1>
        <br>
        <br>
        <br>
    <form method="POST" action="test_description.php">
    TEST DESCRIPTION <br>
    <textarea rows="4" cols="30" name="description" value="" placeholder="Add a short description about the exam(e.g. type,mode etc)"></textarea>
    <br>
    <br>
    TEST DURATION <br>
    <input type="text" name="time" value="" placeholder="DURATION(IN MINUTES)">
    <br>
    <br>
    TOTAL MARKS <br>
    <input type="text" name="marks" value="" placeholder="TOTAL MARKS">
    <br>
    <button type="submit">SUBMIT</button>
    </form>
    <br>
    TOTAL QUESTIONS <br>
    <input type="text" id="member" name="member" value="" placeholder="TOTAL QUESTIONS"><br>
    <button type="submit" onclick="addFields()">ADD QUESTIONS</button>
    
    <!-- <a href="#" id="filldetails" onclick="addFields()">Fill Details</a> -->
</div>
<div id="container">

</div>

</body>
</html>