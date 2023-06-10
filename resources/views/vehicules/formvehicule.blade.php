<html>
<head>
    FORM1
</head>
<body>
<form  method="POST" enctype="multipart/form-data" action="{{route('addvehicule')}}" >
@csrf
<div>Marque<input type="text" name="marque" placeholder="" size="60" ></div>
<br>
<div>Modele<input type="text" name="modele" placeholder="" size="60" ></div>
<br>
<div>Annee de fabrication<input type="date" name="anneefab" ></div>
<br>
<div>Couleur <input type="text" name="couleur" > </div>
<br>
<div>Moteur<input type="text" name="moteur" ></div>
<br>
<div>Kilometrage<input type="int" name="kilometrage" ></div>
<br>
<div>Nombre de places<input type="int" name="nbrplaces" ></div>
<br>
<div>Climatisation<input type="int" name="climatisation" ></div>
<br>
<div>GPS<input type="int" name="gps" ></div>
<br>
<div>Prix<input type="float" name="prix" ></div>
<br>
<div>Image <input type="file" name="image"></div>
<br>
<div>Valider <input type="submit" value="valider"></div>
<br>
<div>Annuler <input type="reset" value="Annuler"></div>
<br>
</form>