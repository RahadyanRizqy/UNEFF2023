<main class="dash-content">
    <div class="container-fluid">
        <h2 class="mb-3 fw-bold editable-item" id="title">{{ $rules['Title'] }}</h2>
        <div class="d-flex">
            <h6>Link Form: </h6>
            <h6 class="ml-1 editable-item" id="gform-link">{{ $rules['ExternalFormLink']}}</h6>
        </div>
        <h3 class="fw-normal editable-item" id="intro-header">{{ $rules['IntroHeader'] }}</h3>
        <ol id="intro-list">
            @foreach($rules['Intro'] as $enumIntro)
                <div class="d-flex align-items-center">
                    <li class="editable-item">{{ $enumIntro }}</li>
                    <i class="ml-1 fa-solid fa-circle-minus"></i>
                </div>
            @endforeach
            <i class="fa-solid fa-circle-plus add-btn"></i>
        </ol>

        <h3 class="fw-normal editable-item" id="req-header">{{ $rules['RequirementHeader'] }}</h3>
        <ol id="requirement-list">
            @foreach($rules['Requirement'] as $enumReq)
                <div class="d-flex align-items-center">
                    <li class="editable-item">{{ $enumReq }}</li>
                    <i class="ml-1 fa-solid fa-circle-minus"></i>
                </div>
            @endforeach
            <i class="fa-solid fa-circle-plus add-btn"></i>
        </ol>

        <h3 class="fw-normal editable-item" id="add-header">{{ $rules['AdditionalHeader'] }}</h3>
        <ol id="additional-list">
            @foreach($rules['Additional'] as $enumAdd)
                <div class="d-flex align-items-center">
                    <li class="editable-item">{{ $enumAdd }}</li>
                    <i class="ml-1 fa-solid fa-circle-minus"></i>
                </div>
            @endforeach
            <i class="fa-solid fa-circle-plus add-btn"></i>
        </ol>
        
        <div class="gform-container mb-3">
            <iframe id="google-form" src="{{ str_replace('usp=sf_link', 'embedded=true', $rules['ExternalFormLink']) }}" width="100%" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" style="height: 100vh">Loading…</iframe>
        </div>
        <button id="save-button" class="btn btn-primary">Simpan</button>
    </div>
</main>

@push('script')
<script>
    $(document).ready(function() {
        $('.editable-item').on('click', function() {
            $(this).attr('contenteditable', true).focus();
        });

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#save-button').on('click', function() {
            var newData = {
                'ProgramDetail': {
                    'ExternalFormLink' : $('#gform-link').text(),
                    'Title' : $('#title').text(),
                    'IntroHeader' : $('#intro-header').text(),
                    'Intro': [],
                    'RequirementHeader' : $('#req-header').text(),
                    'Requirement': [],
                    'AdditionalHeader' : $('#add-header').text(),
                    'Additional': []
                }
            };

            // Retrieve the updated content from the editable items
            $('#intro-list li.editable-item').each(function() {
                newData['ProgramDetail']['Intro'].push($(this).text());
            });
            
            $('#requirement-list li.editable-item').each(function() {
                newData['ProgramDetail']['Requirement'].push($(this).text());
            });
            
            $('#additional-list li.editable-item').each(function() {
                newData['ProgramDetail']['Additional'].push($(this).text());
            });

            // Prepare the data to be sent via AJAX
            var jsonData = {
                'ProgramDetail': newData['ProgramDetail']
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            // Make an AJAX request to update the JSON file
            $.ajax({
                url: '{{ route('updateJson') }}',
                type: 'PUT',
                data: JSON.stringify(jsonData),
                contentType: 'application/json',
                success: function(response) {
                    console.log('JSON file updated successfully');
                    location.reload(); // Refresh the page after successful update
                },
                error: function(xhr, status, error) {
                    console.log('Error updating JSON file:', error);
                }
            });

            $('.editable-item').attr('contenteditable', false);
        });

        $('.fa-circle-minus').on('click', function() {
            $(this).parent().remove(); // Remove the corresponding element
        });

        $('.add-btn').click(function() {
            var newElement = $('<div class="d-flex align-items-center"><li class="editable-item">Tambahin sendiri wkwk...</li><i class="ml-1 fa-solid fa-circle-minus"></i></div>'); // Create the new element
            $(this).before(newElement); // Insert the new element before the fa-circle-plus icon
        });
    });

    $(document).on('click', '.fa-circle-minus', function() {
        $(this).parent().remove(); // Remove the corresponding parent element (li with fa-circle-minus)
    });

    $(document).on('click', '.editable-item', function() {
        $(this).attr('contenteditable', true).focus();
    });
</script>
@endpush