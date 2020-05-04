<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function captchaCallback() {
        const form = $('#contactForm');
        const serializedForm = form.serialize();
        console.log(serializedForm);
        $.post("/wp-json/ficticious/v1/contact",
            serializedForm,
            function (data) {
                console.log("SUCCESS");
                console.log(data);

                $('#printf').text(data);
            });
    }
</script>
<div id="printf">

</div>
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