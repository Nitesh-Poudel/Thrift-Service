<div class="left">

                    <div class="name"><h1>Clothex.</h1></div>

                    <div class="innerLeft">
                        <ul type="none">
                            <a href="index.php"><li><i class="fa-solid fa-house"></i> Home</li></a>
                            <a href="status.php?id=<?php echo$id;?>"><li><i class="fas fa-chart-line" ></i>Status </li></a>

                            <?php echo $link;?>
                            <a href="#"><li><i class="fa-regular fa-gear"></i> Setting</li></a>
                            <a href="#"><li><i class="fa-solid fa-mobile"></i> Contact</li></a>
                            <a onclick="return conformLogout()" href="logout.php" ><li><i class="fa-solid fa-mobile"></i> Logout</li></a>
                        </ul>
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