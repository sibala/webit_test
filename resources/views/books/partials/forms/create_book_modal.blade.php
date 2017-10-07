<div class="modal fade" id="createBookModal" tabindex="-1" role="dialog" aria-labelledby="createBookModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createBookModalLabel">Ny bok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="createBookForm" action="#">
		<div class="modal-body">

			<input type="hidden" name="bookPackageId" value="">

			<div class="form-group required">
				<label class="form-control-label">Titel: <span>*</span></label>
				<input required type="text" class="form-control" id="bookTitle" name="bookTitle">
			</div>
			<div class="form-group">
				<label class="form-control-label">Pris: <span>*</span></label>
				<input required type="text" class="form-control" id="bookPrice" name="bookPrice" pattern="^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$" title="Endast siffror är tillåtna">
			</div>

		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="Skapa">
		</div>
      </form>
    </div>
  </div>
</div>