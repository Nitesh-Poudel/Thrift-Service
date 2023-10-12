<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Location Selection</title>
</head>
<body>
    <h1>Nepal Location Selection</h1>
    <form>
        <!-- Province Dropdown -->
        <label for="province">Select Province:</label>
        <select id="province">
        <option value="" disabled selected>-- Select provience --</option>
            <option value="koshi">Koshi</option>
            <option value="madesh">Madesh</option>
            <option value="bagmati">Bagmati</option>
            <option value="gandaki">Gandaki</option>
            <option value="lumbini">Lumbini</option>
            <option value="karnali">Karnali</option>
            <option value="sudurpaschim">Sudurpaschim</option>
            

        </select>

        <!-- District Dropdown -->
        <label for="district">Select District:</label>
        <select id="district" disabled>
            <option value="" disabled selected>-- Select District --</option>
        </select>
    </form>

    <script>
        const provinceSelect = document.getElementById("province");
        const districtSelect = document.getElementById("district");

        // Create an object to map provinces to districts
        const districtsByProvince = {
            koshi: ["bhojpur","dhankuta","illam","jhapa","khotang","morang","okheldhunga","panchthar","sankuwasabha", "sunsari","taplejung","udayapur"],
            madesh: ["parsa","bara","rautahat","sarlahi","mahotari","dhanusha","siraha","saptari"],
            bagmati:["bhaktapur","chitwan","dhading","dolakha","kathmandu","kavrepalanchok","lalitpur","makwanpur","nuwakot","ramechhap","rasuwa","sindhuli","sindupalchok"],
            gandaki:["baglung","gorkha","kaski","lamjung","manang","mustang","myagdi","nawalpur"],
            lumbani:["arghakhanchi","banke","bardiya","dang","east-rukum","gulmi","kapilvastu","palpa","parasi","pyuthan","rolpa","rupandehi"],
            karnali:["dailekh","dolpa","humla","jagarkot","kallikot","mugu","salyan","surkhet","west-rukum"],
            sudurpaschim:["achham","baitadi","bajhang","dadeldhura","darchula","doti","kailali","kanchanpur"]

            // Add more provinces and their districts here
        };

        provinceSelect.addEventListener("change", function () {
            // Enable the district dropdown
            districtSelect.disabled = false;

            // Clear existing options
            districtSelect.innerHTML = '<option value="" disabled selected>-- Select District --</option>';

            // Get the selected province
            const selectedProvince = provinceSelect.value;

            // Populate the district dropdown with districts related to the selected province
            districtsByProvince[selectedProvince].forEach((districtName) => {
                const option = document.createElement("option");
                option.value = districtName.toLowerCase().replace(" ", "");
                option.textContent = districtName;
                districtSelect.appendChild(option);
            });
        });
    </script>
</body>
</html>
