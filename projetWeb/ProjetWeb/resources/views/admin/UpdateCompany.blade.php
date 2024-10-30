<div class="pilot-form-container">
    <h2 class="pilot-form-heading">Edit Company</h2>
    <form class="pilot-form" action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method('PUT')

        <div class="form-group">
            <label for="company-name">Name</label>
            <input type="text" name="name" id="name" value="{{ $company->name }}" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label for="company-description">Description</label>
            <textarea name="description" id="description" placeholder="Enter Description" style="font-size: 17px;" required>{{ $company->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="company-sector">Sector</label>
            <input type="text" name="sector" id="sector" value="{{ $company->sector }}" placeholder="Enter Sector" required>
        </div>

        <div class="form-group image-upload-group">
            @if($company->image)
                <img src="{{ asset('storage/'.$company->image) }}" alt="Internship Image" class="preview-image">
            @endif
            <label for="internship-image" class="image-upload-btn">Choose a file</label>
            <input type="file" name="image" id="internship-image" class="image-upload-input">
        </div>

        <!-- Information de localisation -->
        <div id="locations-container">
            <h2>Location Information</h2>
            @foreach($company->locations as $index => $location)
            <div class="location-group">
                <!-- Champ caché pour l'ID de la localisation -->
                <input type="hidden" name="locations[{{ $index }}][id]" value="{{ $location->id }}">
                <div class="form-group">
                    <label for="location-country-{{ $index }}">Country</label>
                    <input type="text" name="locations[{{ $index }}][country]" id="location-country-{{ $index }}" value="{{ $location->country }}" placeholder="Enter Country">
                </div>
                <div class="form-group">
                    <label for="location-city-{{ $index }}">City</label>
                    <input type="text" name="locations[{{ $index }}][city]" id="location-city-{{ $index }}" value="{{ $location->city }}" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label for="location-address-{{ $index }}">Address</label>
                    <input type="text" name="locations[{{ $index }}][address]" id="location-address-{{ $index }}" value="{{ $location->address }}" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="location-zip_code-{{ $index }}">Zip Code</label>
                    <input type="text" name="locations[{{ $index }}][zip_code]" id="location-zip_code-{{ $index }}" value="{{ $location->zip_code }}" placeholder="Enter Zip Code">
                </div>
            </div>
            @endforeach
        </div>

        <button type="submit" class="submit-btn">Update</button>
    </form>
</div>


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

.submit-btn {
    padding: 10px 15px;
    background-color: #007bff;
    transition: background-color 0.2s, transform 0.2s; 
    color: white;
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
.form-group.image-upload-group {
    display: flex;
    gap: 10px; /* Espace entre l'image et le bouton */
}

.image-upload-input {
    display: none; /* Masquer l'input d'origine */
}

.image-upload-btn {
    padding: 10px 20px;
    color: #fff;
    background-color: #5DADE2;
    transition: background-color 0.2s, transform 0.2s; 
    border: none;
    width: 117px;
    border-radius: 5px;
    cursor: pointer;
   
}

.image-upload-btn:hover {
    background-color: #3498DB;
    transform: scale(1.05); 
}

.preview-image {
    max-width: 200px; 
    max-height: 100px; 
    width: auto; 
    height: auto; 
    
}
</style>