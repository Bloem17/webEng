<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Schlussabrechnung</title>
	<style>
	
table {
   margin: 100%;
}

        
 
  	</style>
<body>
	<h1>Reise: {{$reise->titel}} {{$reise->id}}</h1>

<h3>Einnahmen</h3>
<table>

<tbody>
		<tr>
			<td>Anzahl Teilnehmer:</td>
			<td> {{$teilnehmer}}</td>
		</tr>
		<tr>
			<td>Preis pro Teilnehmer:</td>
			 <td>{{$reise->preis}}.-</td>
		</tr>
		<tr>
			<td>Gesamtbetrag:</td>
			 <td>{{$betrag}}.-</td>
		</tr>
	</tbody>
</table>

<h3>Ausgaben</h3>
@if (!empty($hr))
<h4>Hotelrechnungen</h4>
<table>

	<thead>
		<tr>
			<td>Rechnungs-Nr</td>
			<td>Betrag</td>
		</tr>
	</thead>
	@foreach ($hr as $rechnung)
	<tbody >
		<tr>
			<td>{{$rechnung->rechnungsNr}}
			</td>
			<td>{{$rechnung->betrag}}.-
			</td>
		</tr>
	</tbody>
    @endforeach
    
</table>
@endif

@if (!empty($rv))
<h4>Reiseversicherung</h4>
<table>

	<thead>
		<tr>
			<td>Rechnungs-Nr</td>
			<td>Betrag</td>
		</tr>
	</thead>
	@foreach ($rv as $rechnung)
	<tbody >
		<tr>
			<td>{{$rechnung->rechnungsNr}}
			</td>
			<td>{{$rechnung->betrag}}.-
			</td>
		</tr>
	</tbody>
    @endforeach
    
</table>
@endif

@if (!empty($ck))
<h4>Carkosten</h4>
<table>

	<thead>
		<tr>
			<td>Rechnungs-Nr</td>
			<td>Betrag</td>
		</tr>
	</thead>
	@foreach ($ck as $rechnung)
	<tbody >
		<tr>
			<td>{{$rechnung->rechnungsNr}}
			</td>
			<td>{{$rechnung->betrag}}.-
			</td>
		</tr>
	</tbody>
    @endforeach
    
</table>
@endif

@if (!empty($essen))
<h4>Essen</h4>
<table>

	<thead>
		<tr>
			<td>Rechnungs-Nr</td>
			<td>Betrag</td>
		</tr>
	</thead>
	@foreach ($essen as $rechnung)
	<tbody >
		<tr>
			<td>{{$rechnung->rechnungsNr}}
			</td>
			<td>{{$rechnung->betrag}}.-
			</td>
		</tr>
	</tbody>
    @endforeach
    
</table>
@endif

@if (!empty($ek))
<h4>Eventkosten</h4>
<table>

	<thead>
		<tr>
			<td>Rechnungs-Nr</td>
			<td>Betrag</td>
		</tr>
	</thead>
	@foreach ($ek as $rechnung)
	<tbody >
		<tr>
			<td>{{$rechnung->rechnungsNr}}
			</td>
			<td>{{$rechnung->betrag}}.-
			</td>
		</tr>
	</tbody>
    @endforeach
    
</table>
@endif

<label>Gesamtausgaben: {{$gesamtbetrag}}.-</label>
<br>
<label>Saldo: {{$betrag-$gesamtbetrag}}.-</label>
</body>
</html>