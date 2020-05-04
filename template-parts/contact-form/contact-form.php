<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function coordinateSuccessAnimation(data) {
        setTimeout(() => {
            $('#progress-loading').slideUp(400);
            $('#progress-end').slideDown(400);
        }, 500);
    }

    function coordinateFailedAnimation() {
        setTimeout(() => {
            $('#progress-loading').slideUp(400);
            $('#progress-error').slideDown(400);
        }, 500);
    }

    function captchaCallback() {
        const form = $('#contactForm');
        form.slideUp(100);
        $('#progress').slideDown(100);
        const serializedForm = form.serialize();
        console.log(serializedForm);
        $
            .post(
                "<?php echo get_site_url() ?>/wp-json/ficticious/v1/contact",
                serializedForm,
                coordinateSuccessAnimation)
            .fail(coordinateFailedAnimation);
    }
</script>
<form id="contactForm" class="contact-form" method="post" action="<?php echo get_permalink() ?>">
    <div class="form-group row">
        <div class="col-12 col-md-6">
            <label for="name">imię / nazwa</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="imię / nazwa">
        </div>
        <div class="col-12 col-md-6">
            <label for="email">adres e-mail</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="adres e-mail">
        </div>
    </div>
    <div class="form-group">
        <label for="type">kategoria wiadomości</label>
        <select name="type" class="form-control" id="type">
            <option value="0" selected>oferta pracy</option>
            <option value="1">inne</option>
        </select>
    </div>
    <div class="form-group">
        <label for="message">treść wiadomości</label>
        <textarea class="form-control" id="message" name="message" rows="8"></textarea>
    </div>
    <div id='recaptcha' class="g-recaptcha"
         data-sitekey="6LdBMe4UAAAAALyxW9gFGRniXxUzc4Xs-6YMUpaE"
         data-callback="captchaCallback"
         data-size="invisible"></div>
    <input type="submit" class="btn btn-primary btn-sm btn-block" value="wyślij"/>
</form>
<div id="progress" class="text-center">
    <div id="progress-loading">
        <h3 class="fas fa-spinner fa-spin"></h3>
        <h3>przesyłanie formularza</h3>
    </div>
    <div id="progress-end">
        <h3 class="fas fa-check"></h3>
        <h3>formularz został wysłany</h3>
    </div>
    <div id="progress-error">
        <h3 class="fas fa-exclamation"></h3>
        <h3>wystąpił błąd, spróbuj ponownie później</h3>
    </div>
</div>