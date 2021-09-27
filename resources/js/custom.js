// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
  });


  //create new student form
  $('#myModal').on('shown.bs.modal', function () {
    $('#exampleModal').trigger('focus')
  })

  //create student form
  $(function() {

    $('#createStd').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData($(this)[0]);
         $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $.ajax({
            url: $(this).attr('action'),
            enctype:'multipart/form-data',
            method:'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,

            success: function(response) {

                if(response.status == 400) {

                    $.each(response.errors, function (key, val) {
                        $('span.invalid-feedback').fadeIn();
                        $('strong.'+key+'_error').html(val[0]);
                     });
                } else {
                    $('form').trigger('reset');
                    $('.msg-success').fadeIn();
                    $('.msg-success').html(response.success);
                    $('.invalid-feedback strong').html("");

                    //after 3 seconds message success displayed none
                    setTimeout(function () {

                        $('.msg-success').fadeOut();
                     }, 3000);

                    //refresh when close-btn clicked
                     $('.btn-close').on('click', function () {
                        location.reload();
                      });
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText,);
             }
        });
    });
  });
//################################
//get student data
$(function() {

    $('.updateStudent').on('click', function () {
        $.ajax({
            url: $(this).attr('href'),
            method:'GET',
            dataType: 'json',
            success: function (response) {
                $('.edit-form').attr('action', '/student/ajax/'+response.student.id);
                $('input.name').attr('value', response.student.name);
                $('input.phone').attr('value', response.student.phone);
                $('input.course').attr('value', response.student.course);
             }
        });
     });
});

//################################
//updated student data
$(function() {
    $('.edit-form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData($(this)[0]);

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
            url: $(this).attr('action'),
            enctype:'multipart/form-data',
            method:$(this).attr('method'),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,

            success: function(response) {

                if(response.status == 400) {

                    $.each(response.errors, function(key, val) {

                        $('span.invalid-feedback').fadeIn();
                        $('strong.'+key+'_error').html(val[0]);
                    });
                } else {
                    $('.msg-success').fadeIn();
                    $('.msg-success').html(response.success);
                    $('.invalid-feedback strong').html("");

                    //after 3 seconds message success displayed none
                    setTimeout(function () {

                        $('.msg-success').fadeOut();
                     }, 3000);

                    //refresh when close-btn clicked
                     $('.btn-close').on('click', function () {
                        location.reload();
                      });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
             }
          });
    });
});


//################################
//Delete student
$(function() {
    $('.delete_form').on('submit', function (e) {

        e.preventDefault();

        let formData = new FormData($(this)[0]);

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $.ajax({
            url: $(this).attr('action'),
            method:'DELETE',
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,

            success: function(response) {
                $('.des_msg').fadeIn();
                $('.des_msg').html(response.success);

                setTimeout(function() {

                    $('.des_msg').fadeOut();
                }, 4000);

                $('.btn-close').on('click', function () {
                    location.reload();
                  });
            },
        });

        //delete the tr element after being deleted from DB
        $(this).parents().eq(1).remove();
     });
});
