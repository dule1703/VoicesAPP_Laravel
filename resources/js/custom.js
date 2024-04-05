window.addEventListener('DOMContentLoaded', async (event) => {
    try {        
        const response = await fetch('/opstine');            
        const data = await response.json();
        const selectElement = document.getElementById('poverenistvo');
        
        if(selectElement){
            // Brisanje predhodnih opcija
            selectElement.innerHTML = '';
                    
            // Popunjavanje Select Elementa-a
            Object.entries(data).forEach(([id, naziv_opstine]) => {
                const option = document.createElement('option');
                option.value = naziv_opstine; 
                option.textContent = naziv_opstine; 
                selectElement.appendChild(option);
            });

            // Izabrana opcija se uzima sa forme
            selectElement.addEventListener('change', () => {
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const selectedText = selectedOption.textContent;               
            });
        }
        
    } catch (error) {
        console.error('Error fetching opstine:', error);
    }

    // Load dugme Tabela svih korisnika
    const load_Table = document.getElementById('loadTable');
    if(load_Table){
        load_Table.addEventListener('click', async () => {
            try {           
                window.location.href = '/show-table';        
            } catch (error) {
                console.error('Greška:', error);
            }
        });
    }


    


});

