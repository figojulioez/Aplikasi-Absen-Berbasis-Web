<form action="/data-karyawan" method="post" enctype="multipart/form-data">	
	@csrf
	<div class="py-12 mt-2 bg-transparent transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0 hidden" id="modal">
		<div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
			<div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
				<h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Tambah Data Karyawan</h1>
				<label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Name</label>
				<input id="name" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="" name="nama" />
				<label for="email2" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">ID Karyawan</label>
				<div class="relative mb-5 mt-2">
					<input id="email2" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" type="number" name="idk" />
				</div>
				<label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Departemen</label>
				<div class="relative mb-5 mt-2">
					<select class="appearance-none w-full rounded-r border sm:rounded-r-none  border-r border-b block bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 editSelect" name="dpt">
						<option value="NOC">NOC</option>
						<option value="Admin">Admin</option>
					</select>
				</div>
				<div class="relative mb-5 mt-2">
					<label for="doc" class="flex items-center p-4 gap-3 rounded-3xl border border-gray-300 border-dashed bg-gray-50 cursor-pointer">
						<img id="imgUpdate" src="" class="h-16 w-auto">
						<div class="space-y-2">
							<h4 class="text-base font-semibold text-gray-700">Upload a file</h4>
							<span class="text-sm text-gray-500">Max 2 Mb</span>
						</div>
						<input type="file" id="doc" accept="png, jpg" name="img" hidden/>
					</label>
				</div>
				<div class="flex items-center justify-start w-full">
					<button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
				</div>
				<button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" type="button" id="close">
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

<script type="text/javascript">
	document.getElementById('close').addEventListener('click', function () {
		document.getElementById('modal').classList.toggle('hidden');
	});


	document.getElementById('btnCreate').addEventListener('click', function () { document.getElementById('modal').classList.toggle('hidden')});

	const inputImage = document.querySelectorAll('input[type=file]')[1];
	const img = document.getElementById('imgUpdate');


	inputImage.addEventListener('change', () => {
		if (inputImage.files && inputImage.files[0]) {
			img.src = URL.createObjectURL(inputImage.files[0]);
			img.onload = () => {
				URL.revokeObjectURL(img.src)
			}
		}
	})
</script>