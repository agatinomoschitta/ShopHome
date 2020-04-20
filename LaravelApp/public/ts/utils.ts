function addCart(code:string){
    $.post("addCart", {
        code: code
    }, function (data, status) {
        if (data == "ok") {
			alert("prodotto aggiunto al carrello");
			var n:number;
			n =+$("#num-cart").html();
			$("#num-cart").html(String((n+1)));
        }
        else {
            alert("prodotto non aggiunto al carrello");
        }
    });
}