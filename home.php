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


      <h5 style="color:red;">⇝ Game Objectives- <h5>


        <p><b>⊷ The spy:</b> Will try to guess the round's location. Infer from others' questions and answers.</p>
		<p><b>⊶ Other players:</b> Figure out who the spy is by asking questions.</p>

<br>

		<h5 style="color:red;">⇝ Round Timer- <h5>

			<p> Each round will be of 10 minutes.</p> 
			<img style="margin-left: 80px; padding: -5px;" src="res/timer.gif" alt="Timer">

			<p> Game ends if either the clock runs out, SPY guesses the location CORRECTLY, OR the spy is identified by others. </p>

<br>

		<h5 style="color:red;">⇝ Game Flow- <h5>

			<p><b>⊶ The location:</b> The round starts, each player is given a location. The location is the same for all players (e.g., Bank) except for one player, who is randomly given the <b>'SPY'</b> card. The spy does not know the round's location.</p>

			<p><b>⊷ Questioning:</b> The game host (person who started the game) begins by questioning another player about the location. Example: "Is this a place where children are welcome?" </p>

			<p><b>⊶ Answering:</b> The questioned player MUST answer. No follow up questions allowed. After they answer, it's then their turn to ask someone else a question. This continues until round is over.

			<p><b>⊷ No retaliation questions:</b> If someone asked you a question for their turn, you cannot, then immediately ask them a question back for your turn. You MUST choose someone else. </p>
<br>

		<h5 style="color:red;">⇝ Guesses- <h5>

			<p> At any time, a player can try to indict a suspected spy by putting that suspect up for vote. They must say "I'd like to put player <b>X</b> up for vote." Then go one by one clockwise around the circle, and each player much cast their vote if they're in agreement to indict.
			If any player votes no, the round continues as it was. Each person can only put a suspect up for vote once per round. Use it wisely!
		If a player is indicted <b>ONLY BY EVERYONE</b>, they must reveal whether or not they are the spy and the round ends.</p>

		<p>At any time, the spy can reveal that they are the spy and make a guess at what the location is. The round <b>immediately</b> ends.</p>

<hr style="height:2px;border-width:0;color:gray;background-color:pink">
<h3 style="text-align:center"> ENJOY! <h3>
	<hr style="height:2px;border-width:0;color:gray;background-color:pink">



      
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

