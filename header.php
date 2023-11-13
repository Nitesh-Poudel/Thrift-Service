

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>

/*Inside left*/


/*starts from here*/
.right{width:90%; margin-left:10px;}
.right .header{font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;line-height: 1;
    display: flex; justify-content: space-between; align-items: center;box-shadow: 5px 3px 18px 0px #888888;
    height:100px;
}


.right .header .moto h1 {
  line-height: 0;
}



.right .header .searchMenue input{
    background:transparent;
    border:1px solid gray;
    border-radius:8px;
    height:20px;
    width:30vw;
  
    
}

.right .header .searchMenue::-webkit-input-placeholder{
    font-family:cursive;
    border-bottom: #3c3d3e;
     font-size: 18px;
    
}




.right .header .extra a{
    font-family: 40px;
    color:black;

}

.list{
    display:flex;
    align-items: center;
}
.right .header .extra ul li{
   
    margin-right: 10px;
}

.right .header .extra ul li{

    margin-right: 10px;
}

.right .header .extra ul li .notification{
   
   font-size:22px;
  
   
}
.right .header .extra ul li .notification .count{
    width:20px;
    height:20px;
    background-color: red;
    border-radius:50%;
    position:relative;
    display:flex;
    justify-content: center;
    align-items: center;
    color:White;
    font-size:10px;


   
}
#notification{
   
    text-align:center;
    justify:content:center;
    cursor:pointer
   
    
}



.notify{
    
    
    background:rgb(0,100,0);
    
    width:250px;
    max-height:55vh;
    opacity: 1;
   

    overflow:scroll;
    display:flex;
    flex-direction: column;
    margin-top:0px;
    margin-left:-15%;
    position:absolute;
    background-color: rgb(255, 252, 252);
   padding:5px;
 display:none;
    align-items: center;
    box-shadow: 5px 3px 18px 0px #888888;

   
}
.notify ul li{
    margin-top:20px;
   
    border-bottom:1px dotted gray;
    text-align:left;
}


.notify {
   
    
    
  
}
.notify ul li:hover{
    background-color:aliceblue;
}
.a{
    width:100%;
    border:1px solid red;
}


.nav{background-color:#1d4251; height:40px; display:flex;align-items:center;}
.nav a{color:white;margin-left:auto;margin-right:auto;text-decoration:none;background-color:#1d4251;padding:5px;border-radius:0px;}
.nav :hover,#active{background-color:#1d4251;color:gold;transition:0.5s;}

/* Styling for the search menu container */
.searchMenu {
    display: inline-block;
    border: 10px solid #ccc;
    border-radius: 0px;
    padding: 5px;
}

#search-input {
        padding: 18px; 
        font-size: 16px; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
    }

    #search-button {
        background-color: #007BFF; 
        color: #fff; /* Text color */
        border: none;
        padding: 12px 15px; /* Adjust padding as needed */
        border-radius: 5px; 
        cursor: pointer; 
    }

    #search-button i {
        font-size: 8px; /* Adjust the size of the search icon */
    }



</style>
<?php 
    include_once('session.php');
   
    if(isset($_SESSION['userid'])){
        $id=$_SESSION['userid'];
        $qry2=mysqli_query($con,"SELECT * FROM user WHERE uid=$id");
        $data2=mysqli_fetch_assoc($qry2);
    }

?>
<body>
        <div class="outer"id="outer">
                <div class="header">

                    <div class="moto">
                        </div>
                    
                    <div class="searchMenue">
                        <form method="POST">
                            <input id="search-input" type="search" placeholder="search product..." name="search">
                            <button id="search-button"type="submit" name="search-btn" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    
                        <div class="extra">
                            <ul type="none">
                                <div class="list">

                                   <li >
                                            <div class="notification" id="notification">

                                                        <div class="count">
                                                            <span >
                                                                <b><?php
                                                                    $notification_count=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM notification 
                                                                     
                                                                    WHERE destination=$id AND seen='0'");
                                                                $row = mysqli_fetch_assoc($notification_count);
                                                                echo  $row['total_count']; ?>
                                                                </b>
                                                            </span>
                                                        </div>

                                                        <i class="fa-sharp fa-solid fa-bell"></i>


                                                    <div class="notify" id="notify" >
                                                        <ul type=none>
                                                            <?php
                                                                $notification="SELECT * From notification where destination=$id order by nid desc";
                                                                $notificationQuery=mysqli_query($con,$notification);

                                                                if(mysqli_num_rows($notificationQuery)>0){
                                                                   while( $notifications=mysqli_fetch_assoc($notificationQuery)){

                                                                        if(isset($notifications['source'])){
                                                                            if($notifications['source']!=0){
                                                                                $source=$notifications['source'];
                                                                                $query=mysqli_query($con,"SELECT name FROM user u join notification n ON n.source=u.uid where source=$source ");
                                                                                $source_name=mysqli_fetch_assoc($query);

                                                                               // echo'<li><a href="home.php">' . $notifications['subject'] . ' by <b>'.$source_name['name'].' </b><br><h7 style="font-size: 14px;">' . $notifications['time'] . '</h7></a></li>';

                                                                               // if($notification['subject']=='Proposal Accepted'){
                                                                                    echo'<li><a href="home.php">' . $notifications['subject'] . ' by <b>'.$source_name['name'].' </b><br><h7 style="font-size: 14px;">' . $notifications['time'] . '</h7></a></li>';
                                                                                //}
                                                                                //else{
                                                                                //    echo'<li><a href="home.php">' . $notifications['subject'] . ' by <b>'.$source_name['name'].' </b><br><h7 style="font-size: 14px;">' . $notifications['time'] . '</h7></a></li>';
                                                                              
                                                                                //}
                                                                                
                                                                            }
                                                                            else{
                                                                                echo '<li>' . $notifications['subject'] . ' <br><h7 style="font-size: 14px;">' . $notifications['time'] . '</h7></li>';
                                                                            }
                                                                        }
                                                                       
                                                                   }
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>


                                                   
                                            </div>
                                    </li>



                                    <li><a href="#"><img src="userimage/<?php echo $data2['userimg'];?>"></a><li>
                                </div>
                            </ul>

                       
                        </div>
 
                        
        </div>
                   


        <script>
        document.addEventListener('DOMContentLoaded', function () {
            let notification = document.getElementById("notification");
            let notify = document.getElementById("notify");
            let isNotificationVisible = false;

            // Add click event listener to the notification trigger
            notification.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevents the click event from propagating to the document
                if (!isNotificationVisible) {
                    notify.style.display = 'block';
                    isNotificationVisible = true;
                  
                } else {
                    notify.style.display = 'none';
                    isNotificationVisible = false;
                }
            });

            // Add click event listener to the document to hide the notification when clicking anywhere outside it
            document.addEventListener('click', function () {
                if (isNotificationVisible) {
                    notify.style.display = 'none';
                    isNotificationVisible = false;
                }
            });
        });
    </script>

</body>
</html>