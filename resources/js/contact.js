$('.swal-kicker[data-for=contact]').on('click', function() {

    let $swalContent = $('.swal-template[data-for=contact]').clone().css({'display': 'block'});

    swal({
        title: 'Say Hello!',
        content: $swalContent[0],
        buttons: [true, 'Send Message']
    })
    .then((sendMessage) => {
        if (sendMessage) {
            axios.post('/api/contact', {
                name: $('.swal-content').find('[name=name]').val(),
                message: $('.swal-content').find('[name=message]').val()
            })
            .then((response) => {
                swal('Message Sent!', 'Thank you for your message, I will get back to you shortly!', 'success');
            })
            .catch((error) => {
                swal('Uh-oh!', 'There was a problem sending your message, please try again in a minute.', 'error');
            });
        }
    });
});
