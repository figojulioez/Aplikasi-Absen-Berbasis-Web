@extends('admin.template.main')

@section('content')
<title>Absensi - Data Absensi</title>
<style type="text/css">
	.gren {
		background-color: green;
	}

	.red {
		background-color: red;
	}
</style>

<div class="container mx-auto px-4 sm:px-8 h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
	<div class="py-8">
		<div>
			<h2 class="text-2xl font-semibold leading-tight"><i class="fa-solid fa-clock"></i>  Data Absensi</h2>
		</div>
		<div class="my-2 flex md:flex-row flex-col">
			<div class="flex flex-row mb-1 sm:mb-0">
				<div class="relative">
					<select
					class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="paginate">
					<option {{ (request()->get('show') === '5')? 'selected':'' }} >5</option>
					<option {{ (request()->get('show') === '10')? 'selected':'' }} >10</option>
					<option {{ (request()->get('show') === '20')? 'selected':'' }} >20</option>
				</select>
				<div
				class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
				<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
				</svg>
			</div>
		</div>
		<div class="relative">
			<select
			class="appearance-none h-full rounded-r border-t sm:rounded-r-none md:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500" name="ket" id="ket">
			<option {{ (request()->get('ket') === ' ')? 'selected':'' }} value=" ">All</option>
			<option {{ (request()->get('ket') === 'Masuk')? 'selected':'' }}>Masuk</option>
			<option {{ (request()->get('ket') === 'Pulang')? 'selected':'' }}>Pulang</option>
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
class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" id="search" />
</div>
</div>
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
				ID Karyawan
			</th>
			<th
			class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
			Departement
		</th>

		<!-- <th
		class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
		Tanggal Absen
	</th> -->
	
	<th
	class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
	Status
</th>
</tr>
</thead>
<tbody>

	@foreach($dataAbsensi as $absensi)
	<tr>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-10 h-10">
					<img class="w-full h-full rounded-full"
					src="{{asset('storage/'. $absensi->karyawan->gambar)}}"
					alt="" />
				</div>
				<div class="ml-3">
					<p class="text-gray-900 whitespace-no-wrap">
						{{ $absensi->karyawan->nama }}
					</p>
				</div>
			</div>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">
				{{ $absensi->karyawan->id }}		
			</p>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">{{ $absensi->karyawan->dpt }}</p>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<span
			class="relative inline-block px-3 py-1 font-semibold leading-tight" style="color: white;">
			<span aria-hidden
			class="absolute {{ ($absensi->status === 'Masuk')? 'gren':'' }} {{ ($absensi->status === 'Pulang')? 'red':'' }} inset-0 opacity-75 rounded-full"></span>
			<span class="relative">{{ $absensi->status }}</span>
		</span>
	</td>
</tr>
@endforeach
</tbody>
</table>

<div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-start xs:justify-between">
	<span class="text-xs xs:text-sm text-gray-900">
		Showing {{ $dataAbsensi->count() }} to {{ $dataAbsensi->currentPage() }} of {{ $dataAbsensi->total() }} Entries 
	</span>

	<div class="inline-flex mt-2 xs:mt-0 space-x-2">
		<a href="{{ $dataAbsensi->previousPageUrl() }}">
			<button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
				Prev
			</button>
		</a>
		<a href="{{ $dataAbsensi->nextPageUrl() }}">
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


<input type="hidden" id="ket" value="{{ (request()->get('ket') ?? '') }}">
<input type="hidden" id="show" value="{{ (request()->get('show') ?? '') }}">
<script type="text/javascript">
	function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
   }
   document.getElementById('search').addEventListener('keyup', async () => {
   		// sleep(1000);
		datas = await sendData();

		var cetaks = await cetak(datas, inner);
		// sleep(1000);
		document.querySelector('tbody').innerHTML = await cetaks;

		cetaks = '';
	});

	document.getElementById('paginate').addEventListener('change', function (argument) {
		document.location.href = '/data-absensi?show=' + document.getElementById('paginate').value + '&ket=' + document.getElementById('ket').value;
	});

	document.getElementById('ket').addEventListener('change', function (argument) {
		document.location.href = '/data-absensi?show=' + document.getElementById('paginate').value + '&ket=' + document.getElementById('ket').value;
	});
</script>


@endsection