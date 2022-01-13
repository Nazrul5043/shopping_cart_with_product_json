<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!--datatable-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

</head>
<body>
    
    <div  class="bg-white">
        <header>
            <div class="container px-6 py-3 mx-auto">
                <div class="flex items-center justify-between">
                    
                    <div class="flex items-center justify-end w-full">
                        <button" class="mx-4 text-gray-600 focus:outline-none sm:mx-0">
                            
                        </button>
                    </div>
                </div>
                <nav>
  <div>
    <ul class="flex p-8 bg-gradient-to-tr from-indigo-600 to-purple-600 justify-between">
      <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300"><a href="{{ route('products.list')}}">Home</a></li>
      <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300 show-modal"><a href="{{ route('products.list')}}">Shop</a></li>
      <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300">
          <a href="{{ route('cart.list') }}" class="flex items-center">
              
            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span id="cartItems">{{ Cart::getTotalQuantity()}}</span> 
          </a>
      </li>
      
      @guest
        <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300">
            <a href="{{ route('login') }}">Login</a>
        </li>
        <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300">
            <a href="{{ route('register') }}">Register</a>
        </li>
     @else
     <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300"><a href="{{ route('get_orders')}}">Manage Order</a></li>
     <li class="text-md text-white tracking-wide cursor-pointer hover:border-white hover:border-b-2 border-b-2 border-transparent transition duration-300">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
        
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Logout</span>
    </a>    
    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    </li> 
     @endguest

    </ul>
  </div>
</nav>
            </div>
        </header>
        
        <main class="my-8">
            @yield('content')
        </main>
    
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <!--------datatable ------->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

    <!-----//////datable------->
    @yield('scripts')

    
</body>
</html>