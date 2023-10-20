<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Absensi - Succes</title>
	<link rel="stylesheet"  href="css/style.css">
</head>
<body>
	<!-- component -->
<!-- This is an example component -->
<!-- component -->
<div class="overflow-y-auto sm:p-0 pt-4 pr-4 pb-20 pl-4 bg-gray-800">
  <div class="flex justify-center items-end text-center min-h-screen sm:block">
    <div class="bg-gray-500 transition-opacity bg-opacity-75"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">​</span>
    <div class= "inline-block text-left bg-gray-900 rounded-lg overflow-hidden align-bottom transition-all transform
        shadow-2xl sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
      <div class="items-center w-full mr-auto ml-auto relative max-w-7xl md:px-12 lg:px-24">
        <div class="grid grid-cols-1">
          <div class="mt-4 mr-auto mb-4 ml-auto bg-gray-900 max-w-lg">
            <div class="flex flex-col items-center pt-6 pr-6 pb-6 pl-6 space-y-5">
              <img src="{{ asset('storage/' . session('gambar')) }}" width="500" class="flex-shrink-0 object-cover object-center btn- flex w-16 h-16 mr-auto -mb-8 ml-auto rounded-full shadow-xl">
              <div class="flex items-center justify-center">
              	
              <svg class="h-8 w-8 text-green-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">

  				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
				</svg>

              <p class="mt-8 text-2xl font-semibold leading-none text-white tracking-tighter lg:text-3xl" style="text-align: center;"> {!! session('nama') !!}</p>
              </div>
              <p class="mt-3 text-base leading-relaxed text-center text-gray-200">Anda telah mengisi absensi</p>
              <div class="w-full mt-6">
                <a class="flex text-center items-center justify-center w-full pt-4 pr-10 pb-4 pl-10 text-base
                    font-medium text-white bg-green-600 rounded-xl transition duration-500 ease-in-out transform
                    hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/login">Oke</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>