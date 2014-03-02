<?php 
session_start();
?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="imgs/logo_small.jpg"></a>
        </div>
        <div class="navbar-collapse collapse">
        <?php 


		if(!isset($_COOKIE['session_id'])||$_COOKIE['session_id']!=md5($_SESSION['username']." ".$_SERVER['REMOTE_ADDR']." ".$_SESSION['authsalt'])){
        echo '
          <form class="navbar-form navbar-right" role="form" action="index.php" method="post">
            <div class="form-group">
              <input type="text" name="username" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>';
		}else {
<<<<<<< HEAD
			echo "<div class=\"collapse navbar-collapse\">
          <ul class=\"nav navbar-nav\">
            <li><a href=\"person_profile.php?id=" . $_SESSION['id'] . "\">My Profile</a></li>
            <li><a href=\"list_ideas.php\">Ideas</a></li>
            <li><a href=\"people.php\">People</a></li>
            <li><a href=\"\">Log out</a></li>
=======
			echo '<div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="person_profile.php?id=' . '' . '">'  . '' . 'My Profile</a></li>
            <li><a href="list_ideas.php">Ideas</a></li>
            <li><a href="people.php">People</a></li>
            <li><a href="">Log out</a></li>
>>>>>>> 42022b4e96c755baac3c964d56e173a5fdb47b23
          </ul>
        </div><!--/.nav-collapse -->
      </div>";

		}	
      ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
