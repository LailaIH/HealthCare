@extends('layout-patient')

@section('content')


    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">{{$category->name}} category's specialties
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($specialties->isEmpty())
                        <div class="card-body">
                         
                            <h4>No specialties belong to this category</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Specialty's Name</th>
                                        <th>Image</th>
                                        <th></th>
                                       
                                    
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($specialties  as $specialty )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                            <td class=" text-black"><b>{{ $specialty->name }}</b></td>

                                            <td> 
                                            @if(isset($specialty->img))
                                            <img src="{{ asset('specialtyImages/'.$specialty->img) }}" alt="Category Picture" width="100" height="100">
                                            @else
                                            <img src="{{ asset('assets/img/noimg.jpg') }}" alt="Category Picture" width="100" height="100">

                                            @endif   
                                        </td>
                                            
                                        <td>
                                            <a class="btn btn-success btn-sm" href="{{route('patientsPanel.showDoctors' , $specialty->id )}}" >   
                                            Show doctors
                                              </a>
                                        

                                        
                                        
                                        </td>
                                     
                                            
                                            <td>
                                          
                           
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


