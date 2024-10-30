@extends('layout.navfooter')

@section('content')
<div class="container">
  <div class="sidebar">
    <ul>
      <li><a href="{{ url('account') }}">Personnel Informations</a></li>
      @if(Session::has('loginId') && Session::get('userType') !== 'student')
      <li><a href="{{ url('admin/dashboard') }}" class="dashboard-link">Dashboard</a></li>
      @endif
      <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
      <li><a href="{{ url('logout') }}" class="logout-link">Logout</a></li>
    </ul>
  </div>
  <div class="internship-list2" style="margin-top: 250px">
    @forelse($wishlists as $wishlistItem)
    <div class="internship-card2">
      <img src="{{ asset('storage/'.$wishlistItem->internship->image) }}" alt="Internship Image">
      <div class="internship-info2">
        <h3><a href="{{ route('internships.show', $wishlistItem->internship->id) }}" class="internship-link2">{{ $wishlistItem->internship->title }}</a></h3>
        <!-- Ajoutez ici d'autres détails sur le stage selon votre besoin -->
      </div>
      <form action="{{ route('wishlist.remove', $wishlistItem->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-danger" onclick="return confirm('Are you sure you want to remove this internship from your wishlist?')">Remove</button>
      </form>
    </div>
    @empty
    <p style="text-align: center; position: absolute; top: 40%; left: 52%; transform: translate(-50%, -50%);  font-size: 1.5em; color: #ffffff;">You d'ont have internships in your wishlist</p>
    @endforelse
  </div>
</div>

@endsection