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

    @if (count($files))

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <th>Name</th>
                    <th>URL</th>
                    <th>Uploaded</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->original_name }}</td>
                            <td>
                                <a href="{{ $file->url }}" target="_blank" rel="noopener noreferrer">{{ $file->url }}</a>
                            </td>
                            <td>{{ $file->created_at }}</td>
                            <td>
                                <a href="{{ route('files.destroy', ['id' => $file->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $files->appends(Request::except('page'))->links() }}

    @else

        <p>There doesn't appear to be anything here yet... please feel free upload some files!</p>

    @endif

    <a class="btn btn-link text-left d-block mb-5" href="{{ route('posts.index') }}">< Back to list</a>

@endsection

@section ('scripts')
    <script>
        var dropzone = new Dropzone('#file', {
            url: "{{ route('files.store') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        });

        $('#hole-tbody').on('click', '.delete-hole-btn', function() {
            let $swalContent = $('#swal-hole-content-template').clone().css({'display': 'block'})
              , location     = $(this).data('location');

            swal({
                title: `Delete ${location}?`,
                text: 'This will permanently delete the hole, with all associated scores and data. This is action not recoverable. Continue?',
                icon: 'warning',
                buttons: ['Hell no!', 'Yes, delete the hole'],
                dangerMode: true,
            })
            .then((value) => {
                if (value) {
                    let game = $(this).data('game')
                      , hole = $(this).data('hole');
                    axios({
                        method: 'DELETE',
                        url: '/games/' + game + '/hole/' + hole
                    })
                    .then((response) => {
                        swal('Hole deleted 💔', 'We\'ll miss you, hole.', 'success');
                        $('#hole-tbody').html(response.data);
                    })
                    .catch((error) => {
                        swal('Uh-oh 😨', 'There was a problem deleting the hole, try again in a minute.', 'error');
                        // TODO: Could do with displaying validation errors
                    });
                }
            });
        });
    </script>
@endsection
