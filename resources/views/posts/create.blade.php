@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">New post</h1>
            <h5 class="text-muted">Make those words count.</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <form method="POST" action="{{ route('posts.store') }}">
        {{ csrf_field() }}

        <div class="form-group mb-4">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="subtitle">Subtitle</label>
            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
            @error('subtitle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="body">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="10">{{ old('body') }}</textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="clearfix mb-5">
            <a class="d-inline-block" href="{{ route('posts') }}">< Back to list</a>
            <button type="submit" class="btn btn-link p-0 d-inline-block float-right">Publish ></button>
        </div>
    </form>

@endsection
