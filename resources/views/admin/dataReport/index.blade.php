@extends('admin.template.main')
@section('content')
<!-- <link rel="stylesheet" href="css/dataReport.css"> -->

<title>Absensi - Data</title>
<div class="container mx-auto px-4 sm:px-8 h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
  <div class="py-8">
    <div>
        <h2 class="text-2xl font-semibold leading-tight"><i class="fa-solid fa-calendar-days"></i>  Laporan Absensi</h2>
    </div>
    <div class="my-2 flex md:flex-row flex-col md:space-x-4 space-x-0">
        <div class="flex flex-row mb-1 sm:mb-0 sm:space-x-4 space-x-0">
            <form action="/data-laporan" method="get">
                <div class="relative">
                    <input type="date" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-3 pr-2 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" name="keyDate" value="{{ request()->get('keyDate') ?? date('Y-m-d')}}">
                </div>
            </div>
            <div class="relative">
                <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm"  type="submit" style="display:none">Cari</button>
            </div>
        </form>
        <div class="relative">
            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm" onclick="laporan()" type="button"><i class="fa-solid fa-print"></i>  Cetak</button>
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
                    Lama Jam Kerja
                </th>
                <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Jam Masuk
            </th>
            <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Jam Pulang
        </th>
        <th
        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
        Keterangan
    </th>
    <th
    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
    Shift
</th>      
<th
class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
Action
</th>      
</tr>
</thead>
<tbody>
    @foreach($laporan as $lp)
    <tr>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                    <img class="w-full h-full rounded-full"
                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                    alt="" />
                </div>
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $lp->karyawan->nama }}
                    </p>
                </div>
            </div>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
         <p class="text-gray-900 whitespace-no-wrap">
           {{ $lp->waktuKerja . ' jam'}}		
       </p>
   </td>
   <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">{{ $lp->jamMasuk }}</p>
</td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">{{ $lp->jamPulang }}</p>
</td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">{{ $lp->keterangan }}</p>
</td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">{{ $lp->dataShift }}</p>
</td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <div class="flex justify-start gap-4 btnDelete" data-ids='{{ $lp->id }}'>
            <button type="submit">
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
        </button>
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>

@include('admin.partials.modalDeleteLaporan')

<script type="text/javascript">
    $inputDate = document.querySelector('input[type=date]');

    function laporan () {
        document.location.href = '/laporan?tanggal=' + $inputDate.value;
    } 

    $inputDate.addEventListener('change', function () {
        document.querySelector('button[type=submit]').click();
    });

</script>
@endSection