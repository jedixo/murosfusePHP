<!-- upload modal window -->
    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload a track:</h4>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" enctype="multipart/form-data" method="post" action="php/upload.php" >
                    <!-- should also store username needs to be added -->
                        Upload Song Here:<br>
                        <input type="file"  name="fileToUpload" id="fileToUpload" /><br>
                        Song Title:<br>
                        <input type="text" placeholder="Song Title" name="songTitle" id="songTitle"><br>
                        Song Description:<br>
                        <input type="text" placeholder="Song Description" name="description" id="description"><br>
                        Song Image:<br>
                        <input type="file" name="songImage" id="songImage"><br>
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
      </div>
      
<!-- login modal window -->
      <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
<!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login:</h4>
                </div>
                <div class="modal-body">
                <form id="loginForm" method="post" action="php/loginVerification.php" >
                    Username:<br>
                <input type="text" placeholder="Username" name='username' class='username' id='username'><br>
                    Password:<br>
                <input type="password" placeholder="Password" name='password' class='password' id='password'><br><br>
                <input type="submit" class="btn btn-success" value="Login"  name= 'submit' >
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
                    <h4 class="modal-title">comments:</h4>
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
<!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register:</h4>
                </div>
                <div class="modal-body">
                    <form id="registerForm" method="post" action="php/registerNewUser.php">
                        Email Address:<br>
                        <input type="text" placeholder="Email address" name="email"><br>
                        Password:<br>
                        <input type="password" placeholder="Password" name="password1"><br>
                        Confirm Password:<br>
                        <input type="password" placeholder="Password" name="password2"><br>
                        Username:<br>
                        <input type="text" placeholder="Username" name="username"><br>
                        First Name:<br>
                        <input type="text" placeholder="First Name" name="firstname"><br>
                        Last Name:<br>
                        <input type="text" placeholder="Last Name" name="lastname"><br>
                        Date of Birth:<br>
                        <input type="text" placeholder="DOB" name="DOB"><br>
                        Profile Image:<br>
                        <input type="file" name="profileImage"><br>
                        <input type="checkbox"> Do you accept the <a href="#">terms</a> and conditions of use<br><br>
                        <input type="submit" class="btn btn-success" value="Sign-Up">
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
          </div>
      </div>
<!-- end of modal -->