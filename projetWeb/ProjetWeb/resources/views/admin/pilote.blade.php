
@extends('layout.dash')

@section('content')

        <!-- ========================= Main ==================== -->
        <div class="main">

              <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                  <form action="{{ route('pilote.index') }}" method="GET">
                      <label>
                          <input type="text" name="search" placeholder="Search here" value="{{ request('search') }}">
                          <button type="submit">
                              <ion-icon name="search-outline"></ion-icon>
                          </button>
                      </label>
                  </form>
                </div>
              </div>

               
                <div class="pilot-crud-container">
                  <h2 class="pilot-heading">List Pilots</h2>
                  <button onclick="window.location='{{ route('pilote.create') }}'" class="pilot-btn pilot-btn-primary">Add Pilot</button>              
                  <table class="pilot-table">
                      <thead>
                          <tr>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Center</th>
                              <th>Promotion</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->nom }}</td> <!-- Remplacez par les noms de colonnes appropriés -->
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>*********</td>
                            <td>{{ $user->centre }}</td> <!-- Exemple, ajustez selon votre modèle -->
                            <td>{{ $user->promotion }}</td>
                              <td>
                                <button onclick="location.href='{{ route('pilote.show', $user->id) }}'" class="pilot-btn pilot-btn-view">View</button>
                                <button onclick="window.location='{{ route('pilote.edit', $user->id) }}'" class="pilot-btn pilot-btn-update">Edit</button>
                                <form method="POST" action="{{ url('admin/pilote/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="pilot-btn pilot-btn-delete"  onclick="return confirm('Confirm delete?')">
                                      Delete
                                  </button>
                              </form>
                              </td>
                          </tr>
                          @endforeach
                          
                          <!-- More rows would be added here dynamically -->
                      </tbody>
                  </table>
              </div>
                
          </div>

 @endsection

 