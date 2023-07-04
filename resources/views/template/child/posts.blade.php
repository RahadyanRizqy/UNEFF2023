<main class="dash-content">
    <div class="container-fluid">
        {{-- <button class="btn btn-primary" id="addPost"> + Tambah Postingan </button> --}}
        <a href="{{ route('posts.create') }}" class="btn btn-choco"> + Tambah Postingan </a>
        <div class="row mt-4" id="posts">
            @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="card spur-card">
                    <div class="card-header ">
                        <div class="spur-card-icon">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        @php
                            $length_limit = 25;
                        @endphp
                        @if (strlen($post->title) > $length_limit)
                            <div class="spur-card-title"> {{ $str->limit($post->title, $limit = $length_limit, $end = "...") }} </div>
                        @else
                            <div class="spur-card-title"> {{ $post->title }} </div>
                        @endif
                        <div class="spur-card-menu">
                            <div class="dropdown show">
                                <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <form id="deleteForm" action="{{ route('posts.destroy',$post->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">Lihat</a>
                                        <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Ubah</a>
                                        <button class="dropdown-item" id="deleteBtn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-container">
                        @if (strpos($post->image, 'png'))
                            <img src="/image/{{ $post->image }}" alt="" class="post-img">
                        @else
                            <img src="{{ $post->image }}" alt="" class="post-img">
                        @endif
                    </div>
                    <div class="card-body "> {{ $str->limit($post->content, $limit = 90, $end = '...') }} </div>
                    <div class="ml-2"> 
                        <p class="mb-0" style="font-size: 85%; color: rgba(0, 0, 0, 0.75)"> oleh 
                            <strong> {{ $post->author->username }} (admin) </strong> 
                         {{ $carbon->parse($post->posted_at)->format('d M Y') }} </p> 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@push('script')
<script src="{{ asset('js/posts.js') }}"></script>
@endpush