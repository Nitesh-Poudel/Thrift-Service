<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Second-Hand Clothes Hub</title>
    <style>
        /* Reset some default styles */
        *::-webkit-scrollbar {
    display: none;
  }
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container{
            width:100%;
            height:100%;
            display:flex;
            justify-content: center;
            align-items: center;
            overflow:hidden;

        }

        /* Style the hero section */
        .hero-section {
           
            height: 100%;
            width: 90%;
          
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .contents {
            width:100%;
            margin-bottom: 20px;
            font-size: 60px;
            color: #231411;
            background-color: #ffc355;
            border-radius:12px
        }

        h1 {
            font-size: 2rem;
            margin: 0;
            padding: 0;
        }

        p {
            font-size: 1rem;
            margin: 5px 0;
        }

        button {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #FF371F;
        }

        /* Style the image slider */
        .image-slider {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 0px;
            overflow-y:scroll;
            height: 500px;
            width:100%;
            background-color:#cfcfcf;
            border-radius:10px


        }

        .imgs img {
            max-width: 20vw;
            margin:5px;
            border-radius:12px;
         
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            box-shadow: 5px 3px 18px 0px
            
        }
        .imgs img:hover{
            opacity:0.9;
            transition: transform 0.6s ease;
            
    
        }
       

        .imgs{height:100%;width:auto;border-radius:20px;display:flex;align-items:center;justify-content:center;}
        #sa3{height:100%;width:auto;border-radius:20px;display:flex;align-items:center;justify-content:center}
        #a3 img{height:100%;}
        #a2 img{height:80%;}

        
    </style>
</head>
<body>
    <div class="container">
    <div class="hero-section">
        <div class="contents">
            <h1><b>Your Second-Hand Clothes Hub</b></h1>
            <p>Buy, Sell, and Rediscover Fashion</p>
            <p></p>
            <button id="explorebutton">Explore Now</button>
        </div>
        <div class="image-slider">
            <div class="imgs" id="a1"><img src="images/1.png" ></div>
            <div class="imgs" id="a2"><img src="images/3.png" ></div>
            <div class="imgs"id="a3"><img id="mid-img" src="images/2.png" ></div>
            <div class="imgs" id="a2"><img src="images/3.png" ></div>
            <div class="imgs" id="a1"><img src="images/1.png" ></div>
        </div>
    </div>
    </div>
   
    <script>
   
    document.getElementById("explorebutton").addEventListener("click", function() {
        // Navigate to the home page
        window.location.href = "home.php";
    });
</script>

</body>
</html>
