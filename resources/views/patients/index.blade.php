@extends('layout')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Patients List
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($patients->isEmpty())
                        <div class="card-body">
                         
                            <h4>No patients</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Patient's Name</th>
                                        <th>Patient's Email</th>
                                        <th>Patient's Age</th>
                                        <th>Phone</th>
                                        <th>Is Online</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($patients  as $patient )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $patient->user->name }}</b></td>

                                            <td class=" text-black"><b>{{ $patient->user->email }}</b></td>
                                            <td >{{ $patient->user->age }}</td>
                                            <td >{{ $patient->user->phone }}</td>

                                            

                                            <td>
                                                <span class="badge {{ $patient->user->is_online ? 'badge-green' : 'badge-red' }}">
                                                    {{ $patient->user->is_online ? 'Online' : 'Offline' }}
                                                    </span>
                 
                                            </td>
                                            
                                            <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('patients.edit' , $patient->id )}}" >   
                                            Edit
                                              </a>
                                        

                                        
                                        
                                        </td>

                                   <td>
                                        @if(isset($patient->documents))
                                            <a href="{{ route('patients.showDocuments', ['id' => $patient->id]) }}?{{ \Carbon\Carbon::now()->timestamp }}" class="btn btn-success btn-sm text-white" target="_blank">Download Document</a>
                                        @else
                                        No document
                                        @endif
                                    </td>

                                        <td>
                                            <form method="post" action="{{route('patients.delete',$patient->user->id)}}">
                                                @csrf 
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" 
                                                        onclick="return confirm('Are you sure you want to delete this patient?');">
                                                        Delete
                                                </button>          
                                                 </form>
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


