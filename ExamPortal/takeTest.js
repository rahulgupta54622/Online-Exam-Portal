function setTestDuration(duration1){


  var duration = duration1*60*1000;

  if(getCookie("testDuration") != ""){

    var d = new Date();

    var currTime = d.getTime();

    var startTime = parseInt(getCookie("testStartTime"));

    var t = parseInt(getCookie("testDuration"));
    duration = t;
    var closeTime = startTime + (duration1*60*1000 - t);
    duration = duration - (currTime - closeTime);

  }

  else{
    var D = new Date();
    var startTime = D.getTime();
    setCookie("testStartTime",startTime,1);
  }

  var x = setInterval(function() {

     // If the count down is over, save the test details and go to thanks page
    if (duration < 0) {
      clearInterval(x);
      document.getElementById("timer_display").innerHTML = "EXPIRED";

      window.open("result.html", '_self');
      return;
    }
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(duration / (1000 * 60 * 60 * 24));
    var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((duration % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("timer_display").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
   
    if (minutes < 2) {
      document.getElementById("timer_display").style = "background-color: red";
    }
    

     duration = duration - 1*1000;
     setCookie("testDuration",duration,1);
   
    }, 1000);

}

function setCookie(cname,cvalue,exdays) {

  var d = new Date();

  d.setTime(d.getTime() + (exdays*24*60*60*1000));

  var expires = "expires=" + d.toGMTString();

  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}