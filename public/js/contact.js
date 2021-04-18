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
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "¡vamos! tienes un nombre, ¿no?",
                    minlength: "su nombre debe tener al menos 2 caracteres"
                },
                subject: {
                    required: "¡vamos! tienes un tema, ¿no?",
                    minlength: "tu asunto debe constar de al menos 4 caracteres"
                },
                number: {
                    required: "¡vamos! tienes un número, ¿no?",
                    minlength: "su número debe constar de al menos 5 caracteres"
                },
                email: {
                    required: "no hay email, no hay mensaje"
                },
                message: {
                    required: "ummmm... sí, tienes que escribir algo para enviar este mensaje.",
                    minlength: "¿eso es todo? ¿seguro?"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"/contact/send",
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
                    }
                })
            }
        })
    })

 })(jQuery)
})
