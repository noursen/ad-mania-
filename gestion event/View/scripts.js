window.onload = () => {
    let stripe = Stripe('pk_test_51InhWiJmcpbasMK9ZokozfUORvAsUqlnjXGwGSdHBoIMmA4vSDFea3HYkuZrMPpjn4speDW4GBXtscIWfQDdDIgi00GouuMqXk')
    
    let elements = stripe.elements();
    let redirect = "str.php"
    let cardHloderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button");
    let clientSecret = cardButton.dataset.secret;
    let card = elements.create("card")
    card.mount("#card-elements")
    card.addEventListener("change",(event) => {
        let displayError = document.getElementById("card-errors")
        if(event.error){
            displayError.textContent = event.error.message;
        }else{
            displayError.textContent = "";
        }
    })
   
    cardButton.addEventListener("click",()=> {
        stripe.handleCardPayment(
clientSecret, card, {
    payment_method_data:{
        billing_details:{
            name: cardHloderName.value
        }
    }
}

        ).then((result)=> {
            if(result.error){
                
                document.getElementById("errors").innerText = result.error.message}
                else{
                    document.getElementById("incr").value='0';
                   // document.location.href = redirect
                }
        })
    })
}
//4000 0025 0000 3155 