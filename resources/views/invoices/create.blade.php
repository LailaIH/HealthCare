@extends('layout')

@section('content')

<main>
    <!-- Main page content-->
    <div class="container mt-n5">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <div class="card">
            <div class="card-header">Create Invoice</div>
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

                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf

                    <div class="row gx-3 mb-3">
                        <!-- User Selection Field -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="user_id">User</label>
                            <select id="user_id" name="user_id" class="form-control form-control-solid" required>
                                <option value="">Select a user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Total Field -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="total">Total</label>
                            <input id="total" min="1" type="number" name="total" class="form-control" value="{{ old('total') }}" required/>
                            @error('total')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="row gx-3 mb-3">
                        <!-- Status Selection Field -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="status">Status</label>
                            <select id="status" name="status" class="form-control form-control-solid" required>
                                <option value="">Select status</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                            @error('status')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 33px;">Create</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>

@endsection
