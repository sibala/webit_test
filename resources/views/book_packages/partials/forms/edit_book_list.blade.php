@if(sizeOf($books) > 0)
	<h6>Böcker</h6>
	<hr>

	@foreach($books as $book)
		<div class="row">

			<div class="form-group col-sm-5">
				<input required type="text" class="form-control" name="books[{{ $book->id }}][bookTitle]" value="{{ $book->title }}">
			</div>
			<div class="form-group col-sm-5">
				<input required type="text" class="form-control" name="books[{{ $book->id }}][bookPrice]" value="{{ $book->price }}" pattern="^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$" title="Endast siffror är tillåtna">
			</div>

			<div class="form-group col-sm-2">
				<a href="" class="btn btn-danger deleteBook" data-id="{{ $book->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
			</div>
		</div>
	@endforeach	
@endif