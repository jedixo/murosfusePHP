<?php

session_start();
include("php/dbconnect.php");

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Townsville Community Music Centre - Home</title>
<meta name="description" content="With the support of the Townsville City Council, we work from an office in the Civic ... All private schools and most government schools have music teachers.">
<link rel="stylesheet" href="css/royalslider.css">
<link rel="stylesheet" href="css/style.css">
<link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">
<!-- JS -->
<script src="js/jquery-1.11.1.min.js"></script>

</head>

<body>
<?php
require("php/header.php");
?>
    
<!-- WEBSITE LAYOUT Box -->
    <div class="page-inner">
  <div class="container">
<div id="boxed_content" class="boxed_content">
<div class="inner">
<div id="content" class="site-content">
        <div id="home-slider-1" class="royalSlider rsMinW">

          <div class="rsContent slide2">
            <a class="rsImg" href="images/thumb/slider1.jpg"></a>
            <div class="bContainer">
              <div class="rsABlock rs_text rs_text_meta" data-move-effect="top">Join the TCMC Team</div>
              <div class="rsABlock rs_text_box" data-move-effect="bottom">
                <span>Become a Member</span>
              </div>
              <div class="rsABlock rs_button" data-move-effect="bottom">
                <a href="members.php" class="ui huge button coloured">Join Now</a>
              </div>
            </div>
          </div>

          <div class="rsContent slide2">
            <a class="rsImg" href="images/thumb/slider2.jpg" ></a>
            <div class="bContainer">
              <div class="rsABlock rs_text rs_text_meta" data-move-effect="top">Never Miss An Event Again</div>
              <div class="rsABlock rs_text_box" data-move-effect="bottom">
                <span>Explore Upcoming Events</span>
              </div>
              <div class="rsABlock rs_button" data-move-effect="bottom">
                <a href="events.php" class="ui huge button coloured">View Events</a>
              </div>
            </div>
          </div>

          <div class="rsContent slide3">
            <a class="rsImg" href="images/thumb/slider3.jpg"></a>
            <div class="bContainer">
              <div class="rsABlock rs_text rs_text_meta" data-move-effect="top">Join the Experience</div>
              <div class="rsABlock rs_text_box" data-move-effect="bottom">
                <span>Volunteer at Events</span>
              </div>
              <div class="rsABlock rs_button" data-move-effect="bottom">
                <a href="members.php" class="ui huge button coloured">Sign Up</a>
              </div>
            </div>
          </div>
          
        </div> <!-- END royalSlider -->
  
    <div class="content"> <a href="about.php" class="white">
      <h2>About Us</h2>
      </a>
      <section class="events">
        <ul class="events-list">
          <li>
            <div class="event-container">
            <a href="about.php"> <div class="artist-image"><img src="images/CivicFront300.jpg" width="244" height="170" alt="The Townsville Community Music Centre"></div></a>
            <div class="event-info">
              <h3 class="event-info-name">Townsville Community Music Centre</h3>
              <div class="event-info-text"> Based in Townsville, North Queensland, the Music Centre presents concerts and workshops throughout the year, in a diverse range of genres including classical, jazz, folk, blues, world and contemporary music, featuring touring artists and locally-based professional and emerging artists. </div>
              <br>
              <div class="artist-button-homepage"><a href="about.php" class="ui small button coloured">Read More</a></div>
            </div>
              </div>
                </li>
        </ul>
      </section>
      <br />
      <a href="events.php" class="white">
      <h2>Upcoming Events</h2>
      </a>
        <!-- events start -->
      <section class="events">
        <ul class="events-list">
            
<?php
    $closest1 = INF;
    $closest2 = INF;
    $sql = "SELECT * FROM events";
    foreach ($dbh->query($sql) as $row) {
        if (time() < $row[time] and $row[time] <= $closest1 ) {
            $closest2 = $closest1;
            $closest1 = $row[time];
        } elseif (time() < $row[time] and $row[time] <= $closest2 ) {
            $closest2 = $row[time];
        }
    

    }
    $sql = "SELECT * FROM events WHERE time = '$closest1'";
    foreach ($dbh->query($sql) as $event1) {}
    $sql = "SELECT * FROM events WHERE time = '$closest2'";
    foreach ($dbh->query($sql) as $event2) {}
    

    
?>

            <li>
                <div class="event-container">
                    <?php
$sql = "SELECT thumb FROM artists WHERE id = '$event1[artistId]'";
foreach ($dbh->query($sql) as $artist) {}
$date = date('l jS \of F Y h:i:s A', $event1[time]);
?>
                <div class="artist-image"><img <?php echo "src='$artist[thumb]' alt='$artist[name]'";?>/></div>
                <div class="event-info">
                    <h3 class="event-info-name"><?php echo "$event1[name]"; ?></h3>
                    <div class="event-info-details"> 
                        <span class="event-time"><strong><?php echo "$date"; ?></strong></span>  
                        <span class="event-location"> at the <?php echo "$event1[location]"; ?></span>                         
                    </div>
                    <div class="artist-info-bio"><?php echo "$event1[details]"; ?></div>
                    <br>
                    
                </div> 
            </div>
            </li>
            <li>
                <div class="event-container">
                                        <?php
                    $sql = "SELECT thumb FROM artists WHERE id = '$event2[artistId]'";
                    foreach ($dbh->query($sql) as $artist) {}
                    $date = date('l jS \of F Y h:i:s A', $event2[time]);
                    ?>
                <div class="artist-image"><img <?php echo "src='$artist[thumb]' alt='$artist[name]'";?>/></div>
                <div class="event-info">
                    <h3 class="event-info-name"><?php echo "$event2[name]"; ?></h3>
                    <div class="event-info-details"> 
                        <span class="event-time"><strong><?php echo "$date"; ?></strong></span>  
                        <span class="event-location"> at the <?php echo "$event2[location]"; ?></span>                         
                    </div>
                    <div class="artist-info-bio"><?php echo "$event2[details]"; ?></div>
                    <br>
                    
                </div> 
            </div>
          </li>
        </ul>
      </section>
      <br>
      <a href="bulletinboard.php" class="white">
      <h2>Bulletin Board Highlights</h2>
      </a>
      <section class="events">
        <ul class="events-list">
            <?php
