@extends('layout')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Patients approved meeting requests list
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($requests->isEmpty())
                        <div class="card-body">
                         
                            <h4>No requests</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Patient's Name</th>
                                        <th>Patient's Age</th>

                                        
                                        <th>Doctor</th>
                                        <th>Visiting type</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        
                                        
                                        <th></th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($requests  as $request )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $request->patient->user->name }}</b></td>
                                            <td class=" text-black"><b>{{ $request->patient->user->age }}</b></td>


                                            <td class=" text-black"><b>{{$request->doctor->user->name }}</b></td>
                                            <td >{{ $request->visit_type }}</td>
                                            <td >{{ $request->date }}</td>
                                            <td >{{ $request->time }}</td>


                                            

                                           
                                        

                                        
                                        
                                       


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endif

                       
                    </div>
                </div>

        
    </main>





<script>
    let table = new DataTable('#myTable', {
        ordering: false // Disable DataTables' default ordering
    });
</script>


@endsection


