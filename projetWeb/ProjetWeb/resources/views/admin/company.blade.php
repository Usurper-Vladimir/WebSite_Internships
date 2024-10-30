@extends('layout.dash')

@section('content')

<div class="main">
    
        <div class="topbar">
            <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <form action="{{ route('company.index') }}" method="GET">
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
            <h2 class="pilot-heading">List Companies</h2>
            <button onclick="window.location='{{ route('company.create') }}'" class="pilot-btn pilot-btn-primary">Add Company</button>
            <table class="pilot-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Sector</th>
                        <th>Locations</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->description }}</td>
                        <td>{{ $company->sector }}</td>
                        <td>
                        @foreach ($company->locations as $location)
                            <p>Country: {{ $location->country }}</p>
                            <p>City: {{ $location->city }}</p>
                            <p>Address: {{ $location->address }}</p>
                            <p>Zip: {{ $location->zip_code }}</p>
                            <p>------------------------------</p>
                        @endforeach
                        </td>
                        <td><img src="{{ asset('storage/'.$company->image) }}" alt="Company Image" class="table-image"></td>
                        <td>
                            <button onclick="location.href='{{ route('companies.show', $company->id) }}'" class="pilot-btn pilot-btn-view">View</button>
                            <button onclick="window.location='{{ route('company.edit', $company->id) }}'"  class="pilot-btn pilot-btn-update">Edit</button>
                            <form method="POST" action="{{ url('admin/company/' . $company->id) }}" accept-charset="UTF-8" style="display:inline">
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
