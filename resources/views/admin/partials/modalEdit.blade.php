<form action="/data-karyawan/update" method="post" enctype="multipart/form-data">
	@method('put')
	@csrf
	<div class="py-12 mt-2 bg-transparent transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0 hidden" id="modalUpdate">
		<div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
			<div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
				<h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Edit Data Karyawan</h1>
				<label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Name</label>
				<input id="name" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="" name="nama" />
				<label for="email2" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">ID Karyawan</label>
				<div class="relative mb-5 mt-2">
					<input id="id" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" type="number" name="id" />
					<input type="hidden" name="idk" id="idk">
				</div>
				<label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Departemen</label>
				<div class="relative mb-5 mt-2">
					<select class="appearance-none w-full rounded-r border sm:rounded-r-none  border-r border-b block bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 editSelect" name="dpt">
						<option value="NOC" class="opt">NOC</option>
						<option value="Admin" class="opt">Admin</option>
					</select>

				</div>
				<input id="gambarLama" type="hidden" name="gambarLama">
				<div class="relative mb-5 mt-2">
					<label for="inputImg" class="flex items-center p-4 gap-3 rounded-3xl border border-gray-300 border-dashed bg-gray-50 cursor-pointer">
						<img class="h-16 w-auto" id="img"> 
						<div class="space-y-2">
							<h4 class="text-base font-semibold text-gray-700">Upload a file</h4>
							<span class="text-sm text-gray-500">Max 2 Mb</span>
						</div>
						<input type="file" id="inputImg" accept="png, jpg" name="img" hidden/>
					</label>
				</div>
				<div class="flex items-center justify-start w-full">
					<button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
				</div>
				<button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" id="closeUpdate" type="button">
					<svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" />
						<line x1="18" y1="6" x2="6" y2="18" />
						<line x1="6" y1="6" x2="18" y2="18" />
					</svg>
				</button>
			</div>
		</div>
	</div>
</div>
</form>

<script src="js/jquery-3.6.3.min.js"></script>
<script type="text/javascript">
	document.getElementById('closeUpdate').addEventListener('click', function () {
		document.location.href = 'data-karyawan';
	});

	$('.btnUpdate').on('click',async function () { 
		document.getElementById('modalUpdate').classList.toggle('hidden')
		var id = $(this).data('id');
		$fetch = await fetch('/api/karyawan/edit?id=' + id).then( (e) => { if ( e.ok ) return e.json(); } ).then( (e) => { return e.data[0]; });

		document.getElementById('id').value = $fetch.id;
		document.getElementById('name').value = $fetch.nama;
		document.getElementById('idk').value = $fetch.id;
		document.querySelector('#gambarLama').value = $fetch.gambar;
		document.getElementById('img').src = 'storage/' + $fetch.gambar;

			const option = document.getElementsByClassName('opt');

			for ( i = 0; i < option.length; i++) {
				if ( option[i].value == $fetch.dpt ) {
					option[i].setAttribute('selected', true);
				}
			}


	});


	const imgInput = document.querySelector('#inputImg')
	const imgEl = document.querySelector('#img')

	imgInput.addEventListener('change', () => {
		if (imgInput.files && imgInput.files[0]) {
			imgEl.src = URL.createObjectURL(imgInput.files[0]);
			imgEl.onload = () => {
				URL.revokeObjectURL(imgEl.src)
			}
		}
	})
</script>