<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Foto') }}
        </h2>    
    </x-slot>

    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <img src="http://localhost:8000/img/logo-tnwjeans-2.png" alt="TNW JEANS" width="60" height="60" />
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">  
                <form method="POST" action="{{ route('admin.slider1.store')}}" enctype="multipart/form-data"> 
                    @csrf

                    <!-- Order -->
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="order">Ordem</label>
                        <input  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="order" type="number" name="order" autofocus="autofocus">
                    </div>

                    <!-- Active -->
                    <div class="block mt-4">
                        <label for="active" class="inline-flex items-center">
                            <input id="active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="active" checked>
                            <span class="ml-2 text-sm text-gray-600">Status Ativo</span>
                        </label>
                    </div>

                    </br>
                    <!-- Select file -->
                    <div>
                        <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="file" name="image">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3"> Upload </button>
                    </div>
                </form>

                @if($errors->any())
                    @foreach($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach
                @endif
            </div>
        </div>
    </div>
    
</x-app-layout>