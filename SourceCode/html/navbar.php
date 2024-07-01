<nav>
			<div class="logo">
				<a href="index.php"><img src="../src/img/logo.jpeg" alt="Logo"></a>
			</div>
			<div class="buttons">
				<div class="navbar-buttons">
					<?php
					session_start();

					if (isset($_SESSION['loggedin'])) {
						echo '<a href="logout.php" class="fantasy-button">Logout</a>';
						echo '<a href="profile.php" class="fantasy-button">Profile</a>';
					} else {
						echo '<a href="register.php" class="fantasy-button">Register</a>';
						echo '<a href="login.php" class="fantasy-button">Log in</a>';
						//Weiterleitung zur Landing Page falls nicht eingeloggt & nicht auf erlaubten seiten
						if( basename($_SERVER['PHP_SELF']) != 'landingpage.php' && basename($_SERVER['PHP_SELF']) != 'login.php'&&basename($_SERVER['PHP_SELF']) != 'register.php'){
							header("Location: landingpage.php");
						}
					}
					?>
				</div>
			</div>
		</nav>