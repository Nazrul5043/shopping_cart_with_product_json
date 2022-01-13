@extends('../layouts.frontend')

@section('title')
  Orders List
@endsection

@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('message'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        
                      <div class="flex-1">
                        <table class="table-auto datatable responsive">
                          <caption><h2>Order List</h2></caption>
                          <thead>
                            <tr>
                              
                              <th> SL </th>
                              <th> Qty </th>
                              <th> Total Amount</th>
                              <th> Status </th>
                              <th> Action </th>
                              
                            </tr>
                          </thead>
                          <tbody>
                              
                          </tbody>
                          <tfoot>
                              
                          </tfoot>
                        </table>

                      </div>
                    </div>
                  </div>
            </div>
        </main>
    @endsection
    @section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
		
    // init datatable.
    var dataTable = $('.datatable').DataTable({
        fixedHeader: {header: true},
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 10,
        order: [[ 0, "desc" ]],
        ajax: '{{ route('get_orders') }}',
        columns: [
            {data: 'DT_RowIndex', name: 'sl', sClass:'text-center'},
            {data: 'qty', name: 'qty', sClass:'text-center'},
            {data: 'total', name: 'total', sClass:'text-center'},
            {data: 'status', name: 'status', sClass:'text-center'},
            {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
        ]
    });

  });

$("#checkout").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ route('cart.checkout') }}",
            data: {"_token": "{{ csrf_token() }}"},
            success: function(response) {
                console.log(response);
                if(typeof(response["success"]) != "undefined" && response["success"] !== null) {
                    location.reload();
					 	}

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                console.log(xhr.responseText);
            } 
                
            });
    });
</script>
@endsection