//Payment option
function show(paypal,bcard) {
    if (paypal==1 && bcard==0) {
        document.getElementById("paypalpayment").style.display = "block";
        document.getElementById("bcardpayment").style.display = "none";
    }
    else if (paypal==0 && bcard==1){
        document.getElementById("paypalpayment").style.display = "none";
        document.getElementById("bcardpayment").style.display = "block";
    }
    return;
}


//Delivery details form open
function editDetails(){
    document.getElementById("deliveryForm").style.display = "flex";
}
//Delivery details form close
function close() {
    document.getElementById('closeButton').style.display ="none";
}
