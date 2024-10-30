@extends('layout.navfooter')

@section('content')

<!-- Barre de Recherche et Filtres -->
<form action="{{ route('internships.index') }}" method="GET" >
  <div class="search-container">
    <div class="input-wrapper">
      <button class="icon"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="25px" width="25px">
          <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"></path>
          <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M22 22L20 20"></path>
        </svg>
      </button>
      <input placeholder="Rechercher par titre, compétences, localité..." class="input" name="search" type="text">
    </div>
</div>
</form>


<div class="internship-list">
    

    @foreach ($internships as $internship)
    <div class="internship-card">
       
        <img src="{{ asset('storage/'.$internship->image) }}" alt="Internship Image" >
        
        <div class="internship-info">
            <h3><a href="{{ route('internships.show', $internship->id) }}" class="internship-link">{{ $internship->title }}</a></h3>
            <p>Description: {{ $internship->description }}</p>
        </div>
    </div>
@endforeach

 
</div>

@endsection