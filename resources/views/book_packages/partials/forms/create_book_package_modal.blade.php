<div class="modal fade" id="createPackageModal" tabindex="-1" role="dialog" aria-labelledby="createPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPackageModalLabel">Nytt bokpaket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="createPackageForm" action="#">
	      <div class="modal-body">
	      	{{ csrf_field() }}
	        
	          <div class="form-group required">
	            <label class="form-control-label">Paket namn: <span>*</span></label>
	            <input required type="text" class="form-control" id="packageName" name="packageName">
	          </div>
	          <div class="form-group">
	            <label class="form-control-label">Fast paketpris:</label>
	            <input type="text" class="form-control" id="fixedPackagePrice" name="fixedPackagePrice" placeholder="Lämnas tomt om priset skall vara summan av böckerna" pattern="^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$" title="Endast siffror är tillåtna">
	          </div>
	        
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" value="Skapa">
	      </div>
      </form>
    </div>
  </div>
</div>