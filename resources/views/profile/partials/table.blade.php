<x-app-layout>
    <div class="container flex justify-center w-full mt-6">
        <table id="glasacTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Ime i prezime</th>
                    <th>Email</th>
                    <th>JMBG</th>
                    <th>Adresa</th>
                    <th>Poverenistvo</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ovde se učitavaju podaci dinamički -->
            </tbody>
        </table>
    </div>
    <script>
        /***   TABELA GLASAČA    ***/

window.addEventListener('DOMContentLoaded', async (event) => {
        try {
            const response = await fetch('/load-table');
            const data = await response.json();
            console.log(data);          
            renderTable(data);
        } catch (error) {
            console.error('Greška u učitavanju podataka:', error);
        }
});
    // Funkcija za obradu dobijenih podataka
    function renderTable(data) {        
        const tableBody = document.querySelector('#glasacTable tbody');

        if (tableBody) {
            tableBody.innerHTML = '';

            data.forEach(glasac => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${glasac.ime_prezime}</td>
                    <td>${glasac.email}</td>
                    <td>${glasac.jmbg}</td>
                    <td>${glasac.adresa}</td>
                    <td>${glasac.poverenistvo}</td>
                    <td>
                        <a href="#" class="btn btn-primary edit-btn" data-id="${glasac.id}">Edit</a>
                        <a href="#" class="btn btn-danger delete-btn" data-id="${glasac.id}">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error('tableBody element not found');
        }
    }

    // Edit glasača
    document.addEventListener('click', async (event) => {
    if (event.target.classList.contains('edit-btn')) {
        event.preventDefault();
        const id = event.target.dataset.id;
        window.location.href = `/glasac/${id}/edit`;
    } else if (event.target.classList.contains('delete-btn')) {
        event.preventDefault();
        const id = event.target.dataset.id;

        try {           
            const response = await fetch(`/glasac/${id}/delete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            
            event.target.closest('tr').remove();            
           
            console.log('Glasac deleted successfully');
        } catch (error) {
            console.error('There was a problem with the delete operation:', error);
        }
    }
});

    </script>
</x-app-layout>


