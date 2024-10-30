
<div class="pilot-form-container">
    <h2 class="pilot-form-heading">Edit Internship</h2>
    <form class="pilot-form" action="{{ route('internship.update', $internship->id) }}" method="POST" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        @method('PUT')

        <div class="form-group">
            <label for="internship-title">Title</label>
            <input type="text" name="title" id="title" value="{{ $internship->title }}" placeholder="Enter Title" required>
        </div>

        <div class="form-group">
            <label for="internship-description">Description</label>
            <textarea name="description" id="description" placeholder="Enter Description" style="font-size: 17px;" required>{{ $internship->description }} </textarea>
        </div>

        <div class="form-group">
            <label for="competences">Compétences</label>
            <select name="competences[]" id="competences" class="select-style" multiple>
                @foreach ($allCompetences as $competence)
                    <option value="{{ $competence->id }}" {{ $internship->competences->contains($competence->id) ? 'selected' : '' }}>
                        {{ $competence->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="internship-location">Location</label>
            <input type="text" name="location" id="location" value="{{ $internship->location }}" placeholder="Enter Location" required>
        </div>

        <div class="form-group">
            <label for="internship-promotion-type">Promotion Type</label>
            <input type="text" name="promotion_type" id="promotion_type" value="{{ $internship->promotion_type }}" placeholder="Enter Promotion Type" required>
        </div>

        <div class="form-group">
            <label for="internship-duration">Duration</label>
            <input type="text" name="duration" id="duration" value="{{ $internship->duration }}" placeholder="Enter Duration" required>
        </div>

        <div class="form-group">
            <label for="internship-remuneration">Remuneration</label>
            <input type="text" name="remuneration" id="remuneration" value="{{ $internship->remuneration }}" placeholder="Enter Remuneration" required>
        </div>

        <div class="form-group">
            <label for="internship-offer-date">Offer Date</label>
            <input type="date" name="offer_date" id="internship-offer-date" value="{{ $internship->offer_date->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="internship-available-positions">Available Positions</label>
            <input type="number" name="available_positions" id="internship-available-positions" value="{{ $internship->available_positions }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="internship-applicants-count">Applicants Count</label>
            <input type="number" name="applicants_count" id="internship-applicants-count" value="{{ $internship->applicants_count }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="internship-company">Company</label>
            <select name="company_id" id="internship-company" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $internship->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group image-upload-group">
            @if($internship->image)
                <img src="{{ asset('storage/'.$internship->image) }}" alt="Internship Image" class="preview-image">
            @endif
            <label for="internship-image" class="image-upload-btn">Choose a file</label>
            <input type="file" name="image" id="internship-image" class="image-upload-input">
        </div>

        <button type="submit" class="submit-btn">Update</button>
    </form>
</div>



<style>
    @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        #internship-company {
    width: 100%; /* Adaptez la largeur selon vos besoins */
    padding: 10px 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Un peu d'ombre pour du relief */
    font-size: 16px;
    color: #333;
    appearance: none;         
    position: relative;
    }


    .select-style {
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    outline: none; 
    }

    .select-style option {
    padding: 5px;
    
    }
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