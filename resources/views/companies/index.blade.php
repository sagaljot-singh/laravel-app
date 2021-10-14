@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Companies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Add Users</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->id ?? '' }}</td>
            <td>{{ $company->name }}</td>
            
            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                <td><a class="btn btn-warning" href="{{ route('companies.show',$company->id) }}">Add User</a></td>
                <td>
                    <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                </td>

                <td>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </td>
                
            
            </form>
        </tr>
        @endforeach
    </table>
  
      
@endsection