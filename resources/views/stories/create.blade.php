<x-layout>
    
<div class="d-flex justify-content-center">
    <form class="row g-3" style="max-width: 600px;" action="{{ route('stories.store') }}" method="post">
        @csrf
        <h1>Create</h1>
        
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
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="col-12">
            <label for="text" class="form-label">Story</label>
            <textarea class="form-control" id="text" rows="3" name="text"></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-dark" type="submit">Create</button>
            <a href="{{ route('stories.index') }}" class="btn btn-outline-dark" type="submit" >Cancel</a>
        </div>
    </form>
</div>

</x-layout>