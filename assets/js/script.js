document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    fetch(this.action, {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('formResponse').textContent = data.message;
    });
});