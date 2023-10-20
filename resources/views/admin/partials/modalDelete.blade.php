<div class="min-w-screen h-screen fixed bg-black/10 bottom-0 right-0 left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none hidden" id="modalDelete">
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg bg-white border">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
          <h2 class="text-xl font-bold py-4">Apakah anda yakin?</h3>
            <p class="text-sm text-gray-500 px-8">Apabila anda menghapus item ini maka akan terjadi?</p>    
        </div>
        <!--footer-->
        <form action="/data-karyawan" id="formHapus" method="post">
            @method('delete')
            @csrf
            <div class="p-3 mt-2 text-center space-x-4 md:block">
                <button type="button" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider rounded-full hover:shadow-lg hover:bg-red-600" id="closeDelete">
                    Cancel
                </button>
                <button class="mb-5 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider rounded-full hover:shadow-lg hover:bg-red-600" name="hapus" value="" id="hapus">Delete</button>
        </div>
           </form>
    </div>
</div>
</div>

<script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
<script type="text/javascript">
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
</script>