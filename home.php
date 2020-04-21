<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ali Iktider Sayam">
	<meta name="description" content="Online Health & Fitness Guide">
	<meta name="keywords" content="gym,fitness,Healthy,Health">
	<title>SpyFall</title>
	<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

	<link href="home.css" rel="stylesheet">
	<link href="howtoplay.css" rel="stylesheet">


	<link rel="icon" href="res/logo.ico">
	
	
</head>

<body> 

		<div class="container">
			
			<div class="outer">

				<div class="centerlogo">
					<img height="350px"; width="350px"; src="res/like1.png">
				</div>
				


			<div class="centre">

				<!-- <button class="button button2" style="vertical-align:middle">Login</button> -->
				<button onclick="location.href = 'login.php';" class="button button2" style="vertical-align:middle">LOGIN</button>
				<button onclick="location.href = 'signup.php';" class="button button2" style="vertical-align:middle">SIGN-UP</button>
				
			

			<button id="myBtn" class="button button2" style="vertical-align:middle">How to play?</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  	<div id="animation" >
    <div class="modal-header">
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">
      <p>SpyFall is a party game that can be played with four or more players. At the start of each round, all the players receive a location –  </p>
      <p> a casino, a travelling circus, a pirate ship or even a space station – except the spies that don’t know the place. <p>
      <p>Then, players start asking each other yes or no questions – </p>
      <p> “Do you like to go there?” </p>
      <p> - trying to guess who among them is the spy.  </p>

      <p> The spies don't know where they are, so they have to listen carefully to guess the location and remain undetectable. </p>
      <p> If most players agree with the accusation, the accused player has to reveal his identity. </p>
      <p> The round just ends when all the spies are uncovered or when one of them announces the correct secret location within the given time frame. </p>

      <p><strong>Enjoy</strong></p>
    </div>
    <div class="modal-footer">

    	
       </div><!-- animation -->
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

	</div>

			</div>
		</div>


			


	</main>


</body>


</html>

