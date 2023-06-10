<?php
use App\Models\Vehicule;
use App\Models\Reservations;

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


?>

<html>
<head>
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
                },
                onSelect: function() {
                    calculateTotal();
                }
            });

            // Calculate the total price
            function calculateTotal() {
                var startDate = new Date($('#datedebut').val());
                var endDate = new Date($('#datefin').val());
                var days = Math.round((endDate - startDate) / (24 * 60 * 60 * 1000));

                if (days > 0) {
                    var prix = parseFloat($('#prix').val());
                    var total = prix * days;
                    $('#total').val(total.toFixed(2));
                } else {
                    $('#total').val('');
                }
            }
        });
    </script>
</head>
<body>
    <h3>Reservez Maintenant:</h3>
    <form method="POST" action="{{ route('reserver', ['id' => $id, 'iu' => $iu]) }}">
        @csrf
        <div>
            Date Debut <input type="text" name="datedebut" id="datedebut" size="60" value="{{ old('datedebut') }}" readonly>
            @error('datedebut')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            Date Fin <input type="text" name="datefin" id="datefin" size="60" value="{{ old('datefin') }}" readonly>
            @error('datefin')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            Prix/jour <input type="text" id="prix" name="prix" value="{{ $v->prix }}" readonly>
        </div>
        
        <br>
        <div>
            Total: DH  <input type="text" id="total" name="total" readonly>
        </div>
        <br>
        <div>
            Franchise<input type="text" name="franchise" value="200" readonly>
        </div>
        <br>
        <div>
            Caution<input type="text" name="caution" value="200" readonly>
        </div>
        <br>
        <div>
            Valider <input type="submit" value="valider">
        </div>
        <br>
        <div>
            Annuler <input type="reset" value="Annuler">
        </div>
        <br>
    </form>
</body>
</html>