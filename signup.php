<!DOCTYPE html>
<html>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="Online Health & Fitness Guide">
  <meta name="keywords" content="gym,fitness,Healthy,Health">
  <title>SpyFall SIGNUP</title>
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

  <link href="signup.css" rel="stylesheet">
  <link rel="icon" href="res/logo.ico">

<body>


  <div class="container">

<form action="registerusers.php" method="post"> 

    <div class="outer">

    <span id="form">
        
    <h1>Sign Up</h1>

    <p style="color:red;"> Please fill in the form: </p>
    <hr>

    



    <label for="fname"><b>First name</b></label>
    <input type="text" placeholder="First name" name="fname" required>

    <label for="lname"><b>Last name</b></label>
    <input type="text" placeholder="Last name" name="lname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="pass">Password</label>
    <input type="password" id="pass" placeholder="Enter Password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    
  <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
      </div>


     
        
  <script>
    var myInput = document.getElementById("pass");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }


  myInput.onkeyup = function() {

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
  </script>
          
          <div class="clearfix">
            <button onclick="location.href = 'home.php';" type="button" class="cancelbtn">BACK TO HOME</button>
            
            <button type="submit" class="signupbtn">SIGN UP</button>
          </div>

          </span>

         
          </div>
 </form>
         </div>
         

          <span>
            <div class="centerlogo">
          <img height="400px"; width="400px"; src="res/like1.png">
        </div>
          </span>
        </div>
      
    
  </div>
</body>
</html>
