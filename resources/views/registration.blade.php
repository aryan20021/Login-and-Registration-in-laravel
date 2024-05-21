@extends('layout')

@section('title')
Registration Page

@endsection

@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger">{{$error}}</div>

            @endforeach
        </div>
        @endif
    </div>
    <form action="{{route('new.user.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width:500px ">
        @csrf
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" name="name">

        </div>
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email">

          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">

          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection

