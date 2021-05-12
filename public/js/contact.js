$(document).ready(function(){

    (function($) {
        "use strict";


    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: "¡vamos! tienes un nombre, ¿no?",
                    minlength: "su nombre debe tener al menos 5 caracteres"
                },
                subject: {
                    required: "¡vamos! tienes un asunto, ¿no?",
                    minlength: "tu asunto debe constar de al menos 4 caracteres"
                },
                number: {
                    required: "¡vamos! tienes un número, ¿no?",
                    minlength: "su número debe contener 10 caracteres"
                },
                email: {
                    required: "no hay email, no hay mensaje"
                },
                message: {
                    required: "ummmm... sí, tienes que escribir algo para enviar este mensaje.",
                    minlength: "¿eso es todo? ¿seguro? su mensaje debe tener al menos 20 caracteres"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type: form.attr('method'),
                    data: $(form).serialize(),
                    url: form.attr('action'),
                    success: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    },
                })
            }
        })
    })

 })(jQuery)
})
