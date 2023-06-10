<?php
use App\Models\User;
use App\Models\Vehicule;
use App\Models\Reservations;
?>

<H1>Rechercher une reservation</H1>
<form method=GET action="{{ route('recherchemine', ['id' => $id]) }}">
<div>Date <input type="date" placeholder="Entrer la date d'effectuation de la reservation" name="date" > </div>
&nbsp;&nbsp;
<div>Marque<input type="text" placeholder="Entrer la marque que vous cherchez" name="marque" ></div>
&nbsp;&nbsp;
<div>Rechercher<input type="submit" value="Rechercher"></div>
&nbsp;&nbsp;
<div>Annuler <input type="reset" value="Annuler"></div>
</form>
<?php
if ($reservations->count() == 0) 
{
    echo "Pas d'enregistrements correspondants";
    ?>
    <br>
    <br>
    <a href="{{ route('mesreservations', ['id' => $id]) }}">Retourner a la liste de mes reservations</a>
 
    <?php
} 
else 
{
?>
    <table>        
        <tr>
            <td>Id</td>
            <td>Véhicule</td>
            <td>Date début</td>
            <td>Date fin</td>
            <td>Prix</td>
            <td>Franchise</td>
            <td>Caution</td>
        </tr>
        <?php  
        foreach ($reservations as $reservation) 
        {
            echo "<tr>";
            echo "<td>$reservation->id</td>";
            //$client=User::where('id',$reservation->user_id)->first();
            //echo "<td>$client->nom $client->prenom </td>";
            $vehicule=Vehicule::where('id',$reservation->vehicule_id)->first();
            echo "<td>$vehicule->marque $vehicule->modele </td>";
            echo "<td>$reservation->datedebut</td>";
            echo "<td>$reservation->datefin</td>";
            echo "<td>$reservation->prix</td>";
            echo "<td>$reservation->franchise</td>";
            echo "<td>$reservation->caution</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
        <a href="{{ route('mesreservations', ['id' => $id]) }}">Retourner a la liste de mes reservations</a>

<?php
}