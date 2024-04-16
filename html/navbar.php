<nav>
			<div class="logo">
				<a href="index.php"><img src="../src/img/logo.jpeg" alt="Logo"></a>
			</div>
			<div class="buttons">
				<?php
				session_start();

				if (isset($_SESSION['loggedin'])) {
					echo '<a href="logout.php" class="button">Logout</a>';
					echo '<a href="profile.php" class="button">Profile</a>';
				} else {
					echo '<a href="register.php" class="button">Register</a>';
					echo '<a href="login.php" class="button">Log in</a>';
				}
				?>
			</div>
		</nav>