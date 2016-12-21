<!DOCTYPE html>
<html>
<head>
	<title>Schlussabrechnung</title>
	<style>
	

		body .main {margin: 30px;}

		.main table { 
			margin-bottom: 20px;
			}
		.main table tr td { background: #FFFFFF; width:370px;}	
		.main table tr:nth-child(odd) td{ background: #F5F5F5;}
		.main table tr td:nth-child(even){width: 300px; text-align: right;}
		.main table thead tr td{font-weight: bold; border-bottom:1pt solid black;}
		.saldo td {border-top:1pt solid black; font-weight: bold;}

		.titel table {
				
				padding: 0;
				width: 100%;
				margin-bottom:20px;
		}



		.titel table tr td {background: #F5F5F5; padding-left: 30px;}
		
		

		
		
	</style>
<div class="main">
<body>
	<h1>Reise: {{$reise->titel}} {{$reise->id}}</h1>
</div>
<div class="titel">
<table>
	<tr>
		<td><h2>Einnahmen</h2></td>
	</tr>
</table>
</div>

<div class ="main">
<table>

<tbody>
		<tr>
			<td>Anzahl Teilnehmer:</td>
			<td> {{$teilnehmer}} Personen</td>
		</tr>
		<tr>
			<td>Preis pro Teilnehmer:</td>
			 <td>{{$reise->preis}}.-</td>
		</tr>
	</tbody>
</table>
</div>

<div class="titel">
<table>
	<tr>
		<td class="titel"><h2>Ausgaben</h2></td>
	</tr>
</table>
</div>
@if (!empty($hr))
<div class="main">
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
<h4>Total</h4>
<table>
	<tbody>
	<tr>
		<td>Gesamteinahmen:</td>
		<td>{{$betrag}}.-</td>
	</tr>
	<tr>
		<td><label>Gesamtausgaben:</label></td>
		<td>{{$gesamtbetrag}}.-</td>
	</tr>
	<tr class="saldo">
		<td >Saldo</td>
		<td>{{$betrag-$gesamtbetrag}}.-</td>
	</tr>

	</tbody>
</table>
</div>
</body>
</html>