<div class="left">

                    <div class="name"><h1>Clothex.<i id="logo"class="fa-solid fa-shirt"></i></h1></div>

                    <div class="innerLeft">
                        <div class="innerLeftTop">
                        <ul type="none">
                            <a href="index.php"><li><i class="fa-solid fa-house"></i> Home</li></a>
                            
                            <a href="status.php?id=<?php echo$_SESSION['userid']?>&&role=<?php echo $_SESSION['role'];?>"><li><i class="fas fa-chart-line" ></i>Status </li></a>
                        
                            <?php if($_SESSION['role']=='seller')
                                $link='<a href="productupload.php"><li><i class="fa-solid fa-upload"></i>Upload</li></a>';
                                echo $link;
                               
                            ?>
                            <a href="#"><li><i class="fa-solid fa-gear"></i></i> Setting</a>
                             
                           
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