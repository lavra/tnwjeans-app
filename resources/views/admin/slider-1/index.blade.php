<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slider Principal') }} 
            <a href="{{route('slider1.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3"> Adicionar </a>
        </h2>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Foto
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Visivel
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Ordem
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <img src="{{ url("storage/{$slider->image}") }}" alt="Tnw Jeans" class="object-cover w-20">
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if($slider->page == 1) 
                                                Desktop
                                            @else    
                                                Mobile
                                            @endif    
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$slider->order}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if($slider->active == 1) 
                                                Ativo
                                            @else    
                                                Inativo
                                            @endif  
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('admin.slider1.edit', $slider->id) }}" class="bg-green-200 rounded-full py-2 px-6">Editar</a> |
                                            <a href="{{ route('admin.slider1.destroy', $slider->id) }}" class="bg-green-200 rounded-full py-2 px-6">Excluir</a> 
                                        </td>
                                    </tr> 
                                @endforeach                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
    
</x-app-layout>