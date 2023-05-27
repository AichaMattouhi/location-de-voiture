<x-guest-layout>
    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf

   
   
   <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('nom')" />
        <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="prenom" :value="__('prenom')" />
        <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="mot de passe " :value="__('mot de passe ')" />

        <x-text-input id="mot_de_passe" class="block mt-1 w-full"
                        type="password"
                        name="mot_de_passe"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('mot_de_passe')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirmer Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Address -->
    <div class="mt-4">
        <x-input-label for="adresse" :value="__('adresse')" />
        <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autocomplete="adresse" />
        <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
    </div>

    <!-- Zip Code -->
    <div class="mt-4">
        <x-input-label for="zipcode" :value="__(' Code postal')" />
        <x-text-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode" :value="old('zipcode')" required autocomplete="zipcode" />
        <x-input-error :messages="$errors->get('zipcode')" class="mt-2" />
    </div>

    <!-- City -->
    <div class="mt-4">
        <x-input-label for="ville" :value="__('ville')" />
        <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required autocomplete="ville" />
        <x-input-error :messages="$errors->get('ville')" class="mt-2" />
    </div>

    <!-- Country -->
    <div class="mt-4">
        <x-input-label for="pays" :value="__('Pays')" />
        <x-text-input id="pays" class="block mt-1 w-full" type="text" name="pays" :value="old('pays')" required autocomplete="pays" />
        <x-input-error :messages="$errors->get('pays')" class="mt-2" />
    </div>

    <!-- Phone -->
    <div class="mt-4">
        <x-input-label for="tel" :value="__('telephone')" />
        <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autocomplete="tel" />
        <x-input-error :messages="$errors->get('tel')" class="mt-2" />
    </div>

    <!-- Driver's License Photo -->
    <div class="mt-4">
        <x-input-label for="license_photo" :value="__('Driver\'s License Photo')" />
        <input id="photo" class="block mt-1 w-full" type="file" name="photo" accept="image/*" required />
        <x-input-error :messages="$errors->get('photo_du_permis')" class="mt-2" />
    </div>


    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ml-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
</x-guest-layout>
