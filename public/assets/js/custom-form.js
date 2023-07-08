// Page Reload Form Submit
$(document).on('submit' , '.form_submit' , function (e){
    e.preventDefault();
    var url = $(this).attr('data-href');
    var redirect = $(this).attr('data-redirect');
    $.ajax({
        url: url,
        type: 'POST',
        data:  new FormData(this),
        contentType: false,
        processData:false,
        success: function (response){
            if(response.status === 200){
                $('.form_submit')[0].reset();
                toastr.success(response.message);
                setTimeout(function(){
                    window.location.href = redirect;
                }, 1000);
            }else if(response.status === 500){
                toastr.error(response.error_message);
            }else{
                $.each(response.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.after($('<span class="responseError" style="color: red;">' + error[0] + '</span>'));
                });
            }
        }
    })
});

// Same Page Form Submit
$(document).on('submit' , '.same_page_form' , function (e){
    e.preventDefault();
    var url = $(this).attr('data-href');
    $.ajax({
        url: url,
        type: 'POST',
        data:  new FormData(this),
        contentType: false,
        processData:false,
        success: function (response){
            if(response.status == 200){
                $('.same_page_form')[0].reset();
                toastr.success(response.message);
                $('.dataTable').DataTable().ajax.reload();
                $('.modal').modal('hide');
            }else if(response.status == 500){
                toastr.error(response.error_message);
            }else{
                $.each(response.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.after($('<span class="responseError" style="color: red;">' + error[0] + '</span>'));
                });
            }
        }
    })
});

// Delete Same Page Form
$(document).on('click' , '.same_page_delete' , function (e){
    e.preventDefault();
    var url = $(this).attr('data-href');
    $.ajax({
        url: url,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response){
            if(response.status == 200){
                toastr.success(response.message);
                $('.dataTable').DataTable().ajax.reload();
                $('.modal').modal('hide');
            }else {
                toastr.error(response.error_message);
            }
        }
    })
});
