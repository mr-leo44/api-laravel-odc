<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">

            <table class="w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            N°
                        </th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Date Création
                        </th>
                        <th scope="col"
                            class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">Nom
                        </th>
                        <th scope="col"
                            class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Contenu</th>
                        <th scope="col"
                            class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr
                            class="bg-gray-100 border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $category->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ Str::limit($category->content, 30) }}</td>
                            <td>

                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $key }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown{{ $key }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="{{ route('categories.update', $category->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editer</a>
                                        </li>
                                        <li>
                                            <a onclick="deleteData(event)" href="{{ route('categories.destroy', $category->id) }}" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Supprimer</a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-delete :message="__('Voulez-vous vraiment suprimer cette catégorie?')" />
</x-app-layout>
