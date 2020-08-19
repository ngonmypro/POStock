function checkKey(n){
  	
	if (window.event.keyCode == 13){ //Enter  
		if( (n=="user") && ($('#user').val() != '') ){
		  //alert("test enter");
		  $('#pass').focus();
		}
		if( (n=="pass") && ($('#pass').val() !='' ) ){
		  //alert(n);
		  login();   
		}
		//schstock();
	}else if(window.event.keyCode == 37){ //Left
		//ChkKeyLeft(n,i)
	}else if(window.event.keyCode == 38){ //Up
		//ChkKeyUp(n,i);
	}else if(window.event.keyCode == 39){ //Right
		//ChkKeyRight(n,i);
	}else if(window.event.keyCode == 40){ //Down
		//ChkKeyDown(n,i);
	}else{

	}
  }
function login() {
   // alert("test");
    var username = $("#user").val();
	var password = $("#pass").val();
	var comp = $("#comp").val();
    var data = "user=" + username + "&pass=" + password + "&comp=" + comp;
	if(username != '' && password != '' && comp != '')
	{
		$.ajax({
			type: "POST",
			url: "systems/login_check.php",
			cache: false,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){	
					if(comp == 1){
						window.location.href = "YH/index.php";
					}else if(comp == 2){
						window.location.href = "YC/index.php";
					}else if(comp == 3){
						window.location.href = "PT/index.php";
					}
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: msg
					});
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//	
			}
		});
	}else{
	Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: "กรุณากรอกข้อมูลให้ครบ หรือ เลือกบริษัท"
		});
	}
	
}