<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>

{!! NoCaptcha::renderJs() !!}

@if (View::hasSection('scripts'))
    @yield ('scripts')
@endif
