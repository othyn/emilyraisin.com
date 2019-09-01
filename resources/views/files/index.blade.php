@extends ('layouts.blog', ['sidebar' => false])

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">Manage files</h1>
            <h5 class="text-muted">For your eyes only.. and your articles.. and then the world.</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <h4 class="pb-2">Upload new files</h4>

    <div id="file" class="dropzone mb-5"></div>

    <h4 class="pb-2">Uploaded files</h4>

    <file-table></file-table>

    <a class="btn btn-link text-left d-block mb-5" href="{{ route('posts.index') }}">< Back to list</a>

@endsection

@section ('scripts')
    <script>
        var dropzone = new Dropzone('#file', {
            url: "{{ route('files.store') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        })
        .on('complete', function(file) {
            window.app.$root.$emit('bv::refresh::table', 'file-table');
        });
    </script>
@endsection
