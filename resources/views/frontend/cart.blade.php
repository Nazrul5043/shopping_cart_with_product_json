@extends('../layouts.frontend')

@section('title')
    Cart Details
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
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qty</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Total</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                <a href="{{ route('product', ['product_id' => $item->id]) }}">
                                  <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('product', ['product_id' => $item->id]) }}">
                                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                  
                                </a>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                    <span class="text-sm font-medium lg:text-base">
                                        ${{ $item->quantity }}
                                    </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    $
                                  @php 
                                    echo $item->price * $item->quantity;
                                  @endphp

                                  </span>

                              </td>
                              
                            </tr>
                            @endforeach
                             
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td colspan="2" class="hidden text-right md:table-cell"><span class="text-sm font-medium lg:text-base">Total:</span></td>
                                  <td class="hidden text-right md:table-cell"><span class="text-sm font-medium lg:text-base">{{Cart::getTotalQuantity()}}</span></td>
                                  <td></td>
                                  <td  class="hidden text-right md:table-cell"><span class="text-sm font-medium lg:text-base">${{ Cart::getTotal() }}</span></td>
                                  
                              </tr>
                          </tfoot>
                        </table>
                        
                        

                        <div>
                        @if (Auth::check() )
                            
                            <button id="checkout" class="flex ml-auto text-white bg-gradient-to-tr from-indigo-600 to-purple-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Checkout</button>
                        @else
                        <form action="{{ route('cart.checkout') }}" method="POST">
                          @csrf
                          <button name="checkout" type="submit" value="submit" class="flex ml-auto text-white bg-gradient-to-tr from-indigo-600 to-purple-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Checkout</button>
                        </form>
                        
                        @endif
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </main>
    @endsection
    @section('scripts')
<script type="text/javascript">
    
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