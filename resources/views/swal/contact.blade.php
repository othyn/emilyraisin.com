@component('components.swal', ['name' => 'contact'])
    @isset($anchor)
        @slot('anchor')
            {{ $anchor }}
        @endslot
    @endisset

    @isset($buttonTitle)
        @slot('buttonTitle')
            {{ $buttonTitle }}
        @endslot
    @endisset

    @isset($buttonClass)
        @slot('buttonClass')
            {{ $buttonClass }}
        @endslot
    @endisset

    <form class="text-left">
        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" required="">
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required="">
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label for="message" class="col-form-label">Message</label>
            <textarea id="message" name="message" class="form-control" rows="5" required=""></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="g-recaptcha"></div>
        <div class="invalid-feedback captcha-invalid"></div>
    </form>

@endcomponent
