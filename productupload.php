<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload_Product</title>
    <link rel="stylesheet" href="css/productUpload.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .rightHead .topic {
            text-align: center;
        }
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



                <div class="topic"><h1>Upload your Product<h1></div>
                <div class="form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="upload">
                            <input type="file" class="inputs" name="image" accept="image/*"><br>
                        </div>


                       
                        <div class="select">  
                          <select id="gender">
                              <option value="" disabled selected>-- Select a Gender --</option>
                              <option value="men">Men</option>
                              <option value="women">Women</option>
                              <option value="unisex">Unisex</option>
                              <option value="child">Child</option>
                          </select>
                      </div>


                        <div class="select">
                          
                            <select id="dress-category">
                                <option value="" disabled selected>-- Select a Dress Category --</option>
                            </select>
                        </div>

                        <div class="select">
                           
                            <select id="dress-type">
                                <option value="" disabled selected>-- Select a Dress Type --</option>
                            </select>
                        </div>



                        <div class="select">
                           
                            <select id="season">
                                <option value="" disabled selected>-- Select a Season --</option>
                                <option value="summer">Summer</option>
                                <option value="spring">Spring</option>
                                <option value="autumn">Autumn</option>
                                <option value="winter">Winter</option>
                            </select>
                        </div>

                        <div class="select">
                            
                            <select id="size">
                                <option value="" disabled selected>-- Select a Size --</option>
                                <option value="s">Small</option>
                                <option value="m">Medium</option>
                                <option value="l">Large</option>
                                <option value="xl">Extra Large</option>
                            </select>
                        </div>

                        <div>
                          
                            <input type="text" id="brand" name="brand" placeholder="Brand" required>
                            <input type="number" placeholder="Your price" name="price" id="price">
                        </div>

                        <div>
                           
                            <textarea id="description" name="description" placeholder="Description or Key Words for Searching Purpose" required></textarea>
                        </div>


                        <div>
                          
                        </div>

                        <button type="submit">Upload Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
      
        const dressCategorySelect = document.getElementById('dress-category');
        const dressTypeSelect = document.getElementById('dress-type');

      
        // Define an object that maps dress categories to their respective types
        const dressCategories = {
            men: ['Shirt', 'T-Shirt', 'Pants', 'Jacket', 'Shoes'],
            women: ['Shirt', 'T-Shirt', 'Pants', 'Jacket', 'Shoes', 'Sari', 'Kurta'],
            unisex: ['Shirt', 'T-Shirt', 'Pants', 'Jacket', 'Shoes', 'Dress', 'Hat'],
            child: ['Shirt', 'T-Shirt', 'Pants', 'Jacket', 'Shoes', 'Dress', 'Hat'],
            // Add more dress categories and types as needed
        };

      

        // Function to update the dress category options based on the selected gender
        function updateDressCategoryOptions() {
            // Clear existing options in the dress category select
            dressCategorySelect.innerHTML = '<option value="" disabled selected>-- Select a Dress Category --</option>';

            // Get the selected gender
            const selectedGender = genderSelect.value;

            // If a gender is selected, populate the dress category options accordingly
            if (selectedGender && dressCategories[selectedGender]) {
                dressCategories[selectedGender].forEach(dressCategory => {
                    const option = document.createElement('option');
                    option.text = dressCategory;
                    option.value = dressCategory;
                    dressCategorySelect.appendChild(option);
                });
            }
        }

        // Function to update the dress type options based on the selected dress category
        function updateDressTypeOptions() {
            // Clear existing options in the dress type select
            dressTypeSelect.innerHTML = '<option value="" disabled selected>-- Select a Dress Type --</option>';

            // Get the selected dress category
            const selectedDressCategory = dressCategorySelect.value;

            // If a dress category is selected, populate the dress type options accordingly
            if (selectedDressCategory && dressCategories[selectedGender].includes(selectedDressCategory)) {
                // Dummy dress types, add actual dress types as needed for each dress category
                const dressTypes = ['Type 1', 'Type 2', 'Type 3'];
                dressTypes.forEach(dressType => {
                    const option = document.createElement('option');
                    option.text = dressType;
                    option.value = dressType;
                    dressTypeSelect.appendChild(option);
                });
            }
        }

      
        genderSelect.addEventListener('change', updateDressCategoryOptions);
        dressCategorySelect.addEventListener('change', updateDressTypeOptions);
    </script>
</body>
</html>
