@extends('layout-doctor')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container mt-n5">

            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <div class="card">
                <div class="card-header">Add treatment and invoice</div>
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

                    <form action="{{route('doctorsPanel.addTreatmentAndInvoice',$meeting->id)}}" method="POST">
                        @csrf

                        <div class="row gx-3 mb-3">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="treatment">Treatment</label>
                                <textarea id="name" type="text" name="treatment" class="form-control" required>
                                {{ old('treatment') }}
                                </textarea>
                                @error('treatment')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="total">Invoice</label>
                                <input id="total" type="number" name="total" class="form-control" value="{{ old('total') }}" required/>
                                @error('total')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

         

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6" >
                                <button type="submit" class="btn btn-primary btn-sm">Finish</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection
