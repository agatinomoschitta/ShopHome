function on():void{
	$("#overlay").css("display", "block");
}
function off():void{
	$("#overlay").css("display", "none");
}
function regOn():void{
	$("#overlay-registration").css("display", "block");
}
function regOff():void{
	$("#overlay-registration").css("display", "none");
}
function login():boolean{
	$("#result_mex_container").attr("active","false");
	var contactNumber:string;
	contactNumber =  $('input[name="contactNumber"]').val() as string;
	var password:string;
	password=$('input[name="password"]').val() as string;
	var token:string;
	token=$('input[name="_token"]').val() as string;
	validateCredentials(contactNumber, password, token);
	return false;
}

function validateCredentials(user:string, psw:string, tk:string){
  $.post("login",
  {
    contactNumber: user,
	password: psw,
	_token: tk
  },
  function(data, status){
	if(data=="Username o password errate"){
		$("#result_mex_container").attr("active","true").html(data);
	}else{
		location.reload();
	}
  });

};