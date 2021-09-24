//http://dev.local/velorution-metz/wp-json/velorution-metz/email

$(document).ready(function () {
    console.log('ok')
    $('form#email').submit(function (e) {
        let email = $(this).find('[type="email"]').val()
        $.post('wp-json/velorution-metz/email', { email }).then(response => {
            alert('Inscription réussie. Vous allez recevoir un e-mail de confirmation. A bientôt !');
            $(this).find('[type="email"]').val('')
        }).catch(error => {
            if ('message' in error.responseJSON) {
                alert(error.responseJSON.message);
            }
        })
        e.preventDefault();
    })
});