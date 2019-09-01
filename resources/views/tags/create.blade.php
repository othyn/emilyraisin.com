@extends ('layouts.blog', ['sidebar' => true])

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">New tag</h1>
            <h5 class="text-muted">Your it.</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <form method="POST" action="{{ route('tags.store') }}">
        @csrf

        <div class="form-group mb-4">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="clearfix mb-5">
            <a class="d-inline-block" href="{{ route('posts.index') }}">< Back to list</a>
            <button type="submit" class="btn btn-link p-0 d-inline-block float-right">Publish ></button>
        </div>
    </form>

@endsection
