  function showHintPassword(str) {
    var xhttp;
    if (str.length == 0) { 
        document.getElementById("hint_password").classList.remove("text-success");
        document.getElementById("hint_password").classList.add("text-danger");
        document.getElementById("hint_password").innerHTML = "Guideline : Complex [Uppercase, Lowercase, Number, Special Character]";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        if(this.responseText === ""){
            document.getElementById("hint_password").classList.remove("text-danger");
            document.getElementById("hint_password").classList.add("text-success");
            document.getElementById("hint_password").innerHTML = "Successful";
        }else{
            document.getElementById("hint_password").classList.remove("text-success");
            document.getElementById("hint_password").classList.add("text-danger");
            document.getElementById("hint_password").innerHTML = this.responseText;
            }
        }
    };
    xhttp.open("GET", "ajax/gethint-password.php?q="+str, true);
    xhttp.send();   
  } 

  function showHintConfirmPassword(str) {

    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    if(password === confirm_password){
        document.getElementById("hint_confirm_password").classList.remove("text-danger");
        document.getElementById("hint_confirm_password").classList.add("text-success");
        document.getElementById("hint_confirm_password").innerHTML = "Matched";
    }else{
        document.getElementById("hint_confirm_password").classList.remove("text-success");
        document.getElementById("hint_confirm_password").classList.add("text-danger");
        document.getElementById("hint_confirm_password").innerHTML = "Guideline: Must matched with password";
    }
  }