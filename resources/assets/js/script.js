var rootUrl = window.location.protocol + "//" + window.location.host + "/";


$(document).on('submit', '#createPackageForm', function(e) {
    e.preventDefault();
    $('#message').empty();

    $.ajax({
        type: 'POST',
        url: rootUrl, 
        data: $('#createPackageForm').serialize(),
        dataType: 'json',
        xhrFields: {
            withCredentials: true
        },
        success: function(data) {
        	$('#createPackageModal').modal('toggle');
        	$('#message').append('<div class="alert alert-success">' + data.message + '</div>');
        	$('#bookPackageTable').empty();
        	$('#bookPackageTable').append(data.bookPackages);

            $('#createPackageForm #packageName').val('');
            $('#createPackageForm #fixedPackagePrice').val('');
        }
    });
});


$(document).on('click', '.showEditBookPackage', function(e) {
    e.preventDefault();
    $('#message').empty();

    var bookPackageId = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: rootUrl + bookPackageId, 
        dataType: 'json',
        xhrFields: {
            withCredentials: true
        },
        success: function(data) {
            $('#editPackageModal').modal('show');
            $('#editPackageForm input[name="id"]').val(data.bookPackage.id);
            $('#editPackageForm #packageName').val(data.bookPackage.name);
            $('#editPackageForm #fixedPackagePrice').val(data.bookPackage.fixed_price);

            $('.editBookList').empty();
            $('.editBookList').append(data.bookList);
        }
    });
});


$(document).on('submit', '#editPackageForm', function(e) {
    e.preventDefault();
    $('#message').empty();

    $.ajax({
        type: 'POST',
        url: rootUrl + $('#editPackageForm input[name="id"]').val(), 
        data: $('#editPackageForm').serialize(),
        dataType: 'json',
        xhrFields: {
            withCredentials: true
        },
        success: function(data) {
        	$('#editPackageModal').modal('toggle');
        	$('#message').append('<div class="alert alert-success">' + data.message + '</div>');
        	$('#bookPackageTable').empty();
        	$('#bookPackageTable').append(data.bookPackages);
        }
    });
});


$(document).on('click', '.deleteBook', function(e) {
    e.preventDefault();
    $('#message').empty();

    var bookId = $(this).data('id');
    var bookPackageId = $('#editPackageForm input[name="id"]').val();
	// console.log($('#createBookForm').serialize() );
	// throw new Error('die');

    $.ajax({
		type: 'POST',
		url: rootUrl + 'books/' + bookId,
		data: {
			_method: 'DELETE',
			_token: $('meta[name="csrf-token"]').attr('content'),
			bookPackageId: bookPackageId

		},
        success: function(data) {
        	$('.editBookList').empty();
            $('.editBookList').append(data.bookList);
        }
    });
});


$('#createBookModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var bookPackageId = button.data('id') // Extract book_package_id from data-* attributes

	var modal = $(this)
	modal.find('.modal-body input[type="hidden"]').val(bookPackageId)
})


$(document).on('submit', '#createBookForm', function(e) {
    e.preventDefault();
    $('#message').empty();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
 	});

    $.ajax({
        type: 'POST',
        url: rootUrl + 'books', 
        data: $('#createBookForm').serialize(),
        dataType: 'json',
        xhrFields: {
            withCredentials: true
        },
        success: function(data) {
        	$('#createBookModal').modal('toggle');
        	$('#message').append('<div class="alert alert-success">' + data.message + '</div>');
        	$('#bookPackageTable').empty();
	        $('#bookPackageTable').append(data.bookPackages);
	        $('#createBookForm input[name="bookTitle"]').val('');
	        $('#createBookForm input[name="bookPrice"]').val('');
        }
    });
});


$(document).on('click', '.deleteBookPackage', function(e) {
	e.preventDefault();
    $('#message').empty();

    var bookPackageId = $(this).data('id');
	// console.log(bookPackageId);
	// throw new Error('die');
		
    swal({
        title: "Radera bokpaket?",
        text: "Bokpaket med alla tillhörande böcker kommer att raderas?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: 'Avbryt',
        confirmButtonColor: "#55B95E",
        confirmButtonText: "Ja, radera bokpaket!",
        closeOnConfirm: true
    },
    function(isConfirm){
        if (isConfirm) {
			$.ajax({
				type: 'POST',
				url: rootUrl + bookPackageId,
				data: {
					_method: 'DELETE',
					_token: $('meta[name="csrf-token"]').attr('content')
				},
				success: function(data) {
					$('#message').append('<div class="alert alert-success">' + data.message + '</div>');
	            	$('#bookPackageTable').empty();
	            	$('#bookPackageTable').append(data.bookPackages);
				}
			});
        }
    });
});