function chechk (e,angka) {
	if ( e === angka ) {
		return 'selected';
	}
	return '';
}

function cetak (datas, inner) {
	var cetak = '';
		datas.forEach( (e) => {
			cetak += inner(e);
		} );
	return cetak;
}

function  inner (e)	 {

	return `
	<tr>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-10 h-10">
					<img class="w-full h-full rounded-full"
					src="storage/${e.karyawan.gambar}"
					alt="" />
				</div>
				<div class="ml-3">
					<p class="text-gray-900 whitespace-no-wrap">
						${e.karyawan.nama}
					</p>
				</div>
			</div>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">
				${e.karyawan.id}		
			</p>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">${e.karyawan.dpt}</p>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<span
			class="relative inline-block px-3 py-1 font-semibold leading-tight" style="color:white">
			<span aria-hidden
			class="absolute inset-0 ${ (e.status === 'Masuk')? 'gren':'' } ${ (e.status === 'Pulang')? 'red':'' } opacity-75 rounded-full"></span>
			<span class="relative">${e.status}</span>
		</span>
	</td>
</tr>`;
}

function innerKaryawan (e) {
	return `
<input type="hidden" name="_method" value="put">				
				<input type="hidden" name="_token" value="${token}">
	<tr>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-10 h-10">
					<img class="w-full h-full rounded-full"
					src="storage/${e.gambar}"
					alt="" />
				</div>
				<div class="ml-3">
					<p class="text-gray-900 whitespace-no-wrap">
						${e.nama}
					</p>
				</div>
			</div>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">
				${e.id}		
			</p>
		</td>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">${e.dpt}</p>
		</td>
		
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
	${e.qrCode}
</td>
<td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex justify-start gap-4 btnDelete" data-ids='${e.id}'>
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
					d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 a01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
					/>
				</svg>
			</a>
			<div id="btnUpdate" data-id="${e.id}">
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
<tr>`;
}
	
function innerShift (e) {
	return `<tr>
		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-10 h-10">
					<img class="w-full h-full rounded-full"
					src="storage/${e.karyawan.gambar}"
					alt="" />
				</div>
				<div class="ml-3">
					<p class="text-gray-900 whitespace-no-wrap">
						 ${e.karyawan.nama} 
					</p>
				</div>
			</div>
		</td>

		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">
				${e.karyawan.id }		
			</p>
		</td>

		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
			<p class="text-gray-900 whitespace-no-wrap">${e.jamShift}</p>
		</td>

		<td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
		<form action="/data-shift/update" method="post">
				<input type="hidden" name="_method" value="put">				
				<input type="hidden" name="_token" value="${token}">
			<select class="appearance-none h-full rounded-r border sm:rounded-r-none  border-r border-b block bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 editSelect"  name="shift">
				<option ${ (e.sesiShift == 1)? 'selected':''} value="1">SHIFT 1</option>
				<option ${ (e.sesiShift == 2)? 'selected':''} value="2">SHIFT 2</option>
				<option ${ (e.sesiShift == 3)? 'selected':''} value="3">SHIFT 3</option>
			</select>
			<input type="hidden" name="id" value="${e.id}">
				<button type="submit" class="btn" style="display: none;"></button>
			</form>
		</td>
	</tr>
	
	`;
}
