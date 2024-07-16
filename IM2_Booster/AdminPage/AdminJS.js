/* PANG HIGHLIGHT SA SIDEBAR KUNG AHA KA NGA PAGE */
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname.split('/').pop();
    const sidebarLinks = document.querySelectorAll('.sidebar ul li a');

    sidebarLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.parentElement.classList.add('active');
        }
    });
});


/* PARA SA GAME LIST ARON MAKA ADD OG DELETE */
document.getElementById('gameForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const gameId = document.getElementById('gameId').value;
    const gameIcon = document.getElementById('gameIcon').files[0];
    const gameName = document.getElementById('gameName').value;
    const gameType = document.getElementById('gameType').value;

    if (gameIcon) {
        const reader = new FileReader();
        reader.onload = function(e) {
            addGameToTable(gameId, e.target.result, gameName, gameType);
        };
        reader.readAsDataURL(gameIcon);
    }

    this.reset();
});

function addGameToTable(gameId, gameIcon, gameName, gameType) {
    const tableBody = document.querySelector('#gameTable tbody');
    const row = document.createElement('tr');

    row.innerHTML = `
        <td>${gameId}</td>
        <td class="image-upload"><img src="${gameIcon}" alt="Game Icon"></td>
        <td>${gameName}</td>
        <td>${gameType}</td>
        <td><i class='bx bx-trash delete-icon' onclick="deleteRow(this)"></i></td>
    `;

    tableBody.appendChild(row);
}

function deleteRow(element) {
    const row = element.closest('tr');
    row.remove();
}



// function addRow(tableID, rowData) {
//     const table = document.getElementById(tableID).getElementsByTagName('tbody')[0];
//     const newRow = table.insertRow();
    
//     // Add data to cells
//     rowData.forEach((data, index) => {
//         const newCell = newRow.insertCell(index);
//         newCell.innerHTML = data;
//     });

//     // Add delete button to the last cell
//     const actionsCell = newRow.insertCell(rowData.length);
//     const deleteButton = document.createElement('button');
//     deleteButton.textContent = 'Delete';
//     deleteButton.onclick = function() {
//         table.deleteRow(newRow.rowIndex - 1); // Adjust rowIndex for header row
//     };
//     actionsCell.appendChild(deleteButton);
// }

// // Example data for Booster Table
// const boosterData = [
//     ['1', 'John Doe', '4.5', 'Expert'],
//     ['2', 'Jane Smith', '4.8', 'Master']
// ];

// // Add rows to Booster Table
// boosterData.forEach(data => addRow('BoosterTable', data));
