<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/productUpload.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
       
    </style>
</head>
<body>
    <div class="container">
        <div class="innercontainer">
            
            <?php 
            //Left part
            include_once('left.php')
            ?>

            <div class="right">
                
                   <div class="header">
                        <div class="moto">
                            <h1>Clothes</h1>
                            <h6>From Local market</h6>
                        </div>

                        <div class="searchMenue">
                            <form method="post">
                                <input type="text" placeholder="search product..." name="search">
                                 <button type="submit" name="search" id="search"><i class="fa-thin fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="extra">
                            <ul type="none">
                                <div class="list">
                                    <li><a href="#"><i class="fa-sharp fa-solid fa-bell"></i></a><li>
                                    <li><a href="#"><i class="fa-solid fa-messages"></i></a><li>
                                    <li><a href="#"><img src="images/1.png"></a><li>
                                </div>
                            </ul>
                        </div>
                    </div>

            <div class="pdetail">
                <div class="nameImg">
                    <div class="img"><img src="images/5.png"></div>
                    <div class="detail">
                        <h1>Upload By Nitesh Poudel</h1>
                        <table>
                            <tr>
                                <th>Dress type</th>
                                <td>Tshirt</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>XXL</td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td>Loream</td>
                            </tr>
                            <tr>
                                <th>Fiber</th>
                                <td>Silk</td>
                            </tr>
                            <tr id="price">
                                <th>Price</th>
                                <td>1500</td>
                            </tr>
                        </table>     
                                 
                     </div>


                     <div class="form">
                            <form method="POST">
                            <input type="text" placeholder ="Full address ie district-local government-ward-tole " name="location"><br>
                                <input type="number" placeholder ="Enter your Price" name="cprice"><br>
                                <button type="submit" name="submit" id="submit">Send proposal</button>
                            </form>
                        </div> 
                </div>
            </div>
            

                
            </div>
        </div>
    </div>

    
</body>
</html>
