$('.btn-modal-submit[data-name=contact]').on('click', () => {
    console.log($('#message').val());
    axios.get('/api/contact');

    $('#message').val('');
    $('#contactModal').modal('hide');
});
