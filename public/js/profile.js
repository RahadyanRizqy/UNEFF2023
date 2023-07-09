$(document).ready(function () {
    $('.editable-item').on('click', function() {
        $(this).attr('contenteditable', true).focus();
    });
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#save-button').on('click', function() {
        var newData = {
            'Rules': {
                'ExternalFormLink': $('#gform-link').text(),
                'Title': $('#title').text(),
                'Section': []
            }
        };

        $('.sections').each(function() {
            var sectionTitle = $(this).find('.section-title').text();
            var sectionList = [];

            $(this).find('.section-list li').each(function() {
                sectionList.push($(this).text());
            });

            newData['Rules']['Section'].push({
                'Title': sectionTitle,
                'List': sectionList
            });
        });

        var jsonData = {
            'Rules': newData['Rules']
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: '/rules/update',
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
});