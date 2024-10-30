@extends('layout.navfooter')

@section('content')

<!-- Barre de Recherche et Filtres -->
<form action="{{ route('companies.index') }}" method="GET">
  <div class="search-container">
    <div class="input-wrapper">
      <button class="icon"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="25px" width="25px">
          <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"></path>
          <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M22 22L20 20"></path>
        </svg>
      </button>
      <input placeholder="Rechercher par nom, secteur, ville, etc..." class="input" name="search" type="text">
    </div>
    </div>
  </div>
</form>


<!-- Liste des Stages -->
<div class="company-list">
  @foreach ($companies as $company)
      <div class="company-card">
          <!-- Remplacer 'image/nvidia.webp' par le chemin d'image stocké dans la base de données pour chaque entreprise -->
          <img src="{{ asset('storage/'.$company->image) }}" alt="Company Image" >
          <div class="company-info">
              <h3><a href="{{ route('companies.show', $company->id) }}" class="companies-link">{{ $company->name }}</a></h3>
              <p>Description: {{ $company->description }}</p>
          </div>
      </div>
  @endforeach
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
      // Select all internship cards
      const internshipCards = document.querySelectorAll('.company-card');
    
      // Loop through each card and append the rating system
      internshipCards.forEach((card, index) => {
        const ratingContainer = document.createElement('div');
        ratingContainer.classList.add('rating');
    
        // Generate 5 stars for each card
        for (let i = 5; i >= 1; i--) {
          const starInput = document.createElement('input');
          starInput.setAttribute('type', 'radio');
          starInput.setAttribute('id', `star${i}-${index}`);
          starInput.setAttribute('name', `rating-${index}`);
          starInput.value = i;
    
          const starLabel = document.createElement('label');
          starLabel.setAttribute('for', `star${i}-${index}`);
          
    
          // Append the star to the rating container
          ratingContainer.appendChild(starInput);
          ratingContainer.appendChild(starLabel);
    
          // Optional: Add event listener if you want to capture the rating value when a star is clicked
          starInput.addEventListener('click', function() {
            console.log(`Rating for card ${index + 1}: ${this.value}`);
          });
        }
    
        // Append the rating system to the card
        card.appendChild(ratingContainer);
      });
    });
    </script>
@endsection