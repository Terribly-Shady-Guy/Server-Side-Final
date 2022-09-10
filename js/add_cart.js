function sendData(event) {
    const form = event.target.form;
    const qty = form.elements.namedItem("Qty");
    const product = form.elements.namedItem("Product");

    const formData = new FormData();
    formData.append("Qty", qty.value);
    formData.append("Product", product.value);
    
    fetch("src/shop_files/add_cart.php", {
        method: 'POST',
        body: formData
    });
}

const addButtons = document.getElementsByClassName("Add");
addButtons.forEach(b => b.onclick = sendData);