<x-layout>
    <h1 class="mb-5">My stories</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">

        @foreach ($mystories as $story)
            <div class="col-12 mb-3">
                <div class="card">
                <div class="card-body">
                    <p style="font-size: small;">{{ $story->created_at->translatedFormat('d F Y') }}</p>
                    <h5 class="card-title">{{ $story->title }}</h5>
                    <p class="card-text">{{ $story->text }}</p>
                    <a href="{{ route('stories.edit', $story->id)}}" type="button" class="btn btn-outline-success">Edit<i class="bi bi-pencil ms-2"></i></a>
                    <form style="display: inline;" method="post" action="{{ route('stories.destroy',$story->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">Delete<i class="bi bi-trash ms-2"></i></button>
                    </form>
                </div>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>