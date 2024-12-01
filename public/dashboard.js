function loadEntries() { 
    $.ajax({ 
        url: '/api/get_guestbook',  
        method: 'GET', 
        success: function(data) { 
            $('#guestbook-entries').empty(); 
            if (data.entries && Array.isArray(data.entries)) { 
                data.entries.forEach(function(entry) { 
                    console.error(entry); 
                    $('#guestbook-entries').append(` 
                        <tr> 
                            <td>${entry.user_name}</td> 
                            <td>${entry.email}</td> 
                            <td>${entry.created_at}</td> 
                            <td> 
                                <button class="delete-entry" data-id="${entry.id}">Удалить</button>
                            </td> 
                        </tr> 
                    `); 
                }); 
            } else { 
                console.error('Unexpected data format:', data); 
            } 
        }, 
        error: function() { 
            alert('Ошибка при загрузке записей.'); 
        } 
    }); 
}

$(document).on('click', '.delete-entry', function() { 
    const entryId = $(this).data('id'); 
    if (confirm('Вы уверены, что хотите удалить эту запись?')) { 
        $.ajax({ 
            url: `/api/delete_guestbook/${entryId}`,  
            method: 'DELETE', 
            success: function() { 
                loadEntries();  
            }, 
            error: function() { 
                alert('Ошибка при удалении записи.'); 
            } 
        }); 
    } 
});

loadEntries();
