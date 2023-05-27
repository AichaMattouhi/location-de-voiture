
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

@if(count($users) > 0)
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
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td>{{ $user->zipcode }}</td>
                    <td>{{ $user->ville }}</td>
                    <td>{{ $user->pays }}</td>
                    <td>{{ $user->tel }}</td>
                    <td>{{ $user->email }}</td>
                  
                    <td><img src="{{ asset('storage/' . $user->permis) }}"width="30" height="30" alt="Image du permis"></td> <!-- Affichage de l'image -->
                   <td> <a href="{{ route('clients.delete', ['id' => $user->id]) }}"> Delete </a> </td>
                   <td> <a href="{{ route('clients.edit', ['id' => $user->id]) }}"> Edit </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Aucun client trouvé.</p>
@endif



