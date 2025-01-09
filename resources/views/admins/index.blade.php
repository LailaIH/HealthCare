@extends('layout')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Admins List
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($admins->isEmpty())
                        <div class="card-body">
                         
                            <h4>No admins</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Admin's Name</th>
                                        <th>Admin's Email</th>
                                        
                                        <th>Phone</th>
                                        <th>Is Online</th>
                                        <th></th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($admins  as $admin )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $admin->name }}</b></td>

                                            <td class=" text-black"><b>{{ $admin->email }}</b></td>
                                            <td >{{ isset($admin->phone)? $admin->phone: 'no phone stored' }}</td>

                                            

                                            <td>
                                                <span class="badge {{ $admin->is_online ? 'badge-green' : 'badge-red' }}">
                                                    {{ $admin->is_online ? 'Online' : 'Offline' }}
                                                    </span>
                 
                                            </td>
                                            
                                            <td>
                                        @if(auth()->user()->id === $admin->id)
                                            <a class="btn btn-primary btn-sm" href="{{route('admins.edit' , $admin->id )}}" >   
                                            Edit
                                              </a>
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


