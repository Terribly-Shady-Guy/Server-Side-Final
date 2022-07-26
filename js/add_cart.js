function sendData(event) {
    if (event.submitter.value == "add") {
        event.preventDefault();
        
        const submittedForm = event.submitter.form;
        const qty = submittedForm.elements.namedItem("Qty");
        const product = submittedForm.elements.namedItem("Product");

        const formData = new FormData();
        formData.append("Qty", qty.value);
        formData.append("Product", product.value);
        
        fetch("src/shop_files/add_cart.php", {
            method: 'POST',
            body: formData
        });
    }
}

const forms = document.getElementsByClassName("AddCartForm");
for (const form of forms) {
    form.addEventListener("submit", sendData);
}