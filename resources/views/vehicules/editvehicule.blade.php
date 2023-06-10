<html>
<head>
    <FORM1
</head>
<body>
<?php
use App\Models\Vehicule;
$v=Vehicule::FindOrFail($id);
?>
<form method="POST" enctype="multipart/form-data" action="{{ route('updatevehicule', $v->id) }}">
@csrf
<div>Marque<input type="text" name="marque" value="{{$v->marque}}" size="60"></div>
<br>
<div>Modele<input type="text" name="modele" value="{{$v->modele}}" size="60"></div>
<br>
<div>Annee de fabrication<input type="date" value="{{$v->anneefab}}" name="anneefab"></div>
<br>
<div>Couleur<input type="text" value="{{$v->couleur}}" name="couleur"></div>
<br>
<div>Moteur<input type="text" value="{{$v->moteur}}" name="moteur"></div>
<br>
<div>Kilometrage<input type="int" value="{{$v->kilometrage}}" name="kilometrage"></div>
<br>
<div>Nombre de places<input type="int" value="{{$v->nbrplaces}}" name="nbrplaces"></div>
<br>
<div>Climatisation<input type="int" value="{{$v->climatisation}}" name="climatisation"></div>
<br>
<div>GPS<input type="int" value="{{$v->gps}}" name="gps"></div>
<br>
<div>Prix<input type="float" value="{{$v->prix}}" name="prix"></div>
<br>
<div>Image<input type="file" id="imageInput" name="image"></div>
<br>
<div>
  <img id="previewImage" src="{{ asset('storage/' . $v->image) }}" height="150" width="150">
</div>
<br>
<div>Valider<input type="submit" value="valider"></div>
<br>
<div>Annuler<input type="reset" value="Annuler"></div>
<br>
</form>

<script>
  // JavaScript code to display the uploaded image
  document.getElementById('imageInput').addEventListener('change', function(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImage').src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
</script>
</body>
</html>