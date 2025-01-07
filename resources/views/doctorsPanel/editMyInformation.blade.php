@extends('layout-doctor')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container mt-n5">

            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <div class="card">
                <div class="card-header">Update my information</div>
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

                    <form action="{{ route('doctorsPanel.updateMyInformation') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row gx-3 mb-3">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}" required/>
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ $user->email }}" readonly/>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row gx-3 mb-3">
                            <!-- Phone Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input id="phone" type="text" name="phone" class="form-control" value="{{ $user->phone }}" required/>
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Age Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="age">Age</label>
                                <input min="1" id="age" type="number" name="age" class="form-control" value="{{ $user->age }}" required/>
                                @error('age')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                       
                          
                        <div class="row gx-3 mb-3">

                            <div class="col-md-6" >
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>



@endsection
