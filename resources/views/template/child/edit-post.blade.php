{{-- <main class="dash-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <input type="text" name="title" id="title-modify" class="title" value="{{ $post->title }}" size="50">
                <br>
                <div class="post-image mt-3">
                    @if (strpos($post->image, 'png'))
                        <img src="/image/{{ $post->image }}" alt="" width="50%">
                    @else
                        <img src="{{ $post->image }}" alt="" width="50%">
                    @endif
                </div>
                <div class="post-content mt-3">
                    <p> {!! nl2br($post->content) !!} </p>
                </div>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Simpan</a>
                <a href="{{ url()->previous() }}" class="btn btn-danger"> Kembali </a>
            </div>
        </div>
    </div>
</main> --}}
<main class="dash-content-form">
    <div class="container-fluid">
        <div class="row mt-4" id="addPostForm">
            <div class="col-xl-12">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <div class="spur-card-title"> Form Ubah Berita </div>
                    </div>
                    <div class="card-form">
                        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            {{-- MULTIPART FORM DATA UNTUK MENERIMA SELAIN DATA TEKSTUAL --}}
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul" value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="content">Konten</label>
                                <textarea class="form-control" id="content" rows="15" name="content" placeholder="Masukkan isi berita">{{$post->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Berita</label>
                                <br>
                                @if(strpos($post->image, 'png'))
                                <img src="/image/{{ $post->image }}" alt="" width="50%">
                                @else
                                <img src="{{ $post->image }}" alt="" width="50%">
                                @endif
                                <br>

                                <div class="mt-3">
                                    @if(strpos($post->image, 'png'))
                                    <label for="file-picture">File</label>
                                    <input type="radio" name="type-chosen" id="file-picture" value="file" checked>
    
                                    <label for="url-picture">URL</label>
                                    <input type="radio" name="type-chosen" id="url-picture" value="url">
    
                                    <input type="file" name="image" class="form-control" id="file-input" placeholder="image" value="asdasda.jpg">
                                    <input type="text" name="image" class="form-control d-none" id="url-input" placeholder="https://picsum.photos/id/1/200/300">
                                    @else
                                    <label for="file-picture">File</label>
                                    <input type="radio" name="type-chosen" id="file-picture" value="file">
    
                                    <label for="url-picture">URL</label>
                                    <input type="radio" name="type-chosen" id="url-picture" value="url" checked>
    
                                    <input type="file" name="image" class="form-control" id="file-input" placeholder="image">
                                    <input type="text" name="image" class="form-control d-none" id="url-input" placeholder="https://picsum.photos/id/1/200/300" value="{{ $post->image }}">
                                    @endif
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('posts.index') }}" class="btn btn-danger button-spacing"> Kembali </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@push('script')
<script src="{{ asset('js/posts.js') }}"></script>
@endpush