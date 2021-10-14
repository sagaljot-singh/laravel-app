@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @if (!empty($users))
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id ?? '' }}</td>
                <td>{{ $user->name }}</td>
                
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    <td>
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    </td>

                    <td>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                    
                
                </form>
            </tr>
            @endforeach
        @else
            Not Found
        @endif
    </table>
        
@endsection