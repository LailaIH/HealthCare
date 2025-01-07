@extends('layout-patient')

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
                    <div class="card-header">My invoices
                   
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

                                        
                                        <th>Totla</th>
                                        <th>Status</th>
                                        
                                        <th>Created Date</th>
                              

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($invoices  as $invoice )
                                        <tr style="white-space: nowrap; font-size: 14px;">
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


