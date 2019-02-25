$('.swal-kicker[data-for=contact]').on('click', function() {

    let $swalContent = $('.swal-template[data-for=contact]').clone().css({'display': 'block'});

    swal({
        title: 'Say Hello!',
        content: $swalContent[0],
        buttons: {
            cancel: true,
            catch: {
                text: 'Send Message',
                closeModal: false
            }
        }
    })
    .then((sendMessage) => {
        if (sendMessage) {
            axios.post('/api/contact', {
                name: $('.swal-content').find('[name=name]').val(),
                email: $('.swal-content').find('[name=email]').val(),
                message: $('.swal-content').find('[name=message]').val(),
                captcha: grecaptcha.getResponse()
            })
            .then((response) => {
                swal('Message Sent!', 'Thank you for your message, I will get back to you shortly!', 'success');
            })
            .catch((error) => {
                swal('Uh-oh!', 'There was a problem sending your message, please try again in a minute.', 'error');

                // swal.stopLoading();

                // $('.swal-content').find('[name=name]').addClass('is-invalid');
                // $('.swal-content').find('[name=email]').addClass('is-invalid');
                // $('.swal-content').find('[name=message]').addClass('is-invalid');

                // let formErrors = error.response.data.errors;

                // $('.swal-content').find('[name=name]').next('.invalid-feedback').text(formErrors.name);
                // $('.swal-content').find('[name=email]').next('.invalid-feedback').text(formErrors.email);
                // $('.swal-content').find('[name=message]').next('.invalid-feedback').text(formErrors.message);
                // $('.swal-content').find('div.captcha-invalid').text(formErrors.captcha);
            });
        }
    });

    setTimeout(() => {
        grecaptcha.reset();
        console.log('test');
    }, 500);
    // No callback method exists within swal...
    // https://github.com/t4t5/sweetalert/issues/286
});
