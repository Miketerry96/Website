document.addEventListener('DOMContentLoaded', function() {
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lfahx0fAAAAAKBfUUCWCrdRplsy_EJG_-aan3yY', { action: 'submit' })
            .then(function(token) {
                var recaptchaResponse = document.getElementById('recaptcha_response');
                if (recaptchaResponse) {
                    recaptchaResponse.value = token;
                } else {
                    console.error('Element with id "recaptcha_response" not found.');
                }
            })
            .catch(function(error) {
                console.error('Error executing reCAPTCHA:', error);
            });
    });
});