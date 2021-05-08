    // -------   Mail Send ajax

     $(document).ready(function() {
        var form = $('#contactForm'); // contact form

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
                    $('#btnsubmit').html('Enviando...'); // change submit button text
                },
                success: function(data) {
                    alert.html(data).fadeIn(); // fade in response data
                    form.trigger('reset'); // reset form
                    submit.attr("style", "display: none !important"); // reset submit button text
                },
                error: function(e) {
                    console.log(e)
                }
            });
        });
    });
