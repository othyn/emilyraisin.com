@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">Edit tag</h1>
            <h5 class="text-muted">{{ $tag->name }}</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <form method="POST" action="{{ route('tags.update', [$tag->id]) }}">
        @csrf
        @method ('PATCH')

        <div class="form-group mb-4">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $tag->name }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="clearfix mb-5">
            <a class="d-inline-block" href="{{ route('posts.index') }}">< Back to list</a>
            <button type="submit" class="btn btn-link p-0 d-inline-block float-right">Save ></button>
        </div>
    </form>

@endsection
