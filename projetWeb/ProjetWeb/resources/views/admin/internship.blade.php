@extends('layout.dash')

@section('content')

<div class="main">

        <div class="topbar">
         <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
         </div>

         <div class="search">
            <form action="{{ route('internship.index') }}" method="GET">
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
            <h2 class="pilot-heading">List Internships</h2>
            <button onclick="window.location='{{ route('internship.create') }}'" class="pilot-btn pilot-btn-primary">Add Internship</button>
            <table class="pilot-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Company</th>
                        <th>Competence</th>
                        <th>Location</th>
                        <th>Promotion Type</th>
                        <th>Duration</th>
                        <th>Remuneration</th>
                        <th>Offer Date</th>
                        <th>Available Positions</th>
                        <th>Applicants Count</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internships as $internship)
                    <tr>
                        <td>{{ $internship->title }}</td>
                        <td>{{ $internship->description }}</td>
                        <td>{{ $internship->company->name }}</td> 
                        <td>
                            @foreach ($internship->competences as $competence)
                                <span class="competence-label">{{ $competence->name }}</span>{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </td>
                        <td>{{ $internship->location }}</td>
                        <td>{{ $internship->promotion_type }}</td>
                        <td>{{ $internship->duration }}</td>
                        <td>${{ $internship->remuneration }}</td>
                        <td>{{ $internship->offer_date->format('Y-m-d') }}</td>
                        <td>{{ $internship->available_positions }} slots</td>
                        <td>{{ $internship->applicants_count }}</td>
                        <td><img src="{{ asset('storage/'.$internship->image) }}" alt="Internship Image" class="table-image"></td>
                        

                        <td>
                            <button onclick="location.href='{{ route('internship.show', $internship->id) }}'" class="pilot-btn pilot-btn-view">View</button>
                            <button onclick="window.location='{{ route('internship.edit', $internship->id) }}'" class="pilot-btn pilot-btn-update">Edit</button>
                            <form method="POST" action="{{ url('admin/internship/' . $internship->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="pilot-btn pilot-btn-delete"  onclick="return confirm('Confirm delete?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection
