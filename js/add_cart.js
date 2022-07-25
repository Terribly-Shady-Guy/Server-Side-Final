function sendData(event) {
    if (event.submitter.value == "add") {
        event.preventDefault();
        
        var submittedForm = event.submitter.form;
        var qty = submittedForm.elements.namedItem("Qty");
        var product = submittedForm.elements.namedItem("Product");

        var formData = new FormData();
        formData.append("Qty", qty.value);
        formData.append("Product", product.value);
        
        fetch("src/shop_files/add_cart.php", {
            method: 'POST',
            body: formData
        });
    }
}

var forms = document.getElementsByClassName("AddCartForm");
for (index = 0; index < forms.length; index++) {
    forms[index].addEventListener("submit", sendData);
}