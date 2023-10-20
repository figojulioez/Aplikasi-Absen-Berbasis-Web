@extends('admin.template.main')

@section('content')
<title>Absensi - Data Shift</title>
<div class="container mx-auto px-4 sm:px-8 h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
	<div class="py-8">
		<div>
			<h2 class="text-2xl font-semibold leading-tight"><i class="fa-solid fa-file-pen"></i>  Data Shift</h2>
		</div>
		<div class="my-2 flex sm:flex-row flex-col md:space-x-4 space-x-0 ">
			<div class="flex flex-row mb-1 sm:mb-0 sm:space-x-4 space-x-0 ">
				<div class="relative mr-2 sm:mr-0">
					<select
					class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="paginate">
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
		<div class="relative ">
			<!-- <select
			class="appearance-none h-full rounded-r sm:rounded-r-none border  block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
			<option>All</option>
		</select>
 -->	<!-- 	<div
		class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
		<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
			<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
		</svg>
	</div> -->

</div>
</div>
<div class="block relative mr-2 ">
	<span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
		<svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
			<path
			d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
		</path>
	</svg>
</span>
<input placeholder="Search"
class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" id="search" name="search" />
</div>
</div>
<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
	@if( session()->has('error') )
	@include('admin.partials.alert')
	@endif
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
			Shift
		</th>
		<th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
			Action
		</th>
	</tr>
</thead>
<tbody>
	@foreach($shift as $s)
	<tr>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-10 h-10">
					<img class="w-full h-full rounded-full"
					src="{{asset('storage/'. $s->karyawan->gambar)}}"
					alt="" />
				</div>
				<div class="ml-3">
					<p class="text-gray-900 whitespace-no-wrap">
						{{ $s->karyawan->nama }}
					</p>
				</div>
			</div>
		</td>

		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">
				{{ $s->karyawan->id }}		
			</p>
		</td>

		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">{{ $s->jamShift }}</p>
		</td>

		<td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
			<form action="/data-shift/update" method="post">
				@method('put')
				@csrf
				<select class="appearance-none h-full rounded-r border sm:rounded-r-none  border-r border-b block bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 editSelect" name="shift">
					<option value="1" {{ ($s->sesiShift === 1)? 'selected':'' }}>SHIFT 1</option>
					<option value="2" {{ ($s->sesiShift === 2)? 'selected':'' }}>SHIFT 2</option>
					<option value="3" {{ ($s->sesiShift === 3)? 'selected':'' }}>SHIFT 3</option>
				</select>
				<input type="hidden" name="id" value="{{ $s->id }}">
				<button type="submit" class="btn" style="display: none;"></button>
			</form>
		</td>
	</tr>
	@endforeach
</tbody>
</table>
<div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-start xs:justify-between">
	<span class="text-xs xs:text-sm text-gray-900">
		Showing {{ $shift->count() }} to {{ $shift->currentPage() }} of {{ $shift->total() }} Entries 
	</span>

	<div class="inline-flex mt-2 xs:mt-0 space-x-2">
		<a href="{{ $shift->previousPageUrl() }}">
			<button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
				Prev
			</button>
		</a>
		<a href="{{ $shift->nextPageUrl() }}">
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
</div>
<input type="hidden" id="show" value="{{ (request()->get('show') ?? '') }}">
<script type="text/javascript">
	const token = document.querySelectorAll('input[type=hidden]')[1].value;
	function sleep(ms) {
		return new Promise(resolve => setTimeout(resolve, ms));
	}

	var datas;
	document.getElementById('search').addEventListener('keyup', async () => {
		// sleep(1000);
		datas = await sendDataShift();
		var cetaks = await cetak(datas, innerShift);

		// sleep(1000);
		document.querySelector('tbody').innerHTML = await cetaks;
		$(document).ready( function () {
			$('.editSelect').change( function () {
				this.nextElementSibling.nextElementSibling.click();
			});
		});

		cetaks = '';
	});

	document.getElementById('paginate').addEventListener('change', function (argument) {
		document.location.href = '/data-shift?show=' + document.getElementById('paginate').value;
	});

	$(document).ready( function () {
		$('.editSelect').change( function () {
			this.nextElementSibling.nextElementSibling.click();
		});
	});
</script>


<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>

@endsection