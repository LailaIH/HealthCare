@extends('layout-doctor')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Main
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif

                        @if (session('done'))

                            <div class="alert alert-success m-3" role="alert">{{ session('done') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                      
                        <div class="card-body">
                         
                            <h4>Welcome to your panel</h4>
                         </div>     
                       
                       

                       
                    </div>
                </div>

        
    </main>







@endsection


