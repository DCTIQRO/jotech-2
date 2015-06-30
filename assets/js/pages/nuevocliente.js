/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#new_cliente').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    nombre: {
                        required: true,
                    },
                    correo: {
                        required: true,
                        email: true
                    },
                    telefono: {
                        required: true,
                    }
                },
                messages: {
                    nombre: {
                        required: 'Por favor ingresa el nombre del cliente',
                    },
                    correo: {
                        required: 'Por favor ingresa el teléfono del cliente',
						email: 'Ingresa un correo valido',
                    },
                    telefono: {
                        required: 'Por favor ingresa el teléfono del cliente',
                    },
                }
            });
        }
    };
}();