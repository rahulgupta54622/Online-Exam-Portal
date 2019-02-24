function validateForm() {
  var x = document.forms["signUpForm"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}