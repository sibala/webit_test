@extends('layouts/layout')

@section('content')

@include('book_packages.partials.forms.create_book_package_modal')
@include('book_packages.partials.forms.edit_book_package_modal')
@include('books.partials.forms.create_book_modal')

<div class="container">

	<div class="row">
    	<div id="message" class="col-sm-12">
    	</div>
        <div class="col-xs-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!! session()->get('message') !!}
                </div>
            @endif
        </div>
    </div>

	<div class="row">
		<div class="col-sm-8 col-lg-10">
			<h1>Listar alla bokpaket</h1>
		</div>

		<div class="col-sm-4 col-lg-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPackageModal">Nytt bokpaket</button>
		</div>
	</div>

	<br>
	
	<div id="bookPackageTable">
		@include('book_packages.partials.tables.book_package_table')
	</div>
</div>

@endsection


@section('footer')

<script src="{{ asset('js/script.js') }}"></script>

@endsection
