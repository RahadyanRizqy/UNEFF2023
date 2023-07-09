<main class="dash-content">
    <div class="container-fluid">
        <h2 class="mb-3 fw-bold editable-item" id="title">{{ $rules->title }}</h2>
        <div class="d-flex">
            <h6>Link Form: </h6>
            <h6 class="ml-1 editable-item" id="gform-link">{{ $rules->externalFormLink }}</h6>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">
        
                @foreach ($rules->section as $section)
                <div class="sections">
                    <div class="d-flex align-items-center">
                        <h3 class="fw-normal editable-item section-title">{{ $section->title }}</h3>
                        <i class="ml-3 fa-regular fa-trash-can"></i>
                    </div>
                    <ol class="section-list">
                        @foreach($section->list as $sectionList)
                        <div class="d-flex align-items-center">
                            <li class="editable-item">{{ $sectionList }}</li>
                            <i class="ml-1 fa-solid fa-circle-minus"></i>
                        </div>
                        @endforeach
                        <i class="fa-solid fa-circle-plus"></i>
                    </ol>
                </div>
                @endforeach
                <button id="add-section-btn" class="btn btn-choco">Tambah</button>
                <button id="save-button" class="btn btn-primary">Simpan</button>
            </div>
            <div class="col-sm-7">
                <div class="gform-container mb-3">
                    <iframe id="google-form" src="{{ str_replace('usp=sf_link', 'embedded=true', $rules->externalFormLink) }}" width="100%" frameborder="0" marginheight="0" marginwidth="0" scrolling="yes" style="height: 100vh">Loading…</iframe>
                </div>
            </div>
        </div>
    </div>
</main>

@push('script')
<script src="{{ asset('js/rules.js') }}"></script>
@endpush