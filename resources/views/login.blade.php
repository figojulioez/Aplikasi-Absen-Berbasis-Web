@extends('admin.template.main')

@section("content")
<title>Absensi - Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
  body {
    overflow-y: hidden;
  }

  .inputInvalid {
    border-color: red;
  }

  .input-focus-invalid {
    background: url("https://assets.digitalocean.com/labs/icons/exclamation-triangle-fill.svg") no-repeat 95% 50% lightsalmon;
    background-size: 25px;
  }
</style>
<form action="login" method="post">
  {{ csrf_field() }}
<div class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12 ml-40">
  <div class="relative py-3 sm:w-96 mx-auto text-center" style="margin-bottom: 100px;">
    <span class="text-2xl font-bold">Login</span>
    <div class="mt-4 bg-white shadow-md rounded-lg text-left">
      <div class="h-2 bg-green-400 rounded-t-md"></div>
      <div class="px-8 py-6 ">
        <label class="block font-semibold"> Username </label>
        <input type="text" name="nama" placeholder="Username" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md @error('nama')
        inputInvalid input-focus-invalid @enderror" value="{{ old('nama') }}">
        <label class="block mt-3 font-semibold"> password </label>
        <input type="password" placeholder="Password" name="password" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
        <div class="flex justify-between items-baseline">
          <button type="submit" class="mt-4 bg-green-500 text-white py-2 px-6 rounded-md hover:bg-purple-600 w-[100%]">Login</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>
</form>
@endsection