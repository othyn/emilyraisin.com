@isset($anchor)
    <a href="#" class="swal-kicker" data-for="{{ $name }}">{{ $anchor }}</a>
@endisset

@isset($buttonTitle)
    <button type="button" class="btn btn-{{ $buttonClass ?? 'primary' }} swal-kicker" data-for="{{ $name }}">{{ $buttonTitle }}</button>
@endisset

<section class="swal-template" data-for="{{ $name }}" style="display: none">
    {{ $slot }}
</section>
