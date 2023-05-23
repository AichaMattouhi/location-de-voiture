
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
}

th {
  background-color: #dddddd;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

a {
  color: blue;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
<form action="{{ route('clients.search') }}" method="GET">
    <input type="text" name="keyword" placeholder="Recherche...">
    <button type="submit">Rechercher</button>
</form>
@if(count($clients) > 0)
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Numéro de téléphone</th>
                <th>Adresse e-mail</th>
                <th>Image</th> 
                <th>Delete </th>
                <th>Edit </th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->Nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->zipcode }}</td>
                    <td>{{ $client->ville }}</td>
                    <td>{{ $client->pays }}</td>
                    <td>{{ $client->tel }}</td>
                    <td>{{ $client->email }}</td>
                  
                    <td><img src="{{ asset('storage/' . $client->permis) }}"width="30" height="30" alt="Image du permis"></td> <!-- Affichage de l'image -->
                   <td> <a href="{{ route('clients.destroy', ['id' => $client->id]) }}"> Delete </a> </td>
                   <td> <a href="{{ route('clients.edit', ['id' => $client->id]) }}"> Edit </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Aucun client trouvé.</p>
@endif


