@if ($message = session('flash.success'))
    <div class="alert alert-success alert-flash" role="alert">
        {{ $message }}
    </div>
@endif
