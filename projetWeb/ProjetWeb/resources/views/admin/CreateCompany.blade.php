<div class="pilot-form-container">
    <h2 class="pilot-form-heading">Create New Company</h2>
    <form class="pilot-form" action="{{ url('admin/company') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="company-name">Name</label>
            <input type="text" name="name" placeholder="Enter Name" id="name" required>
        </div>
        <div class="form-group">
            <label for="company-description">Description</label>
            <textarea name="description" placeholder="Enter Description" id="description" style="font-size: 17px;" required></textarea>
        </div>
        <div class="form-group">
            <label for="company-sector">Sector</label>
            <input type="text" name="sector" placeholder="Enter Sector" id="sector" required>
        </div>

        <div class="form-group">
            <label for="internship-image">Image</label>
            <div class="custom-file-upload">
              <input type="file" name="image" id="internship-image" required>
              <label for="internship-image" class="file-upload-btn">Choose a file</label>
            </div>
          </div>

        <!-- Information de localisation -->
        <div id="locations-container">
            <h2>Location Information</h2>
            <div class="location-group">
                <div class="form-group">
                    <label for="location-country-0">Country</label>
                    <input type="text" name="locations[0][country]" placeholder="Enter Country" id="location-country-0">
                </div>
                <div class="form-group">
                    <label for="location-city-0">City</label>
                    <input type="text" name="locations[0][city]" placeholder="Enter City" id="location-city-0">
                </div>
                <div class="form-group">
                    <label for="location-address-0">Address</label>
                    <input type="text" name="locations[0][address]" placeholder="Enter Address" id="location-address-0">
                </div>
                <div class="form-group">
                    <label for="location-zip_code-0">Zip Code</label>
                    <input type="text" name="locations[0][zip_code]" placeholder="Enter Zip Code" id="location-zip_code-0">
                </div>
            </div>
        </div>
        <button type="button" id="add-location">Add Location</button>

       
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let locationIndex = 1; // Commence à 1 car 0 est déjà utilisé dans le HTML initial
        document.getElementById('add-location').addEventListener('click', function () {
            const container = document.getElementById('locations-container');
            const newLocation = document.createElement('div');
            newLocation.classList.add('location-group');
            newLocation.innerHTML = `
                <div class="form-group">
                    <label for="location-country-${locationIndex}">Country</label>
                    <input type="text" name="locations[${locationIndex}][country]" placeholder="Enter Country" id="location-country-${locationIndex}">
                </div>
                <div class="form-group">
                    <label for="location-city-${locationIndex}">City</label>
                    <input type="text" name="locations[${locationIndex}][city]" placeholder="Enter City" id="location-city-${locationIndex}">
                </div>
                <div class="form-group">
                    <label for="location-address-${locationIndex}">Address</label>
                    <input type="text" name="locations[${locationIndex}][address]" placeholder="Enter Address" id="location-address-${locationIndex}">
                </div>
                <div class="form-group">
                    <label for="location-zip_code-${locationIndex}">Zip Code</label>
                    <input type="text" name="locations[${locationIndex}][zip_code]" placeholder="Enter Zip Code" id="location-zip_code-${locationIndex}">
                </div>
            `;
            container.appendChild(newLocation);
            locationIndex++;
        });
    });
</script>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");
    
    * {
    font-family: "Ubuntu", sans-serif;
     }

     body {
    background: #13072E;
    }

    .pilot-form-container {
    width: 100%;
    max-width: 750px;
    margin: 100px auto;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);
    border-radius: 10px;
    background: #fff;
}

.pilot-form-heading {
    text-align: center;
    margin-bottom: 30px;
}

.pilot-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
    font-size: 20px;
}

.form-group label {
    margin-bottom: 5px;
}

.form-group input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 17px;
}

#add-location {
    background-color: #5DADE2; 
    color: white; 
    padding: 10px 20px; 
    font-size: 16px; 
    border: none; 
    border-radius: 5px;
    cursor: pointer; 
    transition: background-color 0.2s, transform 0.2s; 
    text-align: center; 
    display: inline-block; 
    width: 200px;
}

#add-location:hover {
    background-color: #3498DB; 
    transform: scale(1.05); 
}

#add-location:focus {
    outline: none; 
    box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.5); 
}

.submit-btn {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    transition: background-color 0.2s, transform 0.2s; 
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    font-size: 18px;
}

.submit-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05); 
}

#internship-image {
  display: none;
}

/* Style pour le label personnalisé */
.file-upload-btn {
  display: inline-block;
  padding: 10px 20px;
  cursor: pointer;
  background-color: #5DADE2;
  transition: background-color 0.2s, transform 0.2s; 
  color: #fff;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

/* Changement de couleur au survol */
.file-upload-btn:hover {
    background-color: #3498DB;
    transform: scale(1.05); 
 }
</style>