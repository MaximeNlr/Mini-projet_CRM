
document.getElementById('toggleForm').addEventListener('click', function () {
        const form = document.querySelector('.prospectForm');

        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var prospectsTable = document.getElementById('prospectsTable');
    
        prospectsTable.addEventListener('click', function(event) {
            if (event.target.classList.contains('editButton')) {
                event.preventDefault();
    
                var row = event.target.closest('.editableRow');
                var cells = row.querySelectorAll('td');
    
                cells.forEach(function(cell, index) {
                    var content = cell.textContent.trim();
    
                    if (index !== cells.length - 1) {
                        var input = document.createElement('input');
                        input.type = 'text';
                        input.value = content;
                        cell.innerHTML = '';
                        cell.appendChild(input);
                    }
                });
    
                var actionTd = row.querySelector('.actionTd');
                actionTd.innerHTML = '<button class="confirmButton">✔️</button>';
                var confirmButton = row.querySelector('.confirmButton');
                confirmButton.addEventListener('click', function() {
                    cells.forEach(function(cell, index) {
                        if (index !== cells.length - 1) {
                            var inputValue = cell.querySelector('input').value;
                            cell.innerHTML = inputValue;
                        }
                    });
                //      var prospectId = row.dataset.id;
                // fetch('/prospects/' + prospectId, {
                //     method: 'PUT',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                //     },
                //     body: JSON.stringify(data)
                // })
                // .then(response => response.json())
                // .then(data => {
                //     console.log(data.message);
                    actionTd.innerHTML = '<button class="editButton">✏️</button>';
                });
            }
        });
    });
    