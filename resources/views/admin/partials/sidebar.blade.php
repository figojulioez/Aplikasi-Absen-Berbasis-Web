
<div class="flex overflow-hidden bg-white pt-16">
   <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-[50px] flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
      <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
         <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">

               <ul class="space-y-2 pb-2">
                  @can('admin')
                  <li>
                     <a href="/dashboard" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                        <i class="fa-solid fa-gauge"></i>
                        <span class="ml-3">Dashboard</span>
                     </a>
                  </li>
                  <li >
                    <a href="/data-absensi" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-clock"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Data Absensi</span>
                  </a>
               </li>
               <li>
                  <a href="/data-karyawan" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-users"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Data Karyawan</span>
                  </a>
               </li>
               <li>
                  <a href="/data-shift" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-user-clock"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Data Shift</span>
                  </a>
               </li>
               <li>
                  <a href="/data-laporan" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-calendar-days"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Data Laporan</span>
                  </a>
               </li>
               <li>
                  <li>
                     <a href="/data-laporan/create" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                        <i class="fa-solid fa-file-pen"></i>
                        <span class="ml-3 flex-1 whitespace-nowrap">Buat Laporan</span>
                     </a>
                  </li>
                  <li>
                     <li>
                        <a href="/data-bulanan" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <i class="fa-solid fa-calendar-check"></i>
                           <span class="ml-3 flex-1 whitespace-nowrap">Buat Laporan Bulanan</span>
                        </a>
                     </li>
                     <li>
                        <a href="/logout" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <i class="fa-solid fa-arrow-right-from-bracket"></i>
                           <span class="ml-3 flex-1 whitespace-nowrap">Logout</span>
                        </a>
                     </li>
                  </ul>
                  @endCan     
                  @guest()

                  <a href="/scan-qr" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-qrcode"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Scan Qr</span>
                  </a>
                  <a href="/data-shift" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-user-clock"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Data Shift</span>
                  </a>
               </li>
               <li >
                    <a href="/data-absensi" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-clock"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Data Absensi</span>
                  </a>
               </li>
               <li>
                  <a href="/login" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-user"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Login  </span>
                  </a>
               </li>
               @endguest
            </div>
         </div>
      </div>
   </aside>
</div>