<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du pilote</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
            
        }

        .card {

            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }

      

        .card-title {
            margin: 0;
            padding-bottom: 20px;
            border-bottom: 2px solid #eaeaea;
            font-size: 20px
        }

        .card-text {
            margin: 10px 0;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <h1>Pilote Details</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" >{{ $user->nom }} {{ $user->prenom }}</h5>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Password: {{ $user->password }}</p>
                    <p class="card-text">Center: {{ $user->centre }}</p>
                    <p class="card-text">Promotion: {{ $user->promotion }}</p>
                </div>
            </div>
        </div>
    </body>
    </html