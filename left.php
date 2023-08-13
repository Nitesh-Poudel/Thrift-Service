<div class="left">
                <?php session_start(); if(isset($_SESSION['userid'])){
                $id=$_SESSION['userid'];}?>
                <div class="name"><h1>Clothex.</h1></div>
                <div class="innerLeft">
                    <ul type="none">
                        <a href="index.php"><li><i class="fa-solid fa-house"></i> Home</li></a>
                        <a href="<?php echo $_SESSION['role'].'profile.php?id='.$id;?>"><li><i class="fa-solid fa-user"></i> <?php echo $_SESSION['role'];?></li></a>
                       
                        <a href="#"><li><i class="fa-solid fa-family-dress"></i> AboutUs</li></a>
                        <a href="#"><li><i class="fa-regular fa-gear"></i> Setting</li></a>
                        <a href="#"><li><i class="fa-solid fa-mobile"></i> Contact</li></a>
                        <a href="logout.php"><li>Logout</li></a>
                    </ul>
                </div>
            </div>