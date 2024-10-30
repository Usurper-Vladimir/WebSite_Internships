@extends('layout.navfooter')

@section('content')
<div class="container">
  <div class="sidebar">
    <ul>
      <li><a href="{{ url('account') }}">Personnel Informations</a></li>

      @if(isset($data) && $data->type !== 'student')
      <li><a href="{{ url('admin/dashboard') }}" class="dashboard-link">Dashboard</a></li>
      @endif

      @if(isset($data) && $data->type !== 'pilote')
      <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
      @endif
      
      <li><a href="{{ url('logout') }}" class="logout-link">LogOut</a></li>
    </ul>
  </div>
  
  <div class="main-content">
    <div class="info">
        <p>Nom: {{ $data->nom }}</p> 
        <p>Prénom: {{ $data->prenom }}</p>
        <p>E-mail: {{ $data->email }}</p>
        <p>Center: {{ $data->centre }}</p>
        <p>Promotion: {{ $data->promotion }}</p>
    </div>
  </div>
</div>

@endsection