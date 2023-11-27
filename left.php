<div class="left">
<?php
    date_default_timezone_set('Asia/Kathmandu');
?>
                    <div class="name"><h1>Clothex.<i id="logo"class="fa-solid fa-shirt"></i></h1></div>

                    <div class="innerLeft">
                        <div class="innerLeftTop">
                        <ul type="none">
                            <a href="home.php"><li><i class="fa-solid fa-house"></i> Home</li></a>
                            
                            <a href="status.php?id=<?php echo$_SESSION['userid']?>&&role=<?php echo $_SESSION['role'];?>"><li><i class="fas fa-chart-line" ></i>Status </li></a>
                        
                            <?php if($_SESSION['role']=='seller')
                                $link='<a href="productupload.php"><li><i class="fa-solid fa-upload"></i>Upload</li></a>';
                                echo $link;
                               
                            ?>
                            <div id="setting">
                                <a  href="#"><li><i class="fa-solid fa-gear"></i> Setting</a>
                                <div class="setting-lists">
                                                        <ul type=none>
                                                            
                                                            
                                                            <li><a href="changepw.php?task=change">Change Password</a></li>
                                                            <?php if($_SESSION['role']=='non-seller')
                                                                echo'<a href="sellerRegistration.php"><li>Fill-Form</li></a>';
                                                                
                               
                                                            ?>
                                                        </ul>


                                                    </div>
                            </div>
                             
                           
                            <a onclick="return conformLogout()" href="logout.php" ><li><i class="fa-solid fa-mobile"></i> Logout</li></a>
                        </ul>
                </div>
                    </div>
                </div>
                <script>
                    function conformLogout(){
                        var isConfirmed = confirm('Are you sure you want to logout?');
                        if (isConfirmed) {
                            // Redirect to the logout page if confirmed
                            window.location.href = "logout.php";
                        }
                // Return false to cancel the default link behavior if not confirmed
                return isConfirmed;
                            }
                        </script>