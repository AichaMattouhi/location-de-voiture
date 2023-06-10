<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                </div>
                <br>
                @php
                    $userId = auth()->id();
                @endphp

                <nav>
                    <ul>
                        <li><a href="{{ route('logout') }}">Log out</a></li>
                    </ul>
                </nav>

                <form method="GET" action="{{ route('researchvehicles1') }}">
                    <div>
                        Marque <input type="text" name="marque" placeholder="Entrer la marque que vous cherchez" size="60">
                    </div>
                    <br>
                    <div>
                        Modele <input type="text" name="modele" placeholder="Entrer le modele que vous cherchez" size="60">
                    </div>
                    <br>
                    <div>
                        Couleur <input type="text" placeholder="Entrer la couleur que vous cherchez" name="couleur">
                    </div>
                    <br>
                    <div>
                        Nombre de places <input type="int" placeholder="Entrer le nombre de places que vous cherchez" name="nbrplaces">
                    </div>
                    <br>
                    <div>
                        Prix a partir de
                        <select name="prix">
                            <option value="1000">1000</option>
                            <option value="10000">10000</option>
                            <option value="100000">100000</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        Rechercher <input type="submit" value="Rechercher">
                    </div>
                    <br>
                    <div>
                        Annuler <input type="reset" value="Annuler">
                    </div>
                </form>

                <table>
                    <tr>
                        <td>Id</td>
                        <td>Marque</td>
                        <td>Modele</td>
                        <td>Annee de Fabrication</td>
                        <td>Couleur</td>
                        <td>Moteur</td>
                        <td>Kilometrage</td>
                        <td>Nombre de places</td>
                        <td>Climatisation</td>
                        <td>GPS</td>
                        <td>Prix</td>
                        <td>Image</td>
                    </tr>
                    @foreach($vehicules as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->marque }}</td>
                            <td>{{ $v->modele }}</td>
                            <td>{{ $v->anneefab }}</td>
                            <td>{{ $v->couleur }}</td>
                            <td>{{ $v->moteur }}</td>
                            <td>{{ $v->kilometrage }}</td>
                            <td>{{ $v->nbrplaces }}</td>
                            <td>{{ $v->climatisation }}</td>
                            <td>{{ $v->gps }}</td>
                            <td>{{ $v->prix }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $v->image) }}" height="200" width="200">
                            </td>
                            <td>
                                <a href="{{ route('formreserver',['id'=>$userId,'iu'=>$v->id]) }}">Reserver maintenant</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>