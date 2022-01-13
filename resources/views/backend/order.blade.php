@extends('../layouts.frontend')

@section('title')
    Order Details
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
                      <table class="w-full text-sm lg:text-base table-auto" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              
                              <th class="text-left">SL</th>
                              <th class="text-left">Qty</th>
                              <th class="text-left"> Price</th>
                              <th class="text-left"> Total</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($order as $item)
                              <tr>
                                  <td >{{$loop->iteration}}</td>
                                  <td>{{$item->qty}}</td>
                                  <td>{{$item->price}}</td>
                                  <td>{{$item->total}}</td>
                              </tr>

                          @endforeach
                          </tbody>
                        </table>
                        
                      </div>
                    </div>
                  </div>
            </div>
        </main>
@endsection
    
@section('scripts')

@endsection