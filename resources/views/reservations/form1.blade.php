<html>
    
<head>
    <?php
    use App\Models\Vehicule;
    use App\Models\Reservations;

    ?>
    <?php
    $v=Vehicule::where('id',$iu)->first();
    $reservations = Reservations::where('vehicule_id', $iu)->get();
    $unavailableDates = [];

    ?>
    <table>
        <tr><td> Id vehicule {{ $v->id }}</td></tr>
        <tr><td>Marque {{ $v->marque }}</td></tr>
        <tr><td>Modele {{ $v->modele }}</td></tr>
        <tr><td> Annee de fabrication {{ $v->anneefab }}</td></tr>
        <tr><td>Couleur {{ $v->couleur }}</td></tr>
        <tr><td>Moteur {{ $v->moteur }}</td></tr>
        <tr><td>Kilometrage {{ $v->kilometrage }}</td></tr>
        <tr><td>Nombre de places {{ $v->nbrplaces }}</td></tr>
        <tr><td>Climatisation {{ $v->climatisation }}</td></tr>
        <tr><td>GPS {{ $v->gps }}</td></tr>
        <tr><td>Prix/jour {{ $v->prix }}</td></tr>
        <td>
            <img src="{{ asset('storage/' . $v->image) }}" height="200" width="200"></td>
    </table>

    <html>

    <!-- Include the necessary libraries and CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            var unavailableDates = <?php echo json_encode($unavailableDates); ?>;

            // Initialize the datepicker
            $("#datedebut, #datefin").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                beforeShowDay: function(date) {
                    var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                    return [!unavailableDates[dateString]];
                }
            });
        });
    </script>
</head>
<?php
$v = Vehicule::where('id', $iu)->first();
$reservations = Reservations::where('vehicule_id', $iu)->get();
$unavailableDates = [];

foreach ($reservations as $reservation) {
    $start = $reservation->datedebut;
    $end = $reservation->datefin;

    // Generate the range of dates between start and end
    $dates = Carbon\CarbonPeriod::create($start, $end)->toArray();

    foreach ($dates as $date) {
        $unavailableDates[$date->format('Y-m-d')] = true;
    }
}
?>