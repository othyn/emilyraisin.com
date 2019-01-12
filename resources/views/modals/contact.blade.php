@component('components.modal', ['name' => 'contact'])
    @isset($anchor)
        @slot('anchor')
            {{ $anchor }}
        @endslot
    @endisset

    @isset($button)
        @slot('button')
            {{ $button }}
        @endslot
    @endisset

    @slot('title')
        Say Hello!
    @endslot

    @slot('submit')
        Send Message
    @endslot

    <form class="text-left">
        <div class="form-group">
            <label for="message" class="col-form-label">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5"></textarea>
        </div>
    </form>
@endcomponent
