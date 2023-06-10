<?php
use App\Models\User;
use App\Models\Reservations;
use App\Models\Vehicule;
?>
<h3>Mes Reservations</h3>
<br>

<?php
if ($reservations->count() == 0) {
?>
<h4>Rechercher une reservation</h4>
<form method="GET" action="{{ route('recherchemine', ['id' => $id]) }}">
    <div>Date <input type="date" placeholder="Entrer la date d'effectuation de la reservation" name="date"></div>
    &nbsp;&nbsp;
    <div>Marque<input type="text" placeholder="Entrer la marque que vous cherchez" name="marque"></div>
    &nbsp;&nbsp;
    <div>Rechercher<input type="submit" value="Rechercher"></div>
    &nbsp;&nbsp;
    <div>Annuler <input type="reset" value="Annuler"></div>
</form>
<?php
    echo "Pas de reservations pour le moment";
?>
    <a href="{{route('Allvehicules1')}}">Decouvrez nos dernieres offres</a>
<?php
} else {
    $userId = $reservations[0]->user_id;
?>
<h4>Rechercher une reservation</h4>
<form method="GET" action="{{ route('recherchemine', ['id' => $id]) }}">
    <div>Date <input type="date" placeholder="Entrer la date d'effectuation de la reservation" name="date"></div>
    &nbsp;&nbsp;
    <div>Marque<input type="text" placeholder="Entrer la marque que vous cherchez" name="marque"></div>
    &nbsp;&nbsp;
    <div>Rechercher<input type="submit" value="Rechercher"></div>
    &nbsp;&nbsp;
    <div>Annuler <input type="reset" value="Annuler"></div>
</form>

<?php
    if (!isset($_GET['date']) && !isset($_GET['marque'])) {
?>
<table>
    <tr>
        <td>Id</td>
        <td>Vehicule</td>
        <td>Date debut</td>
        <td>Date fin</td>
        <td>Prix</td>
        <td>Franchise</td>
        <td>Caution</td>
    </tr>
    <?php
        foreach ($reservations as $v) {
            $vehicule = Vehicule::where('id', $v->vehicule_id)->first();
            echo "<tr><td>$v->id</td><td>$vehicule->marque $vehicule->modele</td><td>$v->datedebut</td><td>$v->datefin</td><td>$v->prix</td><td>$v->franchise</td><td>$v->caution</td></tr>";
        }
    ?>
</table>
<?php
    }
}
?>