$sql = "SELECT * FROM bullitens ORDER BY date DESC LIMIT 1";
foreach ($dbh->query($sql) as $row) {
    if (time() < $row['expire']) {
        $date = date('l jS \of F Y h:i:s A', $row['date']);
?>            
          <li>
            <div class="event-container">
            <div class="artist-image"><img <?php echo "src='$row[thumb]' alt='$row[name]'";?>/></div>
            <div class="event-info">
              <h3 class="event-info-name"><?php echo "$row[name]"; ?></h3>
              <div class="event-info-details"> <span class="event-time"><?php  echo "$row[user]"; ?></span> <span class="event-day"><?php  echo "$date"; ?></span></div>
              <div class="artist-info-bio"> 
                  <?php echo "$row[details]"; ?> 
                </div>
              <br>
              </div>
            </div>
          </li>
              <?php
    }
}
?>
        </ul>
      </section>
      <br>
      <a href="artists.php" class="white">
      <h2>Popular Artists</h2>
      </a>
        <!--artist start-->
      <section class="events">
        <ul class="events-list">
            
<?php
    $mostvisited1 = 0;
    $mostvisited2 = 0;
    $sql = "SELECT * FROM artists ORDER BY hits DESC LIMIT 2";
    foreach ($dbh->query($sql) as $row) {
        if ($mostvisited1 == 0) {
            $mostvisited1 = $row[id];
        }else {
            $mostvisited2 = $row[id];
        }
    

    }
    $sql = "SELECT * FROM artists WHERE id = '$mostvisited1'";
    foreach ($dbh->query($sql) as $artist1) {}
    $sql = "SELECT * FROM artists WHERE id = '$mostvisited2'";
    foreach ($dbh->query($sql) as $artist2) {}
    
    
?>

            <li>
                <div class="event-container">
                    <div class="artist-image"><img <?php echo "src='$artist1[thumb]'" ?> <?php echo "alt='$artist1[name]'" ?>></div>
                    <div class="event-info">
                    <h3 class="event-info-name"><?php echo "$artist1[name]" ?></h3>
                    
                    <div class="artist-info-bio"><?php echo "$artist1[summary]" ?> </div>
                    <br>
                    <div class="artist-button-homepage"><a <?php echo "href='artistdetailed.php?rowid=$artist1[id]'" ?> class="ui small button colored">Read More</a></div>
                    </div> 
                </div>
            </li>
            <li>
                <div class="event-container">
                    <div class="artist-image"><img <?php echo "src='$artist2[thumb]'" ?> <?php echo "alt='$artist2[name]'" ?>></div>
                    <div class="event-info">
                    <h3 class="event-info-name"><?php echo "$artist2[name]" ?></h3>
                    <div class="artist-info-bio"><?php echo "$artist2[summary]" ?> </div>
                    <br>
                    <div class="artist-button-homepage"><a <?php echo "href='artistdetailed.php?rowid=$artist2[id]'" ?> class="ui small button coloured">Read More</a></div>
                    </div>
                </div>
          </li>
        </ul>
      </section>
    <br>
      <section class="bottom-section">
        <h3>Sponsors</h3>
        <div class="bottom-featured-img"><a href="http://www.townsville.qld.gov.au/Pages/default.aspx" target="_blank" class="tooltip-top" data-tooltip="The Council's Partnerships and Sponsorships scheme provides vital core funding which enables us to maintain the administrative base for all our other activities, and also provides the premises which house our office space. 
The Council also assists with the performance venues for our concerts and workshops."><img src="images/sponsor-townsville.jpg" alt="City of Townsville logo" width="210" height="210"></a></div>
    <div class="bottom-featured-img"><a href="https://www.qld.gov.au/" target="_blank" class="tooltip-top" data-tooltip="The Gambling Community Benefit Fund has assisted us to obtain office equipment and sound and lighting equipment for our productions."><img src="images/sponsor-qld-gov.jpg" alt="The Queensland Government logo" width="210" height="210"></a></div>
      </section>
      <br />
      
      <!-- END #primary --> 
      
               </div>
  </div>                                                                                                    

<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow30.js"></script>

  <!-- END .site-content -->
  <?php
require("php/footer.php");
?>
    </div></div> 
    <script id="addJS">
      jQuery(document).ready(function($) {
          jQuery.rsCSS3Easing.easeOutBack = 'cubic-bezier(0.175, 0.885, 0.320, 1.275)';
            $('#home-slider-1').royalSlider({
            arrowsNav: true,
            arrowsNavAutoHide: true,
            fadeinLoadedSlide: false,
            controlNavigationSpacing: 0,
            controlNavigation: 'bullets',
            imageScaleMode: 'none',
            imageAlignCenter:false,
            blockLoop: true,
            loop: true,
            numImagesToPreload: 3,
            transitionType: 'fade',
            keyboardNavEnabled: true,
            block: {
              delay: 400
            }
          });
      });
    </script>
    <script src="js/global.js"></script>
    <script src="js/jquery.royalslider.min.js"></script>                                                            
</body>
</html>
