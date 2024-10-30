<div class="pilot-form-container">
    <h2 class="pilot-form-heading">Create New Internship</h2>
    <form class="pilot-form" action="{{ url('admin/internship') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="internship-title">Title</label>
            <input type="text" name="title" placeholder="Enter Title" id="title" required>
        </div>
        <div class="form-group">
            <label for="internship-description">Description</label>
            <textarea name="description" placeholder="Enter Description" id="description" required style="font-size: 17px;"></textarea>
        </div>
        <div class="form-group">
            <label for="competences">Compétences</label>
            <select name="competences[]" id="competences" class="select-style" multiple>
                @foreach ($allCompetences as $competence)
                    <option value="{{ $competence->id }}">{{ $competence->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="internship-location">Location</label>
            <input type="text" name="location" placeholder="Enter Location" id="location" required>
        </div>
        <div class="form-group">
            <label for="internship-promotion-type">Promotion Type</label>
            <input type="text" name="promotion_type" placeholder="Enter Promotion Type" id="promotion_type" required>
        </div>
        <div class="form-group">
            <label for="internship-duration">Duration</label>
            <input type="text" name="duration" placeholder="Enter Duration" id="duration" required>
        </div>
        <div class="form-group">
            <label for="internship-remuneration">Remuneration</label>
            <input type="text" name="remuneration" placeholder="Enter Remuneration" id="remuneration" required>
        </div>
        <div class="form-group">
            <label for="internship-offer-date">Offer Date</label>
            <input type="date" name="offer_date" id="internship-offer-date" required>
        </div>
        <div class="form-group">
            <label for="internship-available-positions">Available Positions</label>
            <input type="text" name="available_positions" id="internship-available-positions" min="1" required>
        </div>
        <div class="form-group">
            <label for="internship-applicants-count">Applicants Count</label>
            <input type="text" name="applicants_count" id="internship-applicants-count" min="0" required>
        </div>
        <div class="form-group">
            <label for="internship-company">Company</label>
            <select name="company_id" id="internship-company" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="internship-image">Image</label>
            <div class="custom-file-upload">
              <input type="file" name="image" id="internship-image" required>
              <label for="internship-image" class="file-upload-btn">Choose a file</label>
            </div>
          </div>
        <button type="submit" class="submit-btn">Submit</button>
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