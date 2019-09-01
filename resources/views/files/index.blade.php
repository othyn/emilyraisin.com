@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">Manage files</h1>
            <h5 class="text-muted">For your eyes only.. and your articles.. and then the world.</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <a class="btn btn-link text-left d-block border-bottom pb-4 mb-5" href="{{ route('posts.index') }}">< Back to list</a>

    <div id="file" class="dropzone"></div>

@endsection

@section ('scripts')
    <script>
        var dropzone = new Dropzone('#file', {
            url: "{{ route('files.store') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        });
    </script>
@endsection
