document.addEventListener('DOMContentLoaded', function() {
    let toggleFormButton = document.getElementById('toggleForm');
    let prospectForm = document.querySelector('.prospectForm');

    toggleFormButton.addEventListener('click', function () {
        prospectForm.style.display = prospectForm.style.display === 'none' ? 'block' : 'none';
    });
})

document.addEventListener('DOMContentLoaded', function () {
    let editButton = document.getElementById('editProspectBtn');
    let editForm = document.querySelector('.editForm');

    editButton.addEventListener('click', function () {
        editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
    })
})

document.addEventListener('DOMContentLoaded', function () {
    let messageButton = document.getElementById('messageButton');
    let messageForm = document.querySelector('.messageForm');

        messageButton.addEventListener('click', function () {
            messageForm.style.display = messageForm.style.display === 'none' ? 'block' : 'none';
        })
})
   