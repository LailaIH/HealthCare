@extends('layout')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Patients registration requests list
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($users->isEmpty())
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

                                        <th>Patient's Email</th>
                                        
                                        <th>Phone</th>
                                        
                                        <th>Actions</th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users  as $patient )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $patient->name }}</b></td>
                                            <td class=" text-black"><b>{{ $patient->age }}</b></td>


                                            <td class=" text-black"><b>{{ $patient->email }}</b></td>
                                            <td >{{ isset($patient->phone)? $patient->phone: 'no phone stored' }}</td>

                                            

                                            
                                            <td>
                                            <a class="btn btn-success btn-sm" href="{{route('admins.showSetPatientPasswordView' , $patient->id )}}" >   
                                            Accept
                                              </a>
                                        

                                        
                                        
                                        </td>

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

