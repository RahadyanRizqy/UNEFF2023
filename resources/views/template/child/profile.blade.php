<main class="dash-content">
    <div class="container-fluid">
        <div class="profile-container">
            <h2 class="mb-3 fw-bold editable-item" id="profile-title">{{$profile->title}}</h2>
        </div>
        <div class="profile-container">
            <img src="{{ $profile->banner }}" alt="" width="20%" id="profile-banner-to-click">
        </div>
        <div class="profile-container">
            <p class="editable-item" id="profile-detail">{!!$profile->detail!!}</p>
        </div>
        <button id="save-button" class="btn btn-primary">Simpan</button>
    </div>
</main>
@push('script')
<script>
    $(document).ready(function () {
        $('.editable-item').on('click', function() {
            $(this).attr('contenteditable', true).focus();
        });
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#save-button').on('click', function() {
            var newData = {
                'Profile': {
                    'Title': $('#profile-title').text(),
                    'Banner': "/image/profile.png",
                    'Detail': $('#profile-detail').text(),
                }
            };


            var jsonData = {
                'Profile': newData['Profile']
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: '/profile/update',
                type: 'PUT',
                data: JSON.stringify(jsonData),
                contentType: 'application/json',
                success: function(response) {
                    console.log('JSON file updated successfully');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log('Error updating JSON file:', error);
                }
            });

            $('.editable-item').attr('contenteditable', false);
        });

        // $('#profile-banner-to-click').on('click', function() {
        //     $('#change-image-button').click();
        // });
    });
</script>
@endpush