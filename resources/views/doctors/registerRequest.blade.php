@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patients.registerRequest') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Input -->
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            </div>
                        </div>

                        <!-- Age Input -->
                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">Age</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" required autofocus>
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div class="row mb-3">
                            <label for="documents" class="col-md-4 col-form-label text-md-end">{{ __('Upload document') }}</label>
                            <div class="col-md-6">
                            <label class=" btn btn-primary btn-sm me-3" for="documents">choose file</label>
                                <input   style="display: none;" type="file" name="documents" id="documents" class="form-control-file @error('documents') is-invalid @enderror" onchange="updateFileName()" required>
                                <span id="file-name" class="form-text ml-3">No file chosen</span>
                                @error('documents')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
