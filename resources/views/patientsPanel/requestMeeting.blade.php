@extends('layout-patient')

@section('content')
<main>
    <!-- Main page content-->
    <div class="container mt-n5">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <div class="card">
            <div class="card-header">Request a Meeting Between <span style="color: red;">9:00 AM and 8:00 PM</span></div>
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

                <form action="{{ route('patientsPanel.requestMeeting',$doctor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Visit Type -->
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="visit_type">Visit Type</label>
                            <select id="visit_type" name="visit_type" class="form-control" required>
                                <option value="" disabled selected>Select Visit Type</option>
                                <option value="appointment" {{ old('visit_type') == 'appointment' ? 'selected' : '' }}>Appointment</option>
                                <option value="follow-up" {{ old('visit_type') == 'follow-up' ? 'selected' : '' }}>Follow-up</option>
                            </select>
                            @error('visit_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div class="col-md-6">
                            <label class="small mb-1" for="date">Date</label>
                            <input 
                                id="date" 
                                type="date" 
                                name="date" 
                                class="form-control" 
                                value="{{ old('date') }}" 
                                min="{{ date('Y-m-d') }}" 
                                required 
                            />                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Time -->
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="time">Time</label>
                            <input id="time" type="time" name="time" class="form-control" value="{{ old('time') }}" min="09:00" max="20:00" required />
                            @error('time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                   

                    
                        <div class="col-md-6" style="margin-top: 35px;">
                            <button type="submit" class="btn btn-primary btn-sm">Request Meeting</button>
                        </div>
                        </div>


                    
                </form>

            </div>
        </div>
    </div>
</main>
@endsection
