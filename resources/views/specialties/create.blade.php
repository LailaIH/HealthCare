@extends('layout')
@section('content')

<main>


        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif 


                  <div class="row m-5">
                            <div class="col-xl-4">
                                <!-- Category picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Specialty Image</div>
                                    <div class="card-body text-center">
                                        <!-- Category image-->
                                        <img id="category-image" width="160" height="160" class="img-account-profile  mb-1" src="{{ asset('assets/img/noimg.jpg') }}" alt="main pic" />
                                       
                                        <form  method="POST" action="{{ route('specialties.store') }}" enctype="multipart/form-data" id="image-form">
                                        @csrf
                                       
                                        <label for="img" class="btn btn-primary btn-sm">
                                            Upload New Image
                                        </label>
                                        <input style="display: none;" type="file" name="img" id="img" class="form-control-file" multiple onchange="updateImage(event);">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Specialty details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                <label class="small mb-1" for="phone">Name</label>

                                                    <input name="name" class="form-control"  type="text"  value="{{ old('name') }}" required />
                                                  
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="name">Category</label>
                                                    <select name="category_id" id="category_id" class="form-control form-control-solid" required>
                                                                <option value="" >Select a category </option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                           
                                            <div class="row gx-3 mb-3">
                                            <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Create</button></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

</main>

<script>
    function updateImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('category-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit form after selecting image
    }
</script>
@endsection                       