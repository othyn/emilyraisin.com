@isset($anchor)
    <a href="#" data-toggle="modal" data-target="#{{ $name }}Modal">{{ $anchor }}</a>
@endisset

@isset($button)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $name }}Modal">{{ $button }}</button>
@endisset

<div class="modal fade" id="{{ $name }}Modal" tabindex="-1" role="dialog" aria-labelledby="{{ $name }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $name }}ModalLabel">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-modal-submit" data-name="{{ $name }}">{{ $submit }}</button>
            </div>
        </div>
    </div>
</div>
