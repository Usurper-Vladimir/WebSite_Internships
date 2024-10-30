<form action="{{ route('postule.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if(request()->has('internship_id'))
  <input type="hidden" name="internship_id" value="{{ request()->internship_id }}">
  @endif

  <h2>Motivation Letter</h2>
  <textarea name="lettre_motivation"></textarea>

  <div class="file-upload-container">
    <h2>Add your CV</h2>
    <input type="file" name="cv" class="file-upload">
  </div>

  <div class="submit-container">
    <button type="submit">Postuler</button>
  </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (Session::has('error'))
  <script>
     Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ Session::get('error') }}",
     });
  </script>
  @endif
  
  @if (Session::has('success'))
  <script>
     Swal.fire({
        icon: "success",
        title: "Success!",
        text: "{{ Session::get('success') }}",
     });
  </script>
  @endif



<style>
 @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

* {
font-family: "Ubuntu", sans-serif;
 }
  body{
  background: #13072E;
  }
    
  form {
  background: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 600px;
  margin: 300px auto; 
}

form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px; 
  border-radius: 5px;
  border: 1px solid #ddd; 
}

form input[type="file"] {
  width: 350px;
  padding: 10px;
  margin-bottom: 10px; 
  border-radius: 5px;
  border: 1px solid #ddd; 
}

form textarea {
  height: 200px; 
  resize: vertical; 
  font-size: 18px;
}

form button[type="submit"] {
  background-color: #13072e; 
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 20px ;
}


form button[type="submit"]:hover {
}

</style>