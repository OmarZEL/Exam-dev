document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-refresh').addEventListener('click', function() {
        fetch('getProducts.php')
            .then(response => response.json())
            .then(data => {
                const productList = document.getElementById('liste-produits');
                productList.innerHTML = ''; 
                data.forEach(product => {
                    productList.innerHTML += `<div>${product.name} - ${product.description} - ${product.price}</div>`;
                });
            })
            .catch(error => console.error('Erreur:', error));
    });


    document.getElementById('form-ajout-produit').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('addProduct.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); 
        })
        .catch(error => console.error('Erreur:', error));
    });
});
