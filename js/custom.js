$(document).ready(function(){
  $('#register').bootstrapValidator({
    excluded: [':disabled', ':hidden', ':not(:visible)'],
    message: 'field is not valid',
      feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      offalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      fullname: {
        validators: {
          notEmpty: {
            message: 'Fullname required!'
          }
        }
      },
      lastname: {
        validators: {
          notEmpty: {
            message: 'Lastname required!'
          }
        }
      },
      phone: {
        validators: {
          notEmpty: {
            message: "Phone number required!"
          },
          regexp: {
            regexp: /^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/,
            message: 'Phone number is not valid!'
          }
        }
      },
      village: {
        validators: {
          notEmpty: {
            message: "Village required!"
          }
        }
      },
      mandal: {
        validators: {
          notEmpty: {
            message: "Mandal required!"
          }
        }
      },
      district: {
        validators: {
          notEmpty: {
            message: "District required!"
          }
        }
      },
      state: {
        validators: {
          notEmpty: {
            message: 'State required!'
          }
        }
      },
      Police_station: {
        validators: {
          notEmpty: {
            message: 'Police Station required!'
          }
        }
      }
    }
  });
})
.on('success.form.bv', function(e) {
  //alert();
  e.preventDefault();
  var $form = $(e.target);
  var bv = $form.data('bootstrapValidator');

  // Use Ajax to submit form data
  var files_array_details = new FormData($('#register')[0]);

  $.ajax({
    url: $form.attr('action'),
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: files_array_details,
    type: 'post',
    async: false,
    success: function(data){
      $('#response').html(data);
      setTimeout(function(){$('.alert').fadeOut();},2000);
      $form.bootstrapValidator('resetForm', true);
    }
  });
});