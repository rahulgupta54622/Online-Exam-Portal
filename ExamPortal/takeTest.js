function setTestDuration(duration1){

  var duration = duration1*60*1000;

  var x = setInterval(function() {

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

    // If the count down is over, save the test details and go to thanks page
    if (duration < 0) {
      clearInterval(x);
      document.getElementById("timer_display").innerHTML = "EXPIRED";
    }

     duration = duration - 1*1000;
   
    }, 1000);

}

