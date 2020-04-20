function addCart(code) {
	var token=$("input[name='_token']").val();
	$.post("addCart", 
	{
		p_code: code,
		_token: token
	}, 
	function (data, status) {
	 if (data == "ok") {
            cartOn();
            var n;
            n = +$("#num-cart").html();
            $("#num-cart").html(String((n + 1)));
        }
	});
	return false;
}
function cartOff(){
    $("#cart-overlay").css("display", "none");
}
function cartOn(){

    $("#cart-overlay").css("display", "block");
}
