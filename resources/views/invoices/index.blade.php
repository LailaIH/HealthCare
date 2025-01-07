@extends('layout')

@section('content')

<style>
    .badge-large {
    font-size: 1em; /* Larger font size */
    padding: 2px 6px; /* More padding for better appearance */
    border-radius: 5px; /* Optional: rounded corners */
}

</style>
    <main>


        <!-- Main page content-->
        <div class="container mt-n5">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Invoices
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($invoices->isEmpty())
                        <div class="card-body">
                         
                            <h4>No invoices</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        <th>Patient's Name</th>
                                        <th>Patient's Phone</th>

                                        <th>Totla</th>
                                        <th>Status</th>
                                        
                                        <th>Created Date</th>
                                        <th></th>
                                        <th></th>
                              

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($invoices  as $invoice )
                                        <tr style="white-space: nowrap; font-size: 14px;">
                                        <td class=" text-black"><b>{{ $invoice->user->name }}</b></td>
                                        <td class=" text-black"><b>{{ $invoice->user->phone }}</b></td>


                                            <td class=" text-green"><b>${{ $invoice->total }}</b></td>

                                       
                                            <td>
                                                <span class="badge 
                                                    {{ $invoice->status === 'paid' ? 'badge-green' : '' }} 
                                                    {{ $invoice->status === 'unpaid' ? 'badge-red' : '' }}
                                                     badge-large">
                                                    {{ $invoice->status }}
                                                </span>
                                            </td>


                                        <td>
                                        {{ $invoice->created_at->format('d/m/Y') }}

                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('invoices.edit',$invoice->id)}}">Edit</a>
                                        </td>

                                        <td>
                                        <form action="{{route('invoices.delete',$invoice->id)}}" method="POST" onsubmit="return confirmDelete()">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this invoice?");
    }
</script>

@endsection


