@extends('layout-patient')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">My schedules
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($schedules->isEmpty())
                        <div class="card-body">
                         
                            <h4>No schedules</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Doctor's Name</th>
                                        <th>Doctor's Phone</th>
                                        <th>Visiting Type</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>

                                        
                                    
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($schedules  as $schedule )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $schedule->doctor->user->name }}</b></td>

                                            <td> 
                                                {{$schedule->doctor->user->phone}}
                                        </td>
                                            <td> 
                                                {{$schedule->visit_type}}
                                        </td>

                                        <td> 
                                                {{$schedule->date}}
                                        </td>
                                        <td> 
                                                {{$schedule->time}}
                                        </td>

                                        <td>
                                            <span class="badge 
                                                {{ $schedule->status === 'pending' ? 'badge-orange' : '' }} 
                                                {{ $schedule->status === 'approved' ? 'badge-green' : '' }} 
                                                {{ $schedule->status === 'rejected' ? 'badge-red' : '' }} 
                                                {{ $schedule->status === 'finished' ? 'badge-blue' : '' }}">
                                                {{ $schedule->status }}
                                            </span>
                                        </td>

                                    @if($schedule->status==='pending')        
                                        <td>
                                          <form method="post" action="{{route('patientsPanel.deleteMeeting')}}">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                          </form>
                            
                                        </td>
                                    @endif

                                    <td>
                                        @if($schedule->status==='finished')
                                            <a class="btn btn-success btn-sm" href="{{route('meetings.showTreatment',$schedule->treatment->id)}}">show treatment</a>
                                        @endif
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


