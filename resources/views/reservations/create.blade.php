<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
           Ajouter une reservation
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                <form  action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="space-y-8 divide-y divide-gray-200">
                        <div class="pt-4">
                            <div>
                                <p class="mt-1 text-sm text-gray-500"> ce sont les informations de la reservation </p>
                            </div>
                            <div class="mt-8 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="nom" class="block text-sm font-medium text-gray-700"> nom
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="nom"  autocomplete="given-name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="prenom" class="block text-sm font-medium text-gray-700"> Prénom
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="prenom" id="prenom" autocomplete="family-name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700"> Adresse
                                        email
                                    </label>
                                    <div class="mt-1">
                                        <input id="email" name="email" type="email" autocomplete="email"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700"> Telephone
                                    </label>
                                    <div class="mt-1">
                                        <input id="email" name="tel" type="text" autocomplete="tel"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <div >
                                    <label for="pays" class="block text-sm font-medium text-gray-700"> Pays
                                    </label>
                                    <div class="mt-1">
                                        <select id="pays" name="pays" 
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="adresse" class="block text-sm font-medium text-gray-700"> Address
                                    <div class="mt-1">
                                        <input type="text" name="adresse" id="adresse"
                                            autocomplete="adresse"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="ville" class="block text-sm font-medium text-gray-700"> Ville </label>
                                    <div class="mt-1">
                                        <input type="text" name="ville" id="ville" autocomplete="address-level2"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>


                                <div class="sm:col-span-3">
                                    <label for="zipcode" class="block text-sm font-medium text-gray-700"> Code Postal </label>
                                    <div class="mt-1">
                                        <input type="text" name="zipcode" id="zipcode"
                                            autocomplete="zipcode"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-6 mt-2">
                                <label for="permis" class="block text-sm font-medium text-gray-700"> Permis de conduire </label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="photo"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="photo" name="photo" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
         
                </form>
            </div>
        </div>
    </div>
</x-app-layout>