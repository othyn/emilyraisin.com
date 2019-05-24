@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">Edit post</h1>
            <h5 class="text-muted">{{ $post->title }}</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <form method="POST" action="{{ route('posts.update', [$post->id]) }}">
        @csrf
        @method ('PATCH')

        <div class="form-group mb-4">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $post->title }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="subtitle">Subtitle</label>
            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle') ?? $post->subtitle }}" required>
            @error('subtitle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="tags">Tags</label>
            {!! Form::select('tags[]',
                $tags->pluck('name', 'id'),
                $post->tags,
                [
                    'id' => 'tags',
                    'class' => 'custom-select',
                    'multiple' => 'multiple',
                    'size' => 7
                ])
            !!}
        </div>

        <div class="form-group mb-4">
            <label for="body">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="10">{{ old('body') ?? $post->body }}</textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="clearfix mb-5">
            <a class="d-inline-block" href="{{ route('posts.index') }}">< Back to list</a>
            <button type="submit" class="btn btn-link p-0 d-inline-block float-right">Save ></button>
        </div>
    </form>

@endsection
