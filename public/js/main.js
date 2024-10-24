// Harga BBM
const fuelPrices = {
    pertalite: 10000,
    pertamax: 12500,
    solar: 6800
};

// Harga Supply
const supplyPrices = {
    pertalite: 9000,
    pertamax: 11500,
    solar: 6000
};

function showTransactionForm() {
    document.getElementById('transactionModal').style.display = 'block';
}

function closeTransactionModal() {
    document.getElementById('transactionModal').style.display = 'none';
}

function showSupplyForm() {
    document.getElementById('supplyModal').style.display = 'block';
}

function closeSupplyModal() {
    document.getElementById('supplyModal').style.display = 'none';
}

function updatePrice() {
    const form = document.getElementById('transactionForm');
    const fuelType = form.fuelType.value;
    form.pricePerLiter.value = fuelPrices[fuelType] || '';
    calculateTotal();
}

function calculateTotal() {
    const form = document.getElementById('transactionForm');
    const liters = form.liters.value;
    const pricePerLiter = form.pricePerLiter.value;
    form.totalPrice.value = liters * pricePerLiter || 0;
}

// function updateSupplyPrice() {
//     const form = document.getElementById('supplyForm');
//     const fuelType = form.fuelType.value;
//     form.pricePerLiter.value = supplyPrices[fuelType] || '';
//     calculateSupplyTotal();
// }

// function calculateSupplyTotal() {
//     const form = document.getElementById('supplyForm');
//     const liters = form.liters.value;
//     const pricePerLiter = form.pricePerLiter.value;
//     form.totalPrice.value = liters * pricePerLiter || 0;
// }

// Event Listeners untuk form submissions
document.getElementById('transactionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Implementasi logika penyimpanan data transaksi
    closeTransactionModal();
});

// document.getElementById('supplyForm').addEventListener('submit', function(e) {
//     e.preventDefault();
//     // Implementasi logika penyimpanan data supply
//     closeSupplyModal();
// });

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target.className === 'modal') {
        event.target.style.display = 'none';
    }
}

function switchTab(tabName) {
    // Hide all tab content
    const tabContents = document.getElementsByClassName('tab-content');
    for (let content of tabContents) {
        content.classList.remove('active');
    }
    
    // Deactivate all tabs
    const tabs = document.getElementsByClassName('tab-btn');
    for (let tab of tabs) {
        tab.classList.remove('active');
    }
    
    // Show selected tab content and activate tab
    document.getElementById(tabName).classList.add('active');
    event.target.classList.add('active');
}

// Add this to your form submission handlers to update the tables

function addTransactionToLog(transaction) {
    const tbody = document.querySelector('#transactions tbody');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${transaction.date}</td>
        <td>${transaction.customerName}</td>
        <td>${transaction.fuelType}</td>
        <td>${transaction.liters}</td>
        <td>Rp ${transaction.pricePerLiter.toLocaleString()}</td>
        <td>Rp ${transaction.totalPrice.toLocaleString()}</td>
    `;
    tbody.insertBefore(row, tbody.firstChild);
}

function addSupplyToLog(supply) {
    const tbody = document.querySelector('#supply tbody');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${supply.date}</td>
        <td>${supply.supplierName}</td>
        <td>${supply.fuelType}</td>
        <td>${supply.liters}</td>
        <td>Rp ${supply.pricePerLiter.toLocaleString()}</td>
        <td>Rp ${supply.totalPrice.toLocaleString()}</td>
    `;
    tbody.insertBefore(row, tbody.firstChild);
}

// Update your form submission handlers
document.getElementById('transactionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const transaction = {
        date: formData.get('transactionDate'),
        customerName: formData.get('customerName'),
        fuelType: formData.get('fuelType'),
        liters: formData.get('liters'),
        pricePerLiter: parseInt(formData.get('pricePerLiter')),
        totalPrice: parseInt(formData.get('totalPrice'))
    };
    addTransactionToLog(transaction);
    closeTransactionModal();
    this.reset();
});

// document.getElementById('supplyForm').addEventListener('submit', function(e) {
//     e.preventDefault();
//     const formData = new FormData(this);
//     const supply = {
//         date: formData.get('purchaseDate'),
//         supplierName: formData.get('supplierName'),
//         fuelType: formData.get('fuelType'),
//         liters: formData.get('liters'),
//         pricePerLiter: parseInt(formData.get('pricePerLiter')),
//         totalPrice: parseInt(formData.get('totalPrice'))
//     };
//     addSupplyToLog(supply);
//     closeSupplyModal();
//     this.reset();
// });