var rootUrl=window.location.protocol+"//"+window.location.host+"/";$(document).on("submit","#createPackageForm",function(e){e.preventDefault(),$("#message").empty(),$.ajax({type:"POST",url:rootUrl,data:$("#createPackageForm").serialize(),dataType:"json",xhrFields:{withCredentials:!0},success:function(e){$("#createPackageModal").modal("toggle"),$("#message").append('<div class="alert alert-success">'+e.message+"</div>"),$("#bookPackageTable").empty(),$("#bookPackageTable").append(e.bookPackages),$("#createPackageForm #packageName").val(""),$("#createPackageForm #fixedPackagePrice").val("")}})}),$(document).on("click",".showEditBookPackage",function(e){e.preventDefault(),$("#message").empty();var a=$(this).data("id");$.ajax({type:"GET",url:rootUrl+a,dataType:"json",xhrFields:{withCredentials:!0},success:function(e){$("#editPackageModal").modal("show"),$('#editPackageForm input[name="id"]').val(e.bookPackage.id),$("#editPackageForm #packageName").val(e.bookPackage.name),$("#editPackageForm #fixedPackagePrice").val(e.bookPackage.fixed_price),$(".editBookList").empty(),$(".editBookList").append(e.bookList)}})}),$(document).on("submit","#editPackageForm",function(e){e.preventDefault(),$("#message").empty(),$.ajax({type:"POST",url:rootUrl+$('#editPackageForm input[name="id"]').val(),data:$("#editPackageForm").serialize(),dataType:"json",xhrFields:{withCredentials:!0},success:function(e){$("#editPackageModal").modal("toggle"),$("#message").append('<div class="alert alert-success">'+e.message+"</div>"),$("#bookPackageTable").empty(),$("#bookPackageTable").append(e.bookPackages)}})}),$(document).on("click",".deleteBook",function(e){e.preventDefault(),$("#message").empty();var a=$(this).data("id"),t=$('#editPackageForm input[name="id"]').val();$.ajax({type:"POST",url:rootUrl+"books/"+a,data:{_method:"DELETE",_token:$('meta[name="csrf-token"]').attr("content"),bookPackageId:t},success:function(e){$(".editBookList").empty(),$(".editBookList").append(e.bookList)}})}),$("#createBookModal").on("show.bs.modal",function(e){var a=$(e.relatedTarget),t=a.data("id"),o=$(this);o.find('.modal-body input[type="hidden"]').val(t)}),$(document).on("submit","#createBookForm",function(e){e.preventDefault(),$("#message").empty(),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({type:"POST",url:rootUrl+"books",data:$("#createBookForm").serialize(),dataType:"json",xhrFields:{withCredentials:!0},success:function(e){$("#createBookModal").modal("toggle"),$("#message").append('<div class="alert alert-success">'+e.message+"</div>"),$("#bookPackageTable").empty(),$("#bookPackageTable").append(e.bookPackages),$('#createBookForm input[name="bookTitle"]').val(""),$('#createBookForm input[name="bookPrice"]').val("")}})}),$(document).on("click",".deleteBookPackage",function(e){e.preventDefault(),$("#message").empty();var a=$(this).data("id");swal({title:"Radera bokpaket?",text:"Bokpaket med alla tillhörande böcker kommer att raderas?",type:"warning",showCancelButton:!0,cancelButtonText:"Avbryt",confirmButtonColor:"#55B95E",confirmButtonText:"Ja, radera bokpaket!",closeOnConfirm:!0},function(e){e&&$.ajax({type:"POST",url:rootUrl+a,data:{_method:"DELETE",_token:$('meta[name="csrf-token"]').attr("content")},success:function(e){$("#message").append('<div class="alert alert-success">'+e.message+"</div>"),$("#bookPackageTable").empty(),$("#bookPackageTable").append(e.bookPackages)}})})});