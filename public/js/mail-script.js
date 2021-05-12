    // -------   Mail Send ajax

     $(document).ready(function() {
        var form = $('#contactForm'); // contact form
        var submit = $('#btnsubmit'); // submit button
        var alert = $('#alert-msg'); // alert div for show alert message

        // form submit event
        form.on('submit', function(e) {
            e.preventDefault(); // prevent default form submit

            $.ajax({
                url: form.attr('action'), // form action url
                type: form.attr('method'), // form submit method get/post
                dataType: 'html', // request type html/json/xml
                data: form.serialize(), // serialize form data
                beforeSend: function() {
                    alert.fadeOut();
                    submit.html('Enviando...'); // change submit button text
                },
                success: function(data) {
                    alert.html(data).fadeIn(); // fade in response data
                    form.trigger('reset'); // reset form
                    submit.attr("style", "display: none !important"); // reset submit button text

                    $('#contactForm').fadeTo( "slow", 1, function() {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor','default');
                        $('#success').fadeIn()
                        $('.modal').modal('hide');
                        $('#success').modal('show');
                    })
                },
                error: function(e) {
                    console.log(e)

                    $('#contactForm').fadeTo( "slow", 1, function() {
                        $('#error').fadeIn()
                        $('.modal').modal('hide');
                        $('#error').modal('show');
                    })
                }
            });
        });
    });
