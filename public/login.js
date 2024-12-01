document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        const name = form.name.value.trim();
        const password = form.password.value.trim();

        if (name === '' || password === '') {
            event.preventDefault(); 
            alert('Пожалуйста, заполните все поля.');
        }
    });
});
