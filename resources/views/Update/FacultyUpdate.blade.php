@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">{{ __('Update faculty') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
                    <form method="POST" action="{{route('faculty.edit', $id->id)}}">
                        <div class="col-md-12 mt-3">
                            <div class="border border-dark p-2 mb-2 d-flex justify-content-between"></div>
                                    <div>
                                        <span class="lead">{{ $id->id }}</span>
                                    </div>
                                    <div>
                                        <span class="lead">
                                            @csrf
                                            <input type="text" name="name" value="{{old('name') ? old('name') : $id-> name}}" id="name" class="form-control mb-2"/>
                                            @foreach($errors->get('name') as $err )  <!-- used for printing multiple errors -->
                                            <small class="text-danger">{{ $err }}</small>
                                            @endforeach
                                        </span>
                                    </div>
                                    <div>
                                        <span class="lead">
                                            @csrf
                                            <input type="text" name="email" value="{{old('email') ? old('email') : $id-> email}}" id="email" class="form-control mb-2"/>
                                            @foreach($errors->get('email') as $err )  <!-- used for printing multiple errors -->
                                            <small class="text-danger">{{ $err }}</small>
                                            @endforeach
                                        </span>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-dark btn-block" value="Update"/>
                                    </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <h1 class="text-center display-4">Update Todo</h1>--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <form method="POST" action="{{route('edit', $todoid->id)}}">--}}
{{--                    @csrf--}}
{{--                    <label for="title">Title*</label>--}}
{{--                    <input type="text" name="title" value="{{old('title') ? old('title') : $todoid-> title}}" id="title" class="form-control mb-2"/>--}}
{{--                    @foreach($errors->get('title') as $err )  <!-- used for printing multiple errors -->--}}
{{--                    <small class="text-danger">{{ $err }}</small>--}}
{{--                    @endforeach--}}
{{--                    <input type="submit" class="btn btn-dark btn-block" value="Update"/>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
