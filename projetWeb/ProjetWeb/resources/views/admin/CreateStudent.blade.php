<div class="pilot-form-container">
    <h2 class="pilot-form-heading">Create New Student</h2>
    <form class="pilot-form"  action="{{ url('admin/student') }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="pilot-first-name">Nom</label>
            <input type="text" name="Nom" placeholder="Enter Nom" >
        </div>
        <div class="form-group">
            <label for="pilot-last-name">Prénom</label>
            <input type="text" name="Prenom" placeholder="Enter Prénom" >
        </div>
        <div class="form-group">
            <label for="pilot-email">Email</label>
            <input type="email" name="Email" placeholder="Enter Email" >
        </div>
        <div class="form-group">
            <label for="pilot-email">Password</label>
            <input type="password" name="Password" placeholder="Enter Password" >
        </div>
        <div class="form-group">
            <label for="pilot-center">Center</label>
            <input type="text" name="Center" placeholder="Enter Center Name" >
        </div>
        <div class="form-group">
            <label for="pilot-promotion">Promotion</label>
            <input type="text" name="Promotion" placeholder="Enter Promotion Year" >
        </div>
        <button type="submit" class="submit-btn">Submit</button>
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
    max-width: 600px;
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
</style>