<table class="table table-condensed">
	<thead>
		<tr>
			<th style="width: 40%">Paket namn</th>
			<th style="width: 40%">Pris</th>
			<th class="text-center">Hantera</th>
		</tr>
	</thead>
	<tbody>
		@foreach($bookPackages as $package)
			<tr>
				<td>{{ $package->name }}</td>
				<td>{{ $package->price() }} kr</td>
				<td class="text-right">
					<a href="" class="btn btn-notice showEditBookPackage" data-id="{{ $package->id }}" >Ändra</a>

					<a href="" class="btn btn-primary createBook" data-id="{{ $package->id }}" data-toggle="modal" data-target="#createBookModal">Ny bok</a>

					<a href="" class="btn btn-danger deleteBookPackage" data-id="{{ $package->id }}" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>