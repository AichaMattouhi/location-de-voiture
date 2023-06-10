<?php
if($vehicules->count()==0)
{
    ?>
    <form method=GET action="{{route('researchvehicles1')}}">
<div>Marque<input type="text" name="marque" placeholder="Entrer la marque que vous cherchez " size="60" ></div>
&nbsp; &nbsp;
<div>Modele<input type="text" name="modele" placeholder="Entrer le modele que vous cherchez" size="60" ></div>
&nbsp;&nbsp;
<div>Couleur <input type="text" placeholder="Entrer la couleur que vous cherchez" name="couleur" > </div>
&nbsp;&nbsp;
<div>Nombre de places<input type="int" placeholder="Entrer le nombre de places que vous cherchez" name="nbrplaces" ></div>
&nbsp;&nbsp;
<div>Prix a partir de <select name="prix">
    <option value="1000">1000</option>
    <option value="10000">10000</option>
    <option value="100000">100000</option>
</select>
<br>
<div>Rechercher<input type="submit" value="Rechercher"></div>
&nbsp;&nbsp;
<div>Annuler <input type="reset" value="Annuler"></div>
</form>
<?php

    echo "pas de tels enregistrements";
    ?>
    <br>
    <a href="{{route('Allvehicules1')}}">Retourner a la page d'accueil </a> 
    <?php
}
else
{

?>
<form method=GET action="{{route('researchvehicles1')}}">
<div>Marque
    <input type="text" name="marque" placeholder="Entrer la marque que vous cherchez" size="60" >
    <div id="marqueSuggestions"></div>
  </div>
&nbsp; &nbsp;
<div>Modele<input type="text" name="modele" placeholder="Entrer le modele que vous cherchez" size="60" ></div>
&nbsp;&nbsp;
<div>Couleur <input type="text" placeholder="Entrer la couleur que vous cherchez" name="couleur" > </div>
&nbsp;&nbsp;
<div>Nombre de places<input type="int" placeholder="Entrer le nombre de places que vous cherchez" name="nbrplaces" ></div>
&nbsp;&nbsp;
<div>Prix a partir de <select name="prix">
    <option value="1000">1000</option>
    <option value="10000">10000</option>
    <option value="100000">100000</option>
</select>
<br>
<div>Rechercher<input type="submit" value="Rechercher"></div>
&nbsp;&nbsp;
<div>Annuler <input type="reset" value="Annuler"></div>
</form>
<table>        
    <tr> <td> Id <td> Marque <td> Modele <td> Annee de Fabrication <td> Couleur <td> Moteur<td>Kilomettrage<td> Nombre de places <td>Climatisation  <td> GPS  <td> Prix <td> Image </tr>
        <?php  
        foreach($vehicules as $v)
        { 
            echo "<tr> <td>$v->id</td> <td>$v->marque</td> <td>$v->modele</td> <td>$v->anneefab</td> <td>$v->couleur</td> <td>$v->moteur</td> <td>$v->kilometrage </td><td>  $v->nbrplaces <td>$v->climatisation</td><td>$v->gps</td><td>$v->prix</td><td><img src='" . asset('storage/' . $v->image) . "' height=200 width=200><td><a href='" . route('reserver') . "'>Reserver maintenant </a></tr>";
        }
        ?>
        </table>
        <br>
        <a href="{{route('Allvehicules1')}}">Retourner a la page d'accueil </a> 
        <?php
}
    ?>