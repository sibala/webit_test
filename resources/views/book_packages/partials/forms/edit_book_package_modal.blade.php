<div class="modal fade" id="editPackageModal" tabindex="-1" role="dialog" aria-labelledby="editPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPackageModalLabel">Ändra bokpaket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="editPackageForm" action="#">
	      	<div class="modal-body">
	      		{{ csrf_field() }}

				<input type="hidden" class="form-control" name="id" value="">

				<input type="hidden" class="form-control" name="_method" value="PATCH">

				<div class="form-group required">
					<label class="form-control-label">Paket namn: <span>*</span></label>
					<input required type="text" class="form-control" id="packageName" name="packageName">
				</div>
				<div class="form-group">
					<label class="form-control-label">Fast paketpris:</label>
					<input type="text" class="form-control" id="fixedPackagePrice" name="fixedPackagePrice" placeholder="Lämnas tomt om priset skall vara summan av böckerna" pattern="^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$" title="Endast siffror är tillåtna">
				</div>

				<br>

				<div class="editBookList">
					@if(isset($books))
						@include('book_packages.partials.forms.edit_book_list')
					@endif
				</div>
	        
		    </div>
		  	<div class="modal-footer">
		       	<input type="submit" class="btn btn-primary" value="Uppdatera">
		    </div>
      </form>
    </div>
  </div>
</div>