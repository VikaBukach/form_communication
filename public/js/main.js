$('#contactForm').on('submit', (e) => {
    e.preventDefault();

    $('#submit').prop('disabled', true);

    var formData = {
        name: $('#name').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        message: $('#message').val(),
    };

    $.ajax({
        type: 'POST',
        url: '/?action=create',
        data: formData,
        success: function(response) {
            $('#contactForm')[0].reset();
            $('#submit').prop('disabled', false);
            updateMessages();
        },
        error: function() {
            alert('Error submitting form');
            $('#submit').prop('disabled', false);
        }
    });
});

function updateMessages () {
    $.ajax({
        type: 'POST',
        url: '/?action=getAll',
        success: function(response) {
            $result = ``;

            for(let row of response) {
                $result += `
                <tr>
                    <td>${row.name}</td>
                    <td>${row.phone}</td>
                    <td>${row.email}</td>
                    <td>${row.message}</td>
                </tr>
                `;
            }

            $('#messages-container').html($result)
        },
        error: function() {
            alert('Error submitting form');
        }
    });
}

// setInterval(updateMessages, 5000);