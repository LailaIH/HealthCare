@extends('layout-patient')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">{{$specialty->name}} specialty's doctors
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($doctors->isEmpty())
                        <div class="card-body">
                         
                            <h4>No doctors belong to this specialty</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Doctor's Name</th>
                                        <th>Doctor's Email</th>
                                        <th>Doctor's Phone</th>
                                        <th>Is Online</th>
                                        <th></th>
                                       
                                    
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($doctors  as $doctor )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $doctor->user->name }}</b></td>
                                            <td class=" text-black"><b>{{ $doctor->user->email }}</b></td>

                                            <td> 
                                            {{ $doctor->user->phone ?? 'no phone' }}
                                            </td>
                                            
                                        <td>
                                                <span class="badge {{ $doctor->user->is_online ? 'badge-green' : 'badge-red' }}">
                                                    {{ $doctor->user->is_online ? 'Online' : 'Offline' }}
                                                    </span>
                 
                                            </td>
                                     
                                            
                                            <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('patientsPanel.showRequestMeetingView',$doctor->id)}}" >   
                                            Request a meeting
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


