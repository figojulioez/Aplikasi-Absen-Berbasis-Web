function editHapusKaryawan () {
	
	document.getElementById('btnUpdate').addEventListener('click',async function () { 
		document.getElementById('modalUpdate').classList.toggle('hidden')
		var id = document.getElementById('btnUpdate').dataset.id;
		$fetch = await fetch('/api/karyawan/edit?id=' + id).then( (e) => { if ( e.ok ) return e.json(); } ).then( (e) => { return e.data[0]; });

		console.log($fetch);		
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

	const imgInput = document.querySelector('#inputImg');
	const imgEl = document.querySelector('#img');

	imgInput.addEventListener('change', () => {
		if (imgInput.files && imgInput.files[0]) {
			imgEl.src = URL.createObjectURL(imgInput.files[0]);
			imgEl.onload = () => {
				URL.revokeObjectURL(imgEl.src);
			}
		}
	});

	const modalDelete = document.getElementById("modalDelete");

    $('.btnDelete').on('click', function () {
        var idk = $(this).data('ids');
        document.getElementById('formHapus').setAttribute('action', '/data-karyawan/' + idk);
        document.getElementById('hapus').addEventListener('click', function () {
            this.click();
        });
        modalDelete.classList.toggle('hidden');
    });

    document.getElementById('closeDelete').addEventListener('click',(e)=> {
        document.location.href = 'data-karyawan';
    });

}