@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 
   
 
  <style>
    @media print
    {
        #non-printable { display: none; }
        #printable { display: block; }
    }
    footer{
        margin: 0;
    }   
  </style>


<div>
    


    @forelse($invoices as $invoice)

        This is print page 
        fname {{ $invoice->fname }}
        <a href="#" id="print-payment">Print</a>
    @empty

    @endforelse

</div>

@include('../layouts/includes/footer') 
    <script>
        $(document).ready(function() {
 


            $('#print-payment').on('click touchstart', function(e){
                e.preventDefault(); 
                window.print();
            });


            // $('#data-table').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'copyHtml5',
            //         'excelHtml5',
            //         'csvHtml5'
            //     ]
            // });
        });
        </script>
@endsection