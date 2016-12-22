<!DOCTYPE html>
<html>
<head>
	<title>Schlussabrechnung</title>
	<style>
	
		@page{margin: 0px;}

		body .main {margin-left: 30px;}
		body .rech {margin-left: 30px;}

		.main table { 
			border: 1pt solid black;
			border-spacing: 0;
			padding: 0;
			margin-bottom: 20px;
			}

		.main table tr td { background: #FFFFFF; width:350px;}	
		.main table tr:nth-child(odd) td{ background: #ADD8E6;}
		.main table tr td:nth-child(even){ text-align: right;}
	

		.saldo td {border-top:1pt solid black; font-weight: bold;}


		.rech table tbody tr:nth-child(even) td{ background: #ADD8E6;}
		.rech table thead tr td{font-weight: bold; border-bottom:1pt solid black; background: #ADD8E6;}
		.rech table tr td {background: #FFFFFF;; width: 233px;}

		.main table thead tr td{font-weight: bold; border-bottom:1pt solid black; background: #ADD8E6;}

		.rech table{
			border: 1pt solid black; 
			border-spacing: 0;
			padding: 0;
			margin-bottom: 20px;
		}

		.titel table {
				border-spacing: 0;
				padding: 0;
				width: 100%;
				margin-bottom:20px;
		}



		.titel table tr td {background: #F5F5F5; padding-left: 30px;}
		
		

		
		
	</style>
<div class="main">
<body>
	<h1>Reise: {{$reise->titel}} ID: {{$reise->id}}</h1>
</div>
<div class="titel">
<table>
	<tr>
		<td><h4>Einnahmen</h4></td>
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
			 <td>{{$reise->preis}}</td>
		</tr>
	</tbody>
</table>
</div>

<div class="titel">
<table>
	<tr>
		<td class="titel"><h4>Ausgaben</h4></td>
	</tr>
</table>
</div>

<div class="rech">
<table>
<thead>
	<tr>
		<td>Nr</td>
		<td style="text-align: left;">Kategorie</td>
		<td style="text-align: right;">Betrag in CHF</td>
	</tr>
</thead>
<tbody>
	@foreach ( $reise->rechnung as $rechnung )
	<tr>
		<td>{{ $rechnung->rechnungsNr }}</td>
		<td style="text-align: left;">{{ $rechnung->rechnungstyp }}</td>
		<td style="text-align: right;">{{ $rechnung->betrag }}</td>
	</tr>
	@endforeach
</tbody>
</table>
</div>
<div class="titel">
<table>
	<tr>
		<td><h4>Total</h4></td>
	</tr>
</table>
</div>

<div class ="main">

<table>
	<thead>
		<tr>
			<td></td>
			<td>Betrag in CHF</td>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Gesamteinahmen:</td>
		<td>{{$betrag}}</td>
	</tr>
	<tr>
		<td><label>Gesamtausgaben:</label></td>
		<td>{{$gesamtbetrag}}</td>
	</tr>
	<tr class="saldo">
		<td >Saldo</td>
		<td>{{$betrag-$gesamtbetrag}}</td>
	</tr>

	</tbody>
</table>

</div>


</body>
</html>