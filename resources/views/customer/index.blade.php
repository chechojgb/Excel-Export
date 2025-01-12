<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="w-full p-5">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif


                <div class="flex mt-5 flex-col">
                    <div class="w-full pb-3">
                        <span class="text-2xl font-bold">Import Excel</span>
                    </div>
                    <div class="w-full">
                        <p>In this space, you can import data from an Excel file into the database.</p>
                    </div>
                </div>
                <div class="flex my-5 justify-start mt-12">
                    <div class="w-full md:w-1/4">
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="w-full bg-[#51B0CB] text-white py-2 px-4 rounded-lg shadow-md hover:bg-[#51B0CB] focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <span class="inline-flex items-center justify-center w-full py-1 px-4 bg-[#51B0CB] text-white font-semibold rounded-md hover:bg-[#51B0CB] focus:outline-none focus:ring-2 focus:ring-blue-400">
                                Insert Excel
                            </span>                            
                        </button>
                        
                    </div>
                    
                </div>
                
                

<!-- Modal toggle -->

  
  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Select your file
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form action="{{ url('customer/import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                  <div class="p-4 md:p-5 space-y-4">
                    <div class="w-full max-w-full mx-auto mt-2">
                        <div class="relative">
                            
                            <input type="file" name="import_file" id="import_file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  >
                        </div>
                    </div>   
                  </div>
                  <!-- Modal footer -->
                  <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                      <button  type="submit" class="bg-[#00acc1] hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg">{{__('Submit')}}</button>
                      <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  
                {{-- <div class="card">
                   
                    <div class="card-body">

                        <form action="{{ url('customer/import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="w-full max-w-md mx-auto">
                                <div class="relative">
                                    <div class="flex items-center bg-gray-100 text-gray-800 border border-transparent rounded-t-lg shadow-sm focus-within:ring focus-within:ring-blue-300 focus-within:outline-none focus-within:border-blue-500 transition p-3 pr-10" 
                                        style="border-bottom: 1px solid black">
                                        <input 
                                            type="file" 
                                            name="import_file" 
                                            class="block w-full bg-transparent focus:outline-none text-gray-800" 
                                            placeholder="Selecciona tu archivo"
                                        />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button class="bg-[#00acc1] hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg" data-modal-hide="static-modal">
                                  {{__('Submit')}}
                                </button>
                              </div>
                        </form>

                      

        
                    

                    </div>
                </div> --}}
            </div>
        </div>
    </div>

</x-app-layout>