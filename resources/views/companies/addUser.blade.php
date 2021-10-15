@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Users</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   
<form action="{{ url('add/users/') }}" method="POST">
    @csrf

    @if ($users)

        <input type="hidden" name="company_id" value="{{ $companyId }}" />

        @foreach ($users as $user)
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="user_ids[]" value="{{ $user->id }}" id="{{ $user->name }}">
                    <label class="form-check-label" for="{{ $user->name }}">
                        {{ $user->name }}
                    </label>
                </div>
            </div>
        @endforeach
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    @else
        <h1> No Users to display </h1>  
    @endif
   
</form>
@endsection