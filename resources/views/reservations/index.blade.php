<?php
use App\Models\User;
use App\Models\Reservations;
use App\Models\Vehicule;
?>


<H1>Rechercher une reservation</H1>
<form method=GET action="{{route('researchreservations')}}">
<div>Nom du client<input type="text" name="nom" placeholder="Entrer le nom du client que vous cherchez " size="60" ></div>
&nbsp; &nbsp;
<div>Prenom du client<input type="text" name="prenom" placeholder="Entrer le prenom du client que vous cherchez" size="60" ></div>
&nbsp;&nbsp;
<div>Date <input type="date" placeholder="Entrer la date d'effectuation de la reservation" name="date" > </div>
&nbsp;&nbsp;
<div>Marque<input type="text" placeholder="Entrer la marque que vous cherchez" name="marque" ></div>
&nbsp;&nbsp;
<div>Rechercher<input type="submit" value="Rechercher"></div>
&nbsp;&nbsp;
<div>Annuler <input type="reset" value="Annuler"></div>
</form>
<?php


    if( !isset($_GET['nom']) && !isset($_GET['prenom']) && !isset($_GET['date']) && !isset($_GET['marque'])  )
    {
    ?>

        <table>        
        <tr> <td> Id <td> Client <td> Vehicule <td> Date debut <td> Date fin <td> Prix<td>Franchise<td> Caution </tr>
        <?php  
        foreach($reservations as $v)
        { 
            $client=User::where('id',$v->user_id)->first();
            $vehicule=Vehicule::where('id',$v->vehicule_id)->first();
            echo "<tr> <td>$v->id</td> <td>$client->nom $client->prenom</td> <td>$vehicule->marque $vehicule->modele </td> <td>$v->datedebut</td> <td>$v->datefin</td> <td>$v->prix</td> <td>$v->franchise </td><td>  $v->caution </td> </tr>";
        }
        ?>
        </table>
        <?php
    }
  

    ?>