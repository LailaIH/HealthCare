@extends('layout')

@section('content')

<main>
    <!-- Main page content-->
    <div class="container mt-n5">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <div class="card">
            <div class="card-header">Edit Invoice</div>
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

                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row gx-3 mb-3">
                        <!-- User Field (Read-only) -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="user_id">User</label>
                            <input id="user_id" type="text" class="form-control" value="{{ $invoice->user->name }}" readonly/>
                        </div>

                        <!-- Total Field (Read-only) -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="total">Total</label>
                            <input id="total" type="number" class="form-control" value="{{ $invoice->total }}" readonly/>
                        </div>
                    </div>

                    <div class="row gx-3 mb-3">
                        <!-- Status Selection Field -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="paid" {{ $invoice->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="unpaid" {{ $invoice->status === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            </select>
                            @error('status')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 33px;">Update</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>

@endsection
