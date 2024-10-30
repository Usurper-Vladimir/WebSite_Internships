<div class="pilot-form-container">
    <h2 class="pilot-form-heading">Update Pilote</h2>
    <form class="pilot-form" action="{{ route('pilote.update', $user->id) }}" method="POST">
        {!! csrf_field() !!}
        @method('PUT')

        <div class="form-group">
            <label for="pilot-first-name">Nom</label>
            <input type="text" name="Nom" id="Nom" value="{{ $user->nom }}" placeholder="New Nom" required>
        </div>
        <div class="form-group">
            <label for="pilot-last-name">Prénom</label>
            <input type="text" name="Prenom" id="Prenom" value="{{ $user->prenom }}" placeholder="New Prénom" required>
        </div>
        <div class="form-group">
            <label for="pilot-email">Email</label>
            <input type="email" name="Email" id="Email" value="{{ $user->email }}" placeholder="New Email" required>
        </div>
        <div class="form-group">
            <label for="pilot-password">Password</label>
            <input type="password" name="Password" id="Password" value="{{ $user->password }}" placeholder="New Password" required>
        </div>
        <div class="form-group">
            <label for="pilot-center">Center</label>
            <input type="text" name="Center" id="Center" value="{{ $user->centre }}" placeholder="New Center Name" required>
        </div>
        <div class="form-group">
            <label for="pilot-promotion">Promotion</label>
            <input type="text" name="Promotion" id="Promotion" value="{{ $user->promotion }}" placeholder="New Promotion Year" required>
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
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    font-size: 18px;
}

.submit-btn:hover {
    background-color: #0056b3;
}
</style>