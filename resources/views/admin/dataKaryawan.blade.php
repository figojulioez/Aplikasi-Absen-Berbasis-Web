@extends('admin.template.main')

@section('content')
<title>Absensi - Data Karyawan</title>
<div class="container mx-auto px-4 sm:px-8 h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
	<div class="py-8">
		<div>
			<h2 class="text-2xl font-semibold leading-tight"><i class="fa-solid fa-users"></i>  Data Karyawan</h2>
		</div>
		<div class="my-2 flex md:flex-row flex-col space-x-4">
			<div class="flex flex-row mb-1 sm:mb-0 space-x-4">
				<div class="relative">
					<select
					class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="paginate" name="paginate">
					<option {{ (request()->get('show') == 5)? 'selected':'' }} >5</option>
					<option {{ (request()->get('show') == 10)? 'selected':'' }} >10</option>
					<option {{ (request()->get('show') == 20)? 'selected':'' }} >20</option>
				</select>
				<div
				class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
				<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
				</svg>
			</div>
		</div>
	</div>
	<div class="block relative md:my-0 my-3">
		<span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
			<svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
				<path
				d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
			</path>
		</svg>
	</span>
	<input placeholder="Search"
	class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" type="search" id="search" wire:model='search'/>
</div>
<div class="relative" id="btnCreate">
	<button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm" >Create Data</button>
</div>
</div>
@if( session()->has('error') )
@include('admin.partials.alert')
@endif

<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
	<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
		<table class="min-w-full leading-normal">
			<thead>
				<tr>
					<th
					class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
					Nama
				</th>
				<th
				class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
				ID_Karyawan
			</th>
			<th
			class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
			Departement
		</th>
		<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
			QR Code
		</th>
		<th
		class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
		Action
	</th>
</tr>
</thead>
<tbody>
	@foreach($karyawan as $kar)
	<tr>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-10 h-10">
					<img class="w-full h-full rounded-full"
					src="{{asset('storage/' . $kar->gambar)}}"
					alt="" />
				</div>
				<div class="ml-3">
					<p class="text-gray-900 whitespace-no-wrap">
						{{ $kar->nama }}
					</p>
				</div>
			</div>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">
				{{ $kar->id }}		
			</p>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">{{ $kar->dpt }}</p>
		</td>
		<td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
			{{ $kar->qrCode }}
		</td>
		<td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex justify-start gap-4 btnDelete" data-ids='{{ $kar->id }}'>
				<a href="#">
					<svg
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke-width="1.5"
					stroke="currentColor"
					class="h-6 w-6"
					x-tooltip="tooltip"
					>
					<path
					stroke-linecap="round"
					stroke-linejoin="round"
					d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
					/>
				</svg>
			</a>
			<div class="btnUpdate" data-id="{{$kar->id}}">	
				<a href="#">
					<svg
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke-width="1.5"
					stroke="currentColor"
					class="h-6 w-6"
					x-tooltip="tooltip"
					>
					<path
					stroke-linecap="round"
					stroke-linejoin="round"
					d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
					/>
				</svg>
			</a>
		</div>
	</div>
</td>
</tr>
<tr>
	@endforeach
</tbody>
</table>
<div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-start xs:justify-between">
	<span class="text-xs xs:text-sm text-gray-900">
		Showing {{ $karyawan->count() }} to {{ $karyawan->currentPage() }} of {{ $karyawan->total() }} Entries 
	</span>

	<div class="inline-flex mt-2 xs:mt-0 space-x-2">
		<a href="{{ $karyawan->previousPageUrl() }}">
			<button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
				Prev
			</button>
		</a>
		<a href="{{ $karyawan->nextPageUrl() }}">
			<button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
				Next
			</button>
		</a>

	</div>
</div>

</div>
</div>
</div>
</div>


@include('admin.partials.modalDelete')
@include('admin.partials.modalEdit')
@include('admin.partials.modalTambah')



<input type="hidden" id="show" value="{{ (request()->get('show') ?? '') }}">
<script src="js/komponenSendData.js"></script>
<script type="text/javascript">
	var token = document.querySelectorAll('input[type=hidden]')[1].value;
	var datas;
	document.getElementById('search').addEventListener('keyup', async () => {
		datas = await sendDataKaryawan();
		
		var cetaks = await cetak(datas, innerKaryawan);

		document.querySelector('tbody').innerHTML = await cetaks;
		editHapusKaryawan();


		cetaks = '';
	});

	document.getElementById('paginate').addEventListener('change', function (argument) {
		document.location.href = '/data-karyawan?show=' + document.getElementById('paginate').value;
	});



</script>
@endsection