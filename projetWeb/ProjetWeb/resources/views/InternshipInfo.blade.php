@extends('layout.navfooter')

@section('content')
<main>
    
    <section class="infointernships">
        <img src="{{ asset('storage/'.$internship->image) }}" alt="Internship Image" >
        <article>
            <h1 id="name">{{ $internship->title }}</h1>
            <div class="description">
                <h2>Description:</h2>
                <p>{{ $internship->description }}</p>
            </div>
        </article>
        
        @if(session('userType') !== 'pilote')
    <div class="action-buttons">
        <!-- Formulaire pour ajouter à la wishlist -->
        <form action="{{ route('wishlist.add') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="internship_id" value="{{ $internship->id }}">
            <button type="submit" class="btn wishlist-btn">Add to Wishlist</button>
        </form>
        <a href="/postule?internship_id={{ $internship->id }}" class="btn apply-btn">Apply</a>
    </div>
    @endif

        <br>
        
        <div class="info-container">
            <div class="info-grid">
                <div>
                    <h2>Competence:</h2>
                    
                    @foreach ($internship->competences as $competence)
                        <li>{{ $competence->name }}</li>
                    @endforeach
                   
                </div>
                <div>
                    <h2>Location:</h2>
                    <p>{{ $internship->location }}</p>
                </div>
                <div>
                    <h2>Company:</h2>
                    <p>{{ $internship->company->name }}</p>
                </div>
                <div>
                    <h2>Promotion Types:</h2>
                    <p>{{ $internship->promotion_type }}</p>
                </div>
                <div>
                    <h2>Duration:</h2>
                    <p>{{ $internship->duration }}</p>
                </div>
                <div>
                    <h2>Remuneration:</h2>
                    <p>${{ $internship->remuneration }} per month</p>
                </div>
                <div>
                    <h2>Offer Date:</h2>
                    <p>{{ $internship->offer_date }}</p>
                </div>
                <div>
                    <h2>Available Slots:</h2>
                    <p>{{ $internship->available_positions }} slots</p>
                </div>
                <div>
                    <h2>Internship Applications:</h2>
                    <p>{{ $internship->applicants_count }}</p>
                </div>
            </div>
        </div>
    </section>
</main>

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


@endsection
