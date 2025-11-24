<x-layout>
    <h1 class="mb-5">All stories</h1>
    <div class="row">

        @foreach ($stories as $story)
            <div class="col-12 mb-3">
                <div class="card">
                <div class="card-body">
                    <h3><i class="bi bi-person-circle me-3"></i>{{ $story->user->name }}</h3>
                    <p style="font-size: small;">{{ $story->created_at->translatedFormat('d F Y') }}</p>
                    <h5 class="card-title">{{ $story->title }}</h5>
                    <p class="card-text">{{ Str::limit($story->text, 200) }}</p>
                    
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalStory">More</button>
                    <div class="modal fade" id="modalStory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalStoryLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalStoryLabel"><i class="bi bi-person-circle me-3"></i>{{ $story->user->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="font-size: small;">{{ $story->created_at->translatedFormat('d F Y') }}</p>
                                    <h4 class="card-title">{{ $story->title }}</h4>
                                    <p class="card-text">{{ $story->text }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>