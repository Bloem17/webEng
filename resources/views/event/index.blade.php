<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

	@include ('static.nav')

	<h1>All the Events</h1>

	<table class="table table-striped table-bordered">

		<thead>
		    <tr >
		        <td>ID</td>
		        <td>Preis</td>
		        <td>Kurzbeschrieb</td>
		        <td>Titel</td>
		        <td>Dauer</td>
		        <td>Status</td>
		        <td>created_at</td>
		        <td>updated_at</td>
		    </tr>
		</thead>

		@foreach ($events as $events)
			<tbody>
				<tr onclick='test({{ $events->id }})'>
					<td>{{ $events->id }}</td>
					<td>{{ $events->preis }}</td>
					<td>{{ $events->kurzbeschrieb }}</td>
					<td>{{ $events->titel }}</td>
					<td>{{ $events->dauer }}</td>
					<td>{{ $events->status }}</td>
					<td>{{ $events->created_at }}</td>
					<td>{{ $events->updated_at }}</td>
				</tr>
			</tbody>
		@endforeach
	</table>


		
<script type="text/javascript">

function test(id){

	var url = '{{(route("myRoute", ":id"))}}'
	url = url.replace(':id', id);

	window.location.href = url;

}

</script>script>


</body>
</html>