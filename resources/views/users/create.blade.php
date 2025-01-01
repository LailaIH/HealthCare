@extends('layout')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container mt-n5">

            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <div class="card">
                <div class="card-header">@yield('form-title')</div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="@yield('form-action')" method="POST">
                        @csrf

                        <div class="row gx-3 mb-3">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required/>
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required/>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Password Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control" required/>
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Password Confirmation Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required/>
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Phone Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input id="phone" type="text" name="phone" class="form-control" value="{{ old('phone') }}" required/>
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Age Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="age">Age</label>
                                <input id="age" type="number" name="age" class="form-control" value="{{ old('age') }}" required/>
                                @error('age')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6" >
                                <button type="submit" class="btn btn-primary btn-sm">Create</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection
