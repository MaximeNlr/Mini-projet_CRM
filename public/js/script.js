
document.getElementById('toggleForm').addEventListener('click', function () {
        var form = document.querySelector('.prospectForm');

        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });