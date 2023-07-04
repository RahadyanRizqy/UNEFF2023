<main class="dash-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <h2 id="title-constant" class="content-anchor title"> {{ $post->title }}</h2>
                <br>
                <div class="post-image">
                    @if (strpos($post->image, 'png'))
                        <img src="/image/{{ $post->image }}" alt="" width="50%">
                    @else
                        <img src="{{ $post->image }}" alt="" width="50%">
                    @endif
                </div>
                <div class="post-content mt-3">
                    <p> {!! nl2br($post->content) !!} </p>
                </div>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Ubah</a>
                <a href="{{ url()->previous() }}" class="btn btn-danger"> Kembali </a>
            </div>
        </div>
    </div>
</main>
@push('script')
<script src="{{ asset('js/posts.js') }}"></script>
@endpush