<!-- upload modal window -->
<?php
$sqlGenre = "Select Name from Genres";			//Will change when tags are added to db
$sqlInst = "Select Instruments from Instruments";	//As Above
$sqlSongs = "SELECT ID from Songs;";
$sqlSongsName = "SELECT SongTitle FROM Songs;";
$sqluserNames = "SELECT username FROM users;";
$usernames = $dbh->query($sqluserNames);
$genres = $dbh->query($sqlGenre);
$insts = $dbh->query($sqlInst);
$songsID = $dbh->query($sqlSongs);
$songsName = $dbh->query($sqlSongsName);


?>
<div id="uploadModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload a track:</h4>
			</div>
			<div class="modal-body">
				<form id="uploadForm" enctype="multipart/form-data" method="post" action="php/upload.php" >
				<div class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Upload Song Here</span>
						<input type="file"  name="fileToUpload" id="fileToUpload" />
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Song Title</span>
						<input type="text" placeholder="Song Title" name="songTitle" id="songTitle" required>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Genre</span>
						<select name="genre">
						<?php 
							echo "<option value=\"\">$name</option>";
							foreach ($genres as $genre){
								$name = $genre['Name'];
								echo "<option value=\"$name\">$name</option>";
							}
						?>
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Instrument</span>
						<?php
							echo "<select name=\"instrument\">";
							echo "<option value=\"\">$instrument</option>";
							foreach($insts as $inst){
								$instrument = $inst['Instruments'];
								echo "<option value=\"$instrument\">$instrument</option>";
							}
							echo "</select>";
						?>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Add to Song</span>
						<select name="addTrack">
						<?php 
							echo "<option value=\"\">$name2</option>";
							foreach ($songsName as $song){
								$name2 = $song['SongTitle'];
								echo "<option value=\"$name2\">$name2</option>";
							}
							echo "</select>";
						?>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Song Description</span>
						<input type="text" placeholder="Song Description" name="description" id="description" required><br>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Song Image</span>
						<input type="file" name="songImage" id="songImage">
					</div>
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-success" value="Upload Track" name="submit" form="uploadForm">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

    <!-- end of modal -->
    
   
<!-- footer -->
<!-- end of footer-->
      
<!-- login modal window -->
<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Login:</h4>
			</div>
			<div class="modal-body">
				<form id="loginForm" method="post" action="php/loginVerification.php" >
					<div class="col-md-5">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Username</span>
							<input type="text" placeholder="Username" name='username' class='username' id='username' required><br>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Password</span>
							<input type="password" placeholder="Password" name='password' class='password' id='password' required>
						</div>
						<br>
						<div class="input-group">
							<input type="submit" class="btn btn-success" value="Login"  name= 'submit' >
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-info" data-toggle="modal" data-target="#registerModal">Register</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
      
      
      
      
       
    <!-- comment modal window -->
    <div id="commentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">comments: <?php echo "$_GET[id]"; ?></h4>
                </div>
                <div class="modal-body">
                    
                    <?php
                    $sql = "SELECT * FROM comments;";
                    $result = $dbh->query($sql);
                    foreach ($dbh->query($sql) as $row) {
                      
                        echo "<p> " . $row[user] .": " .  $row[comment];
                    }
                    ?>
                   
                </div>
                <div class="modal-footer">
                    <form id="commentForm" method="post" action="addComment.php">
                        <textarea rows="4" cols="50" name="comment">add comment</textarea>
                        
                        <input type="submit" class="btn btn-success" value="add Comment">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                   

                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->
    
    
      
<!-- end of modal -->

<!-- register modal window -->
<div id="registerModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Register:</h4>
			</div>
			<div class="modal-body">
				<form id="registerForm" enctype="multipart/form-data" method="post" action="php/registerNewUser.php">
					<div class="col-md-5">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Email Address</span>
							<input type="text" placeholder="Email address" name="email" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Password</span>
							<input type="password" placeholder="Password" name="password1" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Confirm Password</span>
							<input type="password" placeholder="Password" name="password2" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Username</span>
							<input type="text" placeholder="Username" name="username" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Firstname</span>
							<input type="text" placeholder="First Name" name="firstname" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Surname</span>
							<input type="text" placeholder="Last Name" name="lastname" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Date of Birth (YYYY-MM-DD)</span>
							<input type="text" placeholder="DOB" name="DOB" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Profile Image</span>
							<input type="file"  name="fileToUpload" id="fileToUpload"required/>
						</div>
						<br>
						<div class="input-group">
							<input type="checkbox" required> Do you accept the <a href="#">terms</a> and conditions of use
						</div>
						<br>
						<div class="input-group">
							<input type="submit" class="btn btn-success" value="Sign-Up"> <?php echo "\t"; ?>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
<!-- end of modal -->





<div id="addTrackModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a Track:</h4>
                </div>
                <div class="modal-body">
                    <form id="uploadForm2" enctype="multipart/form-data" method="post" action="php/upload.php" >
                    <!-- should also store username needs to be added -->
                        Track:<br>
                        <input type="file"  name="fileToUpload" id="fileToUpload" /><br>

                        <?php
                        $songNameSql = "SELECT SongTitle FROM Songs WHERE ID = '$_GET[id]';";
                        foreach ($dbh->query($songNameSql) as $nameRow) {

                            echo "<input type='hidden' name='addTrack' id='addTrack' value='$nameRow[SongTitle]'/>";

                        }  
                        ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Upload Track" name="submit" form="uploadForm2">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

 
    <!-- Personal Message modal window -->
    <div id="pmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Send a Message:</h4>
                </div>

                <div class="modal-body">
                    <form id="pmForm" method="post" action="pm.php">
                         User: <select name="username">
                            <?php 
                            //echo "<option value=\"\">$name3</option>";
                            foreach ($usernames as $username){
                            	$name3 = $username['username'];
                            	echo "<option value=\"$name3\">$name3</option>";                            
                            }
                            ?>
                        <!--<input type="text" placeholder="username" name="username"><br>-->
                        <textarea rows="4" cols="70" name="message"></textarea><br>
                        
                        <input type="submit" class="btn btn-success" value="Send Message">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                   

                </div>
            </div>
        </div>
    </div>


<!-- incorrect password modal window -->
    <div id="incorrectPWModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Incorrect Password. :(</h4>
                </div>

                <div class="modal-body">
                    <p> You have entered the incorrect password for this user. Try again. </p>
                   

                </div>
            </div>
        </div>
    </div>


	<!-- incorrect username modal window -->
    <div id="incorrectUIDModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Incorrect Username :(</h4>
                </div>

                <div class="modal-body">
                    <p>You have entered your username incorrectly or you have not registered. Please try again or Register.</p>
                   

                </div>
				
            </div>
        </div>
    </div>

		<!-- song format modal window -->
    <div id="songFormatModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Error uploading track :(</h4>
                </div>

                <div class="modal-body">
                    <p>The track failed to upload. this could be because it was too large or it was the wrong format. please
					make sure that the format is either .ogg, .mp3 or .wav</p>
                   

                </div>
				
            </div>
        </div>
    </div>

		<!-- thumb format modal window -->
    <div id="thumbFormatModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Error uploading thumbnail :(</h4>
                </div>

                <div class="modal-body">
                    <p>The thumbnail failed to upload. This was because it was the wrong format. please
					make sure that the format is either .png, .jpg/jpeg or .gif</p>
                   

                </div>
				
            </div>
        </div>
    </div>

		<!-- sql error modal window -->
    <div id="SQLModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Error in SQL :(</h4>
                </div>

                <div class="modal-body">
                    <p>looks like there was a problem in the SQL. Please contact an administrator. Sorry about this.</p>
                   

                </div>
				
            </div>
        </div>
    </div>

		<!-- catastrophic error modal window -->
    <div id="catastrophicErrorModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">:(</h4>
                </div>

                <div class="modal-body">
                    <p>musoFuse encountered a catastrophic, unrecoverable error. Please contact an administrator. Sorry about this</p>
                   

                </div>
				
            </div>
        </div>
    </div>
		<!-- catastrophic error modal window -->
    <div id="catastrophicErrorModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Saved :)</h4>
                </div>

                <div class="modal-body">
                    <p>Your details have sucesfully been updated.</p>
                   

                </div>
				
            </div>
        </div>
    </div>


<!-- delete user modal window -->
<div id="areYouSureModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure you want to delete your account?</h4>
			</div>
		
			<div class="modal-footer">
				<a href="php/deleteProfile.php" class="btn btn-danger">Yes</a>
				<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<!-- delete song modal window -->
<div id="areYouSure2Modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure you want to delete this song?</h4>
			</div>
		
			<div class="modal-footer">
			<?php
				echo "<a href='deleteSong.php?id=$_GET[id]'' class='btn btn-danger'>Yes</a>";
				?>
				<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>


	<script>
		var GET = {} ;
		window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){GET[name]=value;});
		var get = parseInt(GET['error']);
		if (get === 0) {
			$("#incorrectPWModal").modal();
		} else if (get === 1) {
			$("#incorrectUIDModal").modal();
		} else if (get === 2) {
			$("#songFormatModal").modal();
		} else if (get === 3) {
			$("#thumbFormatModal").modal();
		} else if (get === 4) {
			$("#SQLModal").modal();
		} else if (get === 4) {
			$("#saveModal").modal();
		} else if (get === 99) {
			$("#catastrophicErrorModal").modal();
		}
		//console.log(GET);
		//2 = wrong song format, 99 = catastrophic error, 3 = thumbnail formmat, 4 = sql error,
		</script>