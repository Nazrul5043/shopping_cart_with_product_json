@extends('../layouts.auth')
@section('title')
    Sign UP
@endsection

@section('content')
<form method="post" action="{{ route('register') }}">
  @csrf
    <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
      <div class="space-y-4">
        <h1 class="text-center text-2xl font-semibold text-gray-600">Sign UP</h1>
        
        <div>
          <label for="name" class="block mb-1 text-gray-600 font-semibold">Name</label>
          <input type="text" name="name" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" value="{{old('name')}}"/>
          @if ($errors->has('name'))
            <span class="text-red-600">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div>
          <label for="email" class="block mb-1 text-gray-600 font-semibold">Email</label>
          <input type="text" name="email" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" value="{{old('email')}}" />
          @if ($errors->has('email'))
            <span class="text-red-600">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div>
          <label for="password" class="block mb-1 text-gray-600 font-semibold">Password <i class="fa fa-eye-slash toggle-password" onclick="togglePassword()" aria-hidden="true"></i></label>
          <input type="password" name="password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full password" value="{{old('password')}}" />
          @if ($errors->has('password'))
                <span class="text-red-600">{{ $errors->first('password') }}</span>
          @endif
        </div>
        <div>
          <label for="password_confirmation" class="block mb-1 text-gray-600 font-semibold">Confirm Password</label>
          <input type="password" name="password_confirmation" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full password" value="{{old('password_confirmation')}}" />
          @if ($errors->has('password_confirmation'))
                <span class="text-red-600">{{ $errors->first('password_confirmation') }}</span>
          @endif
        </div>
      </div>
      <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Submit</button>
      <a href=" {{route('home')}}"> <button type="button" class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide"> Back to Home </button></a>
    </div>
    <p class="sign-up text-center text-indigo-100">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
<p class="terms text-indigo-100">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
  </form>
  @endsection

  @section('script')

@endsection