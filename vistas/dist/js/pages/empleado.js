$(document).ready(function(){
    $('#preview').hover(
    function() {
        $(this).find('a').fadeIn();
    }, function() {
        $(this).find('a').fadeOut();
    });

    $('#file-select').on('click', function(e) {
         e.preventDefault();
        
        $('#file').click();
    });

    $('input[type=file]').change(function() {
      var file = (this.files[0].name).toString();
      var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#preview img').attr('src', e.target.result);
        }
         
        reader.readAsDataURL(this.files[0]);
    });

    $('input').on('keypress', function(e){
      if (e.keyCode == 13) {
        // Obtenemos el número del atributo tabindex al que se le dio enter y le sumamos 1
        var TabIndexActual = $(this).attr('tabindex');
        var TabIndexSiguiente = parseInt(TabIndexActual) + 1;
        // Se determina si el tabindex existe en el formulario
        var CampoSiguiente = $('[tabindex='+TabIndexSiguiente+']');
        // Si se encuentra el campo entra al if
        if(CampoSiguiente.length > 0)
        {
        CampoSiguiente.focus(); //Hcemos focus al campo encontrado
        return false; // retornamos false para detener alguna otra ejecucion en el campo
        }else{// Si no se encontro ningún elemento, se retorna false
        return false;
        }
      }
    });
    
    $.validator.addMethod("letrasOespacio", function(value, element) {
        return /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Ingrese sólo letras o espacios.");

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $.validator.addMethod("numero", function(value, element) {
        return /^[ 0-9-()]*$/i.test(value);
    }, "Ingrese sólo números");

    $.validator.addMethod("correo", function(value, element) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
    }, "Ingrese un correo v&aacute;lido.");

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
        nombre: {
          letrasOespacio: true,
          required: true,
          minlength: 3,
          maxlength: 50
        },
        apellido: {
          letrasOespacio: true,
          required: true,
          minlength: 3,
          maxlength: 50
        },
        dui: {
          numero: true,
          required: true,
          minlength: 10
        },
        nit: {
          numero: true,
          required: true,
          minlength: 17
        },
        telefono1:{
          numero: true,
          required: true,
          minlength: 9
        },
        telefono2:{
          numero: true,
          required: false,
          minlength: 9
        },
        direccion: {
          alfanumOespacio: true,
          required: true,
          minlength: 6
        },
        correo: {
          correo: true,
          required:true,
          minlength: 8,
          maxlength: 80
        },
        fechanacimiento: {
          required:true,
        },
        estadofam: {
          required: true,
          number: true
        },
        cargo: {
          required: true,
          number: true
        },
        file:"required"
      },
      messages: {
        nombre: {
          required: "Por favor, ingrese nombre.",
          maxlength: "Debe ingresar m&aacute;ximo 50 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
        },
        apellido: {
          required: "Por favor, ingrese apellido.",
          maxlength: "Debe ingresar m&aacute;ximo 50 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
        },
        dui: {
          required: "Por favor, ingrese dui.",
          minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
        },
        nit: {
          required: "Por favor, ingrese nit.",
          minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
        },
        telefono1: {
          required: "Por favor, ingrese n&uacute;mero tel&eacute;fonico",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },
        telefono2: {
          required: "Por favor, ingrese n&uacute;mero tel&eacute;fonico",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },
        direccion: {
          required: "Por favor, ingrese direcci&oacute;n.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
        },
        correo: {
          required: "Por favor, ingrese un correo v&aacute;lido",
          maxlength: "Debe ingresar m&aacute;ximo 80 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 8 dígitos."
        },
         fechanacimiento: {
          required:"Por favor, ingrese fecha de nacimiento",
        },
        estadofam: {
          required: "Por favor, seleccione estado."
        },
        cargo: {
          required: "Por favor, seleccione cargo."
        },
        file: "Por favor, seleccione una foto."
      }
    });

 

  $('.select2').select2()

    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#fechanacimiento').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })


});

  $("#telefono2").keypress(function(e) {
       if(e.which == 13) {
          $('#btnguardar').click();
       }
    });

  $("#btnguardar").click(function(){
    if($("#cucoaf").valid()){
     document.getElementById('bandera').value="add";
      $("#sitfud").submit();
    }else{
      swal("Advertencia", "Verifique Datos Ingresados", "warning");
    }
    
  });
 
