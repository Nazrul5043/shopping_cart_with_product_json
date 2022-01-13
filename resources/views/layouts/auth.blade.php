<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    
  
        
        <main class="">
            <div class="h-screen bg-gradient-to-br from-blue-600 to-indigo-600 flex justify-center items-center w-full">
            @yield('content')
            </div>
        </main>
    
    
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    function togglePassword(){
    $('.toggle-password').toggleClass("fa-eye fa-eye-slash");
    $('.password').each( function() { 
            if ($(this).attr("type") === "password") {
                $(this).attr("type", "text");
            } else {
                $(this).attr("type", "password");
            }
        });
  }
</script>
@yield('scripts')

    
</body>
</html>