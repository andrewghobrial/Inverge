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
			echo '<div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="page_profile.php?id=' . $_SESSION['id'] . '">My Profile</a></li>
            <li><a href="list_ideas.php">Ideas</a></li>
            <li><a href="list_people.php">People</a></li>
            <li><a href="">Log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>';

		}	
      ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
