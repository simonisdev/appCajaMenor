// app.js
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(loginForm);
            
            fetch('../php/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Aquí puedes decidir qué hacer después de la respuesta del servidor
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
