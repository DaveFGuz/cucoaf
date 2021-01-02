$(document).ready(function(){
    
    $("#cucoaf").validate({
      errorPlacement: function (error, element) {
            $(element).closest('.form-group').find('.help-block').html(error.html());
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).closest('.form-group').find('.help-block').html('');
        },
      rules: {
        empleado: {
          required: true,
          number: true
        }
      },
      messages: {
        empleado: {
          required: "Por favor, seleccione empleado."
        }
      }
    });

 

    $('.select2').select2()

  
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })


});


  $("#btnguardar").click(function(){
    if($("#cucoaf").valid()){
     document.getElementById('bandera').value="add";
      $("#sitfud").submit();
    }else{
      swal("Advertencia", "Verifique Datos Ingresados", "warning");
    }
    
  });
 
