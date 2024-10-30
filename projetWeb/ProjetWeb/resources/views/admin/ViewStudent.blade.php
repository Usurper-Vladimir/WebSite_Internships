<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étudiant</title>
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

        .internship-card {
            background-color: #2D0F5E;
            border-radius: 20px;
            margin-bottom: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 37%;
            color: #ffffff;
            box-shadow: 0 5px 15px rgba(0,0,0,2);
        }

        .internship-card img {
            width: 100%; 
            border-radius: 10px; 
             height: 300px
        }

        .internship-info {
            padding: 1rem;
        }

        .internship-info h3 {
            text-align: center;
            padding: 0.5rem;
            font-size: 22px
        }
        .internship-info p {
            text-align: center;
            padding: 0.5rem;
            font-size: 18px;
        }

        .internship-link {
            color: white;
            text-decoration: none;
            transition: transform 0.3s ease-in-out, font-weight 0.3s ease, text-shadow 0.3s ease; /* Smooth transitions */
            display: inline-block; /* Allows transformation */
        }

        .motivation-letter {
        max-height: 150px; 
        overflow-y: auto; 
        margin: 10px 0; 
        padding: 10px;
        
        border: 1px solid #ddd;
        border-radius: 5px; 
}

        .internship-link:hover {
            text-decoration: underline;
            transform: scale(1.2); 
        }

        .cvlink{
            color: white;
        }

        @media (max-width: 768px) {
            .internship-card {
                width: calc(50% - 2rem);
            }
        }

        @media (max-width: 480px) {
            .internship-card {
                width: 100%;
            }
        }

        ::-webkit-scrollbar {
    display: none;
}


    </style>
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" >{{ $user->nom }} {{ $user->prenom }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">Password: {{ $user->password }}</p>
                <p class="card-text">Center: {{ $user->centre }}</p>
                <p class="card-text">Promotion: {{ $user->promotion }}</p>
            </div>
        </div>
        <h1>Applied Internships</h1>
        <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 1rem;">
            
            @if($user->internships->isNotEmpty())
                @foreach($user->internships as $internship)
                    <div class="internship-card">
                        @if($internship->image)
                            <img src="{{ asset('storage/'.$internship->image) }}" alt="Internship Image">
                        @endif
                        <div class="internship-info">
                            <h3><a href="{{ route('internships.show', $internship->id) }}" class="internship-link">{{ $internship->title }}</a></h3>
                            <p>Lettre de Motivation:</p>
                            <blockquote class="motivation-letter">{{ $internship->pivot->lettre_motivation }}</blockquote>
                            <p>CV: <a href="{{ asset('storage/'.$internship->pivot->cv) }}" class="cvlink" download>Download CV</a></p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Cet étudiant n'a postulé à aucun stage.</p>
            @endif
        </div>
    </div>
</body>
</html



