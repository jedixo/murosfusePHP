<!-- start of navbar -->


<<<<<<< HEAD
    <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top navbar-inner">
=======
    <nav role="navigation" class="navbar navbar-inverse">
>>>>>>> origin/master
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
<<<<<<< HEAD
          <a href="home.php" class="navbar-brand"><b>Muso</b>Fuse</a>
=======
          <a href="#" class="navbar-brand">MusoFuse</a>
>>>>>>> origin/master
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="discovery.php">Discovery</a></li>
            
            <?php

    if (isset($_SESSION['username'])) {
        /////LOGOUTNEEDS HERE
        echo "<li><a href='php/logout.php'>Logout</a></li>";
    } else {
        echo '<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>';
}

?>
            
            
            
            
            
<!--            Search bar                -->
            <form method="get" action="search.php" class="navbar-form navbar-left" role="search" id="searchForm">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="SearchParameters" id="SearchParameters">
              </div>
              <button type="submit" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </form>
            </ul>
            
            
<!--            Profile Dropdown menu      -->
      <?php

    if (isset($_SESSION['username'])) { ?>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
<<<<<<< HEAD
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>  <?php echo $_SESSION[username]; ?> <?php echo "<img src='profileImages/" . $_SESSION[thumbnail] . "' width='25px' height='25px'>"?></a><span>   </span>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#uploadModal">Add new track</a></li>
            <li><a href="viewUserTracks.php">View your music</a></li>
            <li><a href="#" data-toggle="modal" data-target="#pmModal">Send a Direct Message</a></li>
            <?php
            $unreadSQL = "SELECT ID FROM Inbox WHERE InboxID = $_SESSION[id] AND IsRead = 0;";
            $count = 0;
            foreach ($dbh->query($unreadSQL) as $unread) {
              $count = $count + 1;
            }
            
            echo "<li><a href=inbox.php>Inbox";
            if ($count > 0) {
              echo "  <span class=badge>$count</span>";
            }
            echo "</a></li>";
            ?>
            <li role="separator" class="divider"></li>
            <li><a href="profile.php">Edit Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="php/logout.php">Log out</a></li>
=======
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>  <?php echo $_SESSION[username]; ?> <?php echo "<img src='" . $_SESSION[thumbnail] . "' width='25px' height='25px'>"?></a>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#uploadModal">Add new track</a></li>
            <li><a href="#">View your music <!--<span class="badge">42</span>--></a></li>
            <li><a href="#">View your projects <!--<span class="badge">12</span>--></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="profile.php">Edit Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Log out</a></li>
>>>>>>> origin/master
          </ul>
        </li>
            </ul>
            <?php } ?>
          </div>
      </nav>
<!--end of nav bar -->