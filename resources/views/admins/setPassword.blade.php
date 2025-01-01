@extends('layout')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container mt-n5">

            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <div class="card">
                <div class="card-header">Set patient password</div>
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

                    <form action="{{route('admins.acceptPatientAndSetPassword',$user->id)}}" method="POST">
                        @csrf


                        <div class="row gx-3 mb-3">
                            <!-- Password Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control" required/>
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>

                        


                        <div class="row gx-3 " style="margin-top: 30px;">
                            <div class="col-12" >
                                <button type="submit" class="btn btn-primary btn-sm">Set password and send to patient</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection
