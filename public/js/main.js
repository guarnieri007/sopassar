var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    if(x.length > 0) {
        x[slideIndex-1].style.display = "block";
    }
}

/* Payment, get a card flag */

var cartao = document.querySelector('#numeracao');
cartao.addEventListener('input', function(){
    var id = document.getElementById('customerId').value;
    var bandeira = document.getElementById('bandeira');
    var cvc = document.getElementById('cvc');
    parser = new DOMParser();
    xmlDoc = parser.parseFromString(id,"text/xml");
    var customerId = xmlDoc.getElementsByTagName("id")[0].childNodes[0].nodeValue;
    console.log("Id: "+customerId);
    PagSeguroDirectPayment.setSessionId(customerId);
    var cartao = document.getElementById('numeracao').value;
    var digitos = cartao;
    console.log(digitos);
    
    PagSeguroDirectPayment.getBrand({
        cardBin: digitos,
            success: function(response) {
                console.log(response);
                bandeira.value = response.brand.name;
                cvc.setAttribute('pattern', ".{" + response.brand.cvvSize + "," + response.brand.cvvSize + "}");
                cvc.setAttribute('title', "Deve ter " + response.brand.cvvSize + " caracteres");
            },
            error: function(response) {
                bandeira.value = "";
            },
            complete: function(response) {

            }
    });
});