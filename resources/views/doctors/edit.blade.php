@extends('layout')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container mt-n5">

            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <div class="card">
                <div class="card-header">Update Doctor</div>
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

                    <form action="{{ route('doctors.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row gx-3 mb-3">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ $doctor->user->name }}" required/>
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ $doctor->user->email }}" readonly/>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row gx-3 mb-3">
                            <!-- Phone Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input id="phone" type="text" name="phone" class="form-control" value="{{ $doctor->user->phone }}" required/>
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Age Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="age">Age</label>
                                <input id="age" type="number" name="age" class="form-control" value="{{ $doctor->user->age }}" required/>
                                @error('age')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                      
                            <div class="row gx-3 mb-3">
                             
                            <div class="col-md-6">

                            <label class="small mb-1" for="is_online">Is online</label>
                            <input id="is_online" type="checkbox"  name="is_online" {{$doctor->user->is_online? 'checked':''}}>

                        </div></div>
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


<script>
    function updateFileName() {
        const fileInput = document.getElementById('documents');
        const fileNameSpan = document.getElementById('file-name');
        if (fileInput.files.length > 0) {
            fileNameSpan.textContent = fileInput.files[0].name;
        } else {
            fileNameSpan.textContent = "No file chosen";
        }
    }
</script>
@endsection
