$(document).ready(function() {
    $('#guestbook-form').on('submit', function(event) {
        event.preventDefault(); 

        var formData = {
            user_name: $('#user_name').val(),
            email: $('#email').val(),
            text: $('#text').val(),
            captcha: $('#captcha').val()
        };

        $.ajax({
            url: '/api/insert_guestbook',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                $('#response').html('<div class="alert alert-success">Запись успешно добавлена!</div>');
                $('#guestbook-entries').append('<tr><td>' + response.user_name + '</td><td>' + response.email + '</td><td>' + new Date().toLocaleString() + '</td></tr>');
                $('#guestbook-form')[0].reset(); 
                refreshCaptcha();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON;
                var errorMessage = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorMessage += '<li>' + value[0] + '</li>'; 
                });
                errorMessage += '</ul></div>';
                $('#response').html(errorMessage);
            }
        });
    });

    function refreshCaptcha() {
        $.get('/api/captcha-refresh', function(data) {
            $('#captcha').val('');
            $('#captcha').siblings('div').html(data); 
        });
    }
});

let currentPage = 1;
let sortField = 'created_at';
let sortOrder = 'desc';

function fetchEntries(page = 1) {
    fetch(`/api/get_guestbook?page=${page}&sort=${sortField}&order=${sortOrder}`)
        .then(response => response.json())
        .then(data => {
            const entries = data.entries;
            const totalPages = data.total_pages;
            const tbody = document.getElementById('guestbook-entries');
            tbody.innerHTML = '';

            entries.forEach(entry => {
                const row = `<tr>
                    <td>${entry.user_name}</td>
                    <td>${entry.email}</td>
                    <td>${new Date(entry.created_at).toLocaleString()}</td>
                </tr>`;
                tbody.innerHTML += row;
            });

            setupPagination(totalPages);
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
}

function setupPagination(totalPages) {
    const paginationDiv = document.getElementById('pagination');
    paginationDiv.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const pageLink = document.createElement('a');
        pageLink.href = '#';
        pageLink.innerText = i;
        pageLink.className = 'btn btn-link';
        pageLink.onclick = (e) => {
            e.preventDefault();
            currentPage = i;
            fetchEntries(currentPage);
        };
        paginationDiv.appendChild(pageLink);
    }
}

document.getElementById('sort-name').addEventListener('click', (e) => {
    e.preventDefault();
    sortField = 'user_name';
    sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
    fetchEntries(currentPage);
});

document.getElementById('sort-email').addEventListener('click', (e) => {
    e.preventDefault();
    sortField = 'email';
    sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
    fetchEntries(currentPage);
});

document.getElementById('sort-date').addEventListener('click', (e) => {
    e.preventDefault();
    sortField = 'created_at';
    sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
    fetchEntries(currentPage);
});

fetchEntries();
