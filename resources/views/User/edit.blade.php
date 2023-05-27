
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <form method="POST" enctype="multipart/form-data" action="{{ route('clients.update', ['id' => $user->id]) }}">
                @csrf

                <div class="mb-4">
                    <label for="nom" class="block font-medium text-sm text-gray-700">Nom :</label>
                    <input type="text" id="nom" name="nom" value="{{ $user->nom }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="prenom" class="block font-medium text-sm text-gray-700">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="adresse" class="block font-medium text-sm text-gray-700">Adresse :</label>
                    <input type="text" id="adresse" name="adresse" value="{{ $user->adresse }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="code_postal" class="block font-medium text-sm text-gray-700">Code postal :</label>
                    <input type="text" id="code_postal" name="zipcode" value="{{ $user->zipcode }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="ville" class="block font-medium text-sm text-gray-700">Ville :</label>
                    <input type="text" id="ville" name="ville" value="{{ $user->ville }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="pays" class="block font-medium text-sm text-gray-700">Pays :</label>
                    <input type="text" id="pays" name="pays" value="{{ $user->pays }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="telephone" class="block font-medium text-sm text-gray-700">Numéro de téléphone :</label>
                    <input type="text" id="telephone" name="tel" value="{{ $user->tel }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="photo" class="block font-medium text-sm text-gray-700">Copie du permis de conduire :</label>
                    <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block">
                    <img src="{{ asset('storage/'.$user->permis) }}" width="30" height="30" alt="">
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-medium text-sm text-gray-700">Adresse e-mail :</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">Mot de passe :</label>
                    <input type="password" id="password" name="password" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                </div>

                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Ajouter le client</button>
            </form>
        </div>
    </div>
</div>