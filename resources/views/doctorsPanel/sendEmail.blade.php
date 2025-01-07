@extends('layout-doctor')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container mt-n5">

            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <div class="card">
                <div class="card-header">Send Email</div>
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

                    <form method="post" action="{{ route('doctorsPanel.EmailSent',$user->id) }}"  >
                        @csrf

                        <div class="row gx-3 mb-3">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="treatment">Email Message</label>
                                <textarea id="name" type="text" name="message" class="form-control" >
                                {{old('message')}}
                                </textarea>
                               
                            </div>

                            <div class="col-md-6" style="margin-top: 35px;">
                                <button type="submit" class="btn btn-primary btn-sm">Send</button>
                            </div>
                        </div>



                         
                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection
