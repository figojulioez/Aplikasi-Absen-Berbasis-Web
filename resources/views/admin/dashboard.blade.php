@extends('admin.template.main')

@section('content')
<title>Absensi - Dashboard</title>
<div class="relative overflow-y-auto lg:ml-64">
	<div class="font-sans mt-20 w-full flex justify-center items-center flex-wrap gap-y-28">

@if( $data == true )		
		<div class="card w-[300px] mx-auto bg-red-300  shadow-xl hover:shadow">
			<img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white" src="https://avatars.githubusercontent.com/u/67946056?v=4" alt="">
			<div class="text-center mt-2 text-3xl font-medium">{{ $karyawanTerbaik->karyawan->nama }}</div>
			<div class="text-center mt-2 font-light text-sm">{{ $karyawanTerbaik->karyawan->dpt }}</div>
			<div class="text-center font-normal text-lg">Karyawan dengan jam kerja terbanyak</div>
			<hr class="mt-8">
			<div class="flex p-4">
				<div class="w-1/2 text-center">
					<span class="font-bold">Total Jam Kerja</span>
				</div>
				<div class="w-0 border border-gray-300">

				</div>
				<div class="w-1/2 text-center">
					<span class="font-bold">{{ $karyawanTerbaik->waktuKerja }} Jam</span>
				</div>
			</div>
		</div>

		<div class="card w-[300px] mx-auto bg-red-300  shadow-xl hover:shadow">
			<img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white" src="https://avatars.githubusercontent.com/u/67946056?v=4" alt="">
			<div class="text-center mt-2 text-3xl font-medium">{{ $karyawanKurangBaik->karyawan->nama }}</div>
			<div class="text-center mt-2 font-light text-sm">{{ $karyawanKurangBaik->karyawan->dpt }}</div>
			<div class="text-center font-normal text-lg">Karyawan dengan jam kerja<br> terdikit</div>
			<hr class="mt-8">
			<div class="flex p-4">
				<div class="w-1/2 text-center">
					<span class="font-bold">Total Jam Kerja</span>
				</div>
				<div class="w-0 border border-gray-300">

				</div>
				<div class="w-1/2 text-center">
					<span class="font-bold">{{ $karyawanKurangBaik->waktuKerja }} Jam</span>
				</div>
			</div>
		</div>
@else
@endif
	</div>
</div>

@endsection