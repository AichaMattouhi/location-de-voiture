<form method="POST" enctype="multipart/form-data"  action="{{route('clients_store') }}">
    @csrf

    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
    </div>

    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
    </div>

    <div>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required>
    </div>

    <div>
        <label for="code_postal">Code postal :</label>
        <input type="text" id="code_postal" name="zipcode" required>
    </div>

    <div>
        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required>
    </div>

    <div>
        <label for="pays">Pays :</label>
        <input type="text" id="pays" name="pays" required>
    </div>

    <div>
        <label for="telephone">Numéro de téléphone :</label>
        <input type="text" id="telephone" name="tel" required>
    </div>

    <div>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="photo">Copie du permis de conduire :</label>
        <input type="file" id="photo" name="photo" accept="image/*">
    </div>

    <div>
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required>
    </div>

    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit">Ajouter le client</button>
</form>
