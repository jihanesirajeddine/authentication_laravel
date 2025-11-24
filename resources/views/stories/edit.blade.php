<x-layout>
    
<div class="d-flex justify-content-center">
        <form class="row g-3" style="max-width: 600px;" action="{{ route('stories.update',$story->id) }}" method="post">
        @csrf
        @method('PUT')
        <h1>Edit</h1>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="col-12">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $story->title }}" required>
        </div>
        <div class="col-12">
            <label for="text" class="form-label">Story</label>
            <textarea class="form-control" id="text" rows="3" name="text" required>{{ $story->text }}</textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-dark" type="submit">Update</button>
            <a href="{{ route('stories.show') }}" class="btn btn-outline-dark" type="submit" >Cancel</a>
        </div>
    </form>
</div>

</x-layout>