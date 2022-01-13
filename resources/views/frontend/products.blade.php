@extends('../layouts.frontend')

@section('title')
    Product List
@endsection

@section('content')
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">New Arrival</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <a href="{{ route('product', ['product_id' => $product->product_id]) }}">
                    <img src="{{ url($product->image_url) }}" alt="" class="w-full max-h-60">
                </a>
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->title }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                    
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
@endsection