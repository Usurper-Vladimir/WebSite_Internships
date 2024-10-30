@extends('layout.navfooter')

@section('content')
<main>
    <section class="infointernships">
        <img src="{{ asset('storage/'.$company->image) }}" alt="Internship Image" >
        <article>
            <h1 id="name">{{ $company->name }}</h1>
            <div class="description">
                <h2>Description:</h2>
                <p>{{ $company->description }}</p> {{-- Retiré le "<" supplémentaire --}}
            </div>
        </article>
        
        <div class="info-container">
            <div class="info-grid">
                <div >
                    <h2>Sector:</h2>
                    <p>{{ $company->sector }}</p>
                </div>
                <!-- Ici commence la boucle pour chaque localisation -->
                @foreach ($company->locations as $location)
                    <div class="location-info">
                        <h3>Location {{ $loop->index + 1 }}:</h3>
                        <p><strong>Country:</strong> {{ $location->country }}</p>
                        <p><strong>City:</strong> {{ $location->city }}</p>
                        <p><strong>Address:</strong> {{ $location->address }}</p>
                        <p><strong>Zip Code:</strong> {{ $location->zip_code }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
