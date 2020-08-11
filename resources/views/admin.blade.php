@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <div>
                            <a href="{{route('faculty.register')}}" class="btn btn-success">Add</a>
                        </div>
                        <div class="col-md-12 mt-3">
                                <div class="border border-dark p-2 mb-2 d-flex justify-content-between">
                                    <div>
                                        <span class="lead">{{'Staff Id'}}</span>
                                    </div>
                                    <div>
                                        <span class="lead">{{'Name'}}</span>
                                    </div>
                                    <div>
                                        <span class="lead">{{'Email'}}</span>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="text-left">
                                @foreach($faculty as $facultyy)
                                    <div class="border border-dark p-2 mb-2 d-flex justify-content-between">
                                        <div>
                                            <span class="lead">{{ $facultyy->id }}</span>
                                        </div>
                                        <div>
                                            <span class="lead">{{ $facultyy->name }}</span>
                                        </div>
                                        <div>
                                            <span class="lead">{{ $facultyy->email }}</span>
                                        </div>
                                        <div>
                                            <a href="{{route('faculty.update',$facultyy->id)}}" class="btn btn-warning">Update</a>
                                            <form action="{{route('faculty.delete',$facultyy->id)}}" method="POST" class="d-inline-block">
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete"/>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
