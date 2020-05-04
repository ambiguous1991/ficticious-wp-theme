$(document).ready(()=>{
    function handleSubmit(form) {
        console.log('Performing captcha validation');
        grecaptcha.execute();
    }

    $('#contactForm').validate({
        validClass: 'is-valid',
        errorClass: 'is-invalid',
        errorElement: 'div',
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            message: {
                required: true,
            }
        },
        messages: {
            name: "Pole jest wymagane",
            email: {
                required: "Pole jest wymagane",
                email: "Adres e-mail jest nieprawidłowy",
            },
            message: "Pole jest wymagane",
        },
        submitHandler: handleSubmit
    })
});