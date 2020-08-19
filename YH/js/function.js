//--------------USER
var adduser;
var edituser;
var deluser;
var pfuser;
var pfeuser;
var pvuser;
var edus;
//--------------Product
var addproduct;
var delproduct;
var editproduct;
//--------------Stock
var addstock;
var viewstock;
var aemist;
//--------------Config
var nconf;
var viewtype;
var viewequie;
var editconf;
var delconf;
//--------------sup
var editsup;
var delsup;
var nsup;
//--------------begstock
var vbeg;
var vfbeg;
var delbeg;
//--------------Adjust
var vajd;
var edpo;
var dlid;
var uppo;
//--------------

function user_home() {
	$("#mainpage").load("users/show_user.php");
}
function po_home() {
	$("#mainpage").load("po/show_po.php");
}
function po_new() {
	$("#mainpage").load("po/new_po.php");
}
function view_po(id) {
	$("#mainpage").load("po/view_po.php",{ id : id });
}
function view_po_apv(id) {
	$("#mainpage").load("po/view_po_approve.php",{ id : id });
}
function stock_home() {
	$("#mainpage").load("stock/show_stock.php");
}
function product_home() {
	$("#mainpage").load("product/show_product.php");
}
function supply_home() {
	$("#mainpage").load("supplier/show_supplier.php");
}
function config_home() {
	$("#mainpage").load("configgroup/groupconfig.php");
}
function begstock_home() {
	$("#mainpage").load("stockbeg/begstock_show.php");
}
function out_stock() {
	$("#mainpage").load("stock/stock_out_show.php");
}
function begstock_main() {
	$("#mainpage").load("stockbeg/begstock_main.php");
}
function adjust_home() {
	$("#mainpage").load("adjust/adjust_show.php");
}
function apr(){
	$("#mainpage").load("approve/approve_show.php");
}
function prtdf(id) {
	window.open('po/printpo.php?id=' + id,'_blank');
}
function edit_po(id) {
	$("#mainpage").load("po/edit_po.php",{ id : id });
}
function summary() {
	$("#mainpage").load("summary/summary_home.php");
}

function logout(){
	$.ajax({
		type: "POST",
		url: "../systems/logout.php",
		cache: false,
		data: "",
		success: function(msg){
			if(msg=='Y'){
				window.location.href = "../login.php";	
			}else{
				//
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//	
		}
	});
}
//--------------------------- USER Bootstrap-Dialog
function btn_profile_user() {
	pfuser = new BootstrapDialog({
		title: 'Profile User',
		message: $('<div></div>').load('users/profile.php'),
		buttons: [{
			label: 'Edit Profile',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				edit_profile_user();
				dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	pfuser.open();
}
function vpb(id) {
	pvuser = new BootstrapDialog({
		title: 'Profile User',
		message: $('<div></div>').load('users/profile.php',{ id : id }),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	pvuser.open();
}

function edit_profile_user() {
	pfeuser = new BootstrapDialog({
		title: 'Edit User',
		message: $('<div></div>').load('users/edit_profile.php'),
		buttons: [{
			label: 'Edit',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				edit_profile();
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
				pfuser.open();
			}
		}],
		draggable: true,
		closable:false
	});
	pfeuser.open();
}

function edpass() {
	edus = new BootstrapDialog({
		title: 'Edit Password',
		message: $('<div></div>').load('users/edit_pass_from.php'),
		buttons: [{
			label: 'Edit',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				edit_pass();
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
				pfuser.open();
			}
		}],
		draggable: true,
		closable:false
	});
	edus.open();
}

function btn_add_user() {
	adduser = new BootstrapDialog({
		title: 'New User',
		message: $('<div></div>').load('users/add_user_form.php'),
		buttons: [{
			label: 'Add User',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				add_user();
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	adduser.open();
}

function btn_edit_user(idue) {
	edituser = new BootstrapDialog({
		title: 'Edit User',
		message: $('<div></div>').load('users/edit_user_form.php',{ id : idue }),
		buttons: [{
			label: 'Edit User',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				edit_user(idue);
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	edituser.open();
}

function btn_delete_user(id,name) {
	deluser = new BootstrapDialog({
		title: 'Delete User',
		message: 'คุณต้องการลบ ' + name + " ?",
		buttons: [{
			label: 'Delete User',
			// no title as it is optional
			cssClass: 'btn-danger',
			action: function(dialogItself){
				delete_user(id);
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	deluser.open();
}
//--------------------------- USER Bootstrap-Dialog END----------\\
//--------------------------- USER Function
function add_user() {
	var useru = $("#useru").val();
	var passu = $("#passu").val();
	var titleu = $("#titleu").val();
	var codeu = $("#codeu").val();
	var fnameu = $("#fnameu").val();
	var lnameu = $("#lnameu").val();
	var brahu = $("#brahu").val();
	var depe = $("#depe").val();
	var statusu = $("#statusu").val();
	var data = "useru=" + useru + "&titleu=" + titleu + "&passu=" + passu + "&codeu=" + codeu + "&fnameu=" + fnameu + "&lnameu=" + lnameu + "&brahu=" + brahu + "&depe=" + depe + "&statusu=" + statusu;
	//alert(data);
	if(useru != ''&& titleu != '' && passu != '' && codeu != '' && fnameu != '' && lnameu != '' && brahu != '' && depe != ''){
	$.ajax({
		type: "POST",
		url: "users/add_user_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				user_home();
				adduser.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});	
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
	});}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: "กรุณากรอกข้อมูลให้ครบ"
		});
	}
	
}

function edit_pass() {
	var passs1 = $("#passs1").val();
	var passs2 = $("#passs2").val();
	var data = 'passs1=' + passs1 + '&passs2=' + passs2;
	if(passs1 != '' && passs2 != ''){
		if(passs1 == passs2){
			$.ajax({
				type : 'POST',
				url : 'users/edit_pass_pro',
				cache : false,
				data : data,
				success : function (msg) {
					if(msg == 'Y'){
						edus.close();
						Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
						{
							msg: "บันทึกเรียบร้อย"
						});	
					}else{
						Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
						{
							msg: msg
						});
					}
				}
			}); 
		}else{
			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			{
				msg: "รหัสไม่ตรงกัน"
			});
		}
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: "กรุณากรอกข้อมูลให้ครบ"
		});
	}
	
}

function edit_profile() {
	//alert(ide);
	var codee = $("#codee").val();
	var titlee = $("#titlee").val();
	var fnamee = $("#fnamee").val();
	var lnamee = $("#lnamee").val();
	var usere = $("#usere").val();
	var brahe = $("#brahe").val();
	var depe = $("#depe").val();
	var data = "codee=" + codee + "&titlee=" + titlee + "&fnamee=" + fnamee + "&lnamee=" + lnamee + "&usere=" + usere +"&brahe=" + brahe + "&depe=" + depe;
	//alert(data);
	if(codee != '' && titlee != '' && fnamee != '' && lnamee != '' && usere != '' && brahe != '' && depe != ''){
	$.ajax({
		type: "POST",
		url: "users/edit_profile_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				pfeuser.close();	
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
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
	});}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: "กรุณากรอกข้อมูลให้ครบ"
		});
	}
	
}

function edit_user(ide) {
	//alert(ide);
	var codeee = $("#codeee").val();
	var titlee = $("#titlee").val();
	var fnameee = $("#fnameee").val();
	var lnameee = $("#lnameee").val();
	var useree = $("#useree").val();
	var passee = $("#passee").val();
	var brahee = $("#brahee").val();
	var depee = $("#depee").val();
	var data = "codeee=" + codeee + "&titlee=" + titlee + "&fnameee=" + fnameee + "&lnameee=" + lnameee + "&useree=" + useree + "&passee=" + passee + "&brahee=" + brahee + "&depee=" + depee + "&id=" + ide;
	//alert(data);
	if(codeee != '' && titlee != '' && useree != '' && passee != '' && fnameee != '' && lnameee != '' && brahee != '' && depee != ''){
	$.ajax({
		type: "POST",
		url: "users/edit_user_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				user_home();
				edituser.close();	
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
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
	});}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: "กรุณากรอกข้อมูลให้ครบ"
		});
	}
	
}

function delete_user(iddel) {
	var data = "id=" + iddel;
	//alert(data);
	$.ajax({
		type: "POST",
		url: "users/delete_user_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				user_home();
				deluser.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});	
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
	
}
//--------------------------- USER Function END ----------\\
//--------------------------- Product Bootstrap-Dialog ----------\\
function btn_add_product() {
	addproduct = new BootstrapDialog({
		title: 'New Product',
		message: $('<div></div>').load('product/new_product.php'),
		buttons: [{
			label: 'Add Product',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				add_product();
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	addproduct.open();
}

function btn_edit_product(id) {
	editproduct = new BootstrapDialog({
		title: 'Edit Product',
		message: $('<div></div>').load('product/edit_product.php',{ id : id }),
		buttons: [{
			label: 'Edit Product',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				edit_product(id);
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	editproduct.open();
}

function btn_delete_product(id,name) {
	delproduct = new BootstrapDialog({
		title: 'Delete Product',
		message: 'คุณต้องการลบ ' + name + ' ?',
		buttons: [{
			label: 'Delete Product',
			// no title as it is optional
			cssClass: 'btn-danger',
			action: function(dialogItself){
				Delectproduct(id);
				//dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	delproduct.open();
}
//--------------------------- Product Bootstrap END ----------\\
//--------------------------- Product Funtion ----------\\
function add_product() {
	var grppro = $("#grppro").val();
	var grouppro = $("#grouppro").val();
	var tyeq = $("#tyeq").val();
	var bran = $("#bran").val();
	var nameprd = $("#nameprd").val();
	var data = "grppro=" + grppro + "&grouppro=" + grouppro + "&tyeq=" + tyeq + "&bran=" + bran + "&nameprd=" + nameprd;
	$.ajax({
		type : "POST",
		url : "product/new_product_pro.php",
		cache : false,
		data : data,
		success: function (msg) {
			//alert(msg);
			if(msg == 'Y'){
				product_home()
				addproduct.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
}

function edit_product(id) {
	var grpproe = $("#grpproe").val();
	var groupproe = $("#groupproe").val();
	var tyeqe = $("#tyeqe").val();
	var brane = $("#brane").val();
	var nameprde = $("#nameprde").val();
	var data = "grpproe=" + grpproe + "&groupproe=" + groupproe + "&tyeqe=" + tyeqe + "&brane=" + brane + "&nameprde=" + nameprde + "&id=" + id;
	$.ajax({
		type : "POST",
		url : "product/edit_product_pro.php",
		cache : false,
		data : data,
		success: function (msg) {
			//alert(msg);
			if(msg == 'Y'){
				product_home()
				editproduct.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
}

function Delectproduct(id) {
	var data = "id=" + id;
	$.ajax({
		type : "POST",
		url : "product/delete_product.php",
		cache : false,
		data : data,
		success: function (msg) {
			//alert(msg);
			if(msg == 'Y'){
				product_home()
				delproduct.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
}
//--------------------------- Product Funtion END----------\\
//--------------------------- Stock Bootstrap-Dialog ----------\\
function add_stock() {
	addstock = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'New Stock',
		message: $('<div></div>').load('stock/add_stock.php'),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	addstock.open();
}

function ministk(id,id2) {
	aemist = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'ตั้งค่า จำนวน ขั้นต้ำ ',
		message: $('<div></div>').load('stock/config_minimum.php',{ id : id , id2 , id2 }),
		buttons: [{
			label: 'Edit',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				minipro(id);
				//dialogItself.close();
			}
		},{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	aemist.open();
}

function view_stock(id,name) {
	viewstock = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View Stock '+ name,
		message: $('<div></div>').load('stock/view_stock.php',{ id:id,name:name }),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	viewstock.open();
}
//--------------------------- Stock Bootstrap-Dialog END ----------\\
//--------------------------- Stock Funtion ----------\\
function addistock(ist) {
	var is = ist;
	is -=1;
  //alert(is);
  //alert("it" + it);
  var item2 = [];
  var numb2 = [];
  var detail2 = []; 
  for (var ni = 1; ni <= is ; ni++) {
    item2[ni]  = $("#item2"+ni).val();
    numb2[ni]  = $("#numb2"+ni).val();
    detail2[ni]  = $("#detail2"+ni).val();
  }
  /*for (var li2 = 1; li2 <= it ; li2++) {
    alert(item[li2]);
  }*/
  for (var ni2 = 1; ni2 <= is ; ni2++) {
    data = "item2=" + item2[ni2] + "&numb2=" + numb2[ni2] + "&detail2=" + detail2[ni2] + "&chk=" + 1;
    alert(data);
    $.ajax({
		type: "POST",
		url: "stock/add_stock_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			alert(msg);
			if(msg=='Y'){
				$("#mainpage").load("stock/show_stock.php");
				addstock.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: 'list'+ msg
				});
			  }
		  }
    });
  }
}

function inpost() {
	var fpo = $("#fpo").val();
	var data = 'fpo=' + fpo + '&chk=' + 2;
	if(fpo){
		$.ajax({
			type : 'POST',
			url : 'stock/add_stock_pro.php',
			cache : false,
			data : data,
			success : function (msg) {
				if(msg == 'Y'){
					$("#mainpage").load("stock/show_stock.php");
					addstock.close();
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg:  msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณาเลือกใบ PO'
		});
	}
}

function minipro(id) {
	var minimum = $("#minimum").val();
	var data = 'minimum=' + minimum + '&id=' + id ;
	if(minimum != ''){
		$.ajax({
			type : 'POST',
			url : 'stock/config_mini_pro.php',
			cache : false,
			data : data,
			success : function (msg){
				if(msg == 'Y'){
					$("#mainpage").load("stock/show_stock.php");
					aemist.close();
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg:  msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณากรอกข้อมูล'
		});
	}

}
//--------------------------- Stock Funtion END ---------------------------\\

//--------------------------- group/type  ---------------------------\\
function typeview(id,id2,name) {
	viewtype = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View Stock '+ name,
		message: $('<div></div>').load('configgroup/view_type.php',{ id:id,id2:id2,name:name }),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	viewtype.open();
}

function equieview(id,id2,id3,name,name2) {
	viewequie = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View Stock '+ name + ' / ' + name2 ,
		message: $('<div></div>').load('configgroup/view_equip.php',{ id:id,id2:id2,id3:id3,name:name,name2:name2 }),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	viewequie.open();
}

function addconfig(chk,id,id2,id3) {
	nconf = new BootstrapDialog({
		title: 'Add NEW',
		message: $('<div></div>').load('configgroup/new_config.php',{ chk : chk }),
		buttons: [{
			label: 'Add',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				if(chk == 'G'){
					new_conf(chk);
				}else if(chk == 'T'){
					new_conf(chk,id,id2);
				}else if(chk == 'E'){
					new_conf(chk,id,id2,id3);
				}
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	nconf.open();
}

function grued(id,name,chk) {
	editconf = new BootstrapDialog({
		title: 'Edit Group' + name,
		message: $('<div></div>').load('configgroup/edit_config.php',{ id : id , chk : chk }),
		buttons: [{
			label: 'Edit',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				config_pro(id,chk);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	editconf.open();
}

function grudel(name,chk,id,id2,id3,id4) {
	delconf = new BootstrapDialog({
		title: 'Delete',
		message: 'คุณต้องการลบ ' + name + ' ?',
		buttons: [{
			label: 'Delete',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				config_del(chk,id,id2,id3,id4);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	delconf.open();
}
//--------------------------- group/type Funtion  ---------------------------\\
function new_conf(chk,id,id2,id3) {
	var data ;
	if(chk == 'G'){
		var ngr = $("#ngr").val();
		var ngrn = $("#ngrn").val();
		if(ngrn != ''){
			 data = 'ngr=' + ngr + '&ngrn=' + ngrn + '&chk=' + chk ;
		}
	}else if(chk == 'T'){
		var nty = $("#nty").val();
		if(nty != ''){
			 data = 'nty=' + nty + '&id=' + id + '&id2=' + id2 + '&chk=' + chk;
		}
	}else if(chk == 'E'){
		var neq = $("#neq").val();
		if(neq != ''){
			 data = 'neq=' + neq + '&id=' + id + '&id2=' + id2 + '&id3=' + id3 + '&chk=' + chk;
		}
	}
	if(data){
		//alert(data);
	$.ajax({
		type : 'POST',
		url : 'configgroup/config_new_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'YG'){
				nconf.close();
				config_home();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else if(msg == 'YT'){
				nconf.close();
				$("#typetable").load("configgroup/view_type_table.php",{ id : id , id2 : id2 });
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else if(msg == 'YE'){
				nconf.close();
				$("#equiptable").load("configgroup/view_equip_table.php",{ id : id , id2 : id2 ,id3 : id3 });
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณากรอกข้อมูลให้ครบ'
		});
	}
}

function config_pro(id,chk) {
	var edconf = $("#edconf").val();
	var data = "edconf=" + edconf + "&id=" + id + "&chk=" + chk;
	//alert(data);
	if(edconf != ''){
	$.ajax({
		type : 'POST',
		url : 'configgroup/config_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'YG'){
				editconf.close();
				config_home();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else if(msg == 'YT'){
				editconf.close();
				$("#typetable").load("configgroup/view_type_table.php");
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else if(msg == 'YE'){
				editconf.close();
				$("#equiptable").load("configgroup/view_equip_table.php");
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณากรอกข้อมูลให้ครบ'
		});
	}
}

function config_del(chk,id,id2,id3,id4) {
	var data = 'id=' + id + '&id2=' + id2 + '&id3=' + id3 + '&id4=' + id4 + '&chk=' + chk;
	//alert(data);
	$.ajax({
		type : 'POST',
		url : 'configgroup/config_del.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'YG'){
				delconf.close();
				config_home();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else if(msg == 'YT'){
				delconf.close();
				$("#typetable").load("configgroup/view_type_table.php",{ id : id3 , id2 : id2 });
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else if(msg == 'YE'){
				delconf.close();
				$("#equiptable").load("configgroup/view_equip_table.php",{ id2 : id2 , id : id3 , id3 : id4 });
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
}
//--------------------------- group/type END ---------------------------\\
//--------------------------- Supplier ---------------------------\\
function newsup_btn() {
	nsup = new BootstrapDialog({
		title: 'Add Supplier',
		message: $('<div></div>').load('supplier/new_supplier.php'),
		buttons: [{
			label: 'Add',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				supply_new();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	nsup.open();
}

function edsup_btn(id) {
	editsup = new BootstrapDialog({
		title: 'Edit',
		message: $('<div></div>').load('supplier/edit_supplier.php',{ id : id }),
		buttons: [{
			label: 'Edit',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				supply_edit(id);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	editsup.open();
}

function delsup_btn(id,name) {
	delsup = new BootstrapDialog({
		title: 'Delete',
		message: 'คุณต้องการลบ ' + name + ' ?',
		buttons: [{
			label: 'Delete',
			// no title as it is optional
			cssClass: 'btn-darnger',
			action: function(dialogItself){
				supply_del(id);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	delsup.open();
}
//--------------------------- Supplier Function ---------------------------\\
function supply_new() {
	var supnd = $("#supnd").val();
	var data = 'supnd=' + supnd;
	if(supnd != ''){
		$.ajax({
			type : 'POST',
			url : 'supplier/new_sup_pro.php',
			cache : false,
			data : data,
			success : function (msg) {
				if(msg == 'Y'){
					supply_home();
					nsup.close();
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: msg
		});
	}
}

function supply_edit(id) {
	var supn = $("#supn").val();
	var data = 'supn=' + supn + '&id=' + id;
	if(supn != ''){
		$.ajax({
			type : 'POST',
			url : 'supplier/edit_supplier_pro.php',
			cache : false,
			data : data,
			success : function (msg) {
				if(msg != ''){
					supply_home();
					editsup.close();
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณากรอกข้อมูลให้ครบ'
		});
	}
}

function supply_del(id){
	var data = 'id=' + id;
	$.ajax({
		type : 'POST',
		url : 'supplier/del_supplier.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				supply_home();
				delsup.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
}
//--------------------------- Supplier End ---------------------------\\

//--------------------------- beg ---------------------------\\
function viewbeg(id){
	vbeg = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View',
		message: $('<div></div>').load('stockbeg/view_hisbeg.php', { id : id }),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	vbeg.open();
}

function begconf(id){
	vfbeg = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View',
		message: $('<div></div>').load('stock/per_conf_beg.php', { id : id }),
		buttons: [{
			label: 'อนุมัติ',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				beg_conf_out(id);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	vfbeg.open();
}

function begconf2(id){
	vfbeg = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View',
		message: $('<div></div>').load('stock/per_conf_beg.php', { id : id }),
		buttons: [ {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	vfbeg.open();
}

function befdel(id){
	delbeg = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'Delete',
		message: 'คุณต้องการลบรายการนี้ ? ',
		buttons: [ {
			label: 'Delete',
			// no title as it is optional
			cssClass: 'btn-danger',
			action: function(dialogItself){
				beg_conf_del(id);
			}
		},{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	delbeg.open();
}
//--------------------------- beg Function ---------------------------\\
function savebtn(i) {
	if(i > 1){
	var titlebeg = $("#titlebeg").val();
	var fnameubeg = $("#fnameubeg").val();
	var lnameubeg = $("#lnameubeg").val();
	var brahubeg = $("#brahubeg").val();
	var depebeg = $("#depebeg").val();
	var data = 'titlebeg=' + titlebeg + "&fnameubeg=" + fnameubeg + "&lnameubeg=" + lnameubeg + "&brahubeg=" + brahubeg + "&depebeg=" + depebeg + "&chk=" + 1;
	if( titlebeg != '' && fnameubeg != '' && lnameubeg != '' && brahubeg != '' && depebeg != ''){
	$.ajax({
		type : 'POST',
		url : 'stock/add_begstock_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				savelisr(i);
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: msg
				});
			}
		}
	});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณากรอกข้อมูลให้ครบ'
		});
	}
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณาเพื่มรายการเบิก'
		});
	}
}

function savelisr(i){
	var is1 = i;
	is1 -=1;
  //alert(is);
  //alert("it" + it);
  var item3 = [];
  var numb3 = [];
  var detail3 = []; 
  for (var ni = 1; ni <= is1 ; ni++) {
    item3[ni]  = $("#item3"+ni).val();
    numb3[ni]  = $("#numb3"+ni).val();
    detail3[ni]  = $("#detail3"+ni).val();
  }
  /*for (var li2 = 1; li2 <= it ; li2++) {
    alert(item[li2]);
  }*/
  for (var ni2 = 1; ni2 <= is1 ; ni2++) {
	data = "item3=" + item3[ni2] + "&numb3=" + numb3[ni2] + "&detail3=" + detail3[ni2] + "&chk=" + 2 + "&n=" + is1;
    $.ajax({
		type: "POST",
		url: "stock/add_begstock_pro.php",
		cache: false,
		data: data,
		success: function (msg){
			if(msg == 'Y'){
					$("#mainpage").load("stockbeg/begstock_show.php");
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			  }
		  }
	});
  }
}

function beg_conf_out(id) {
	var data = 'id=' + id + '&chk=' + 1 ;
	$.ajax({
		type : 'POST',
		url : 'stock/stock_outf_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				out_stock();
				vfbeg.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
		}
	});
}

function beg_conf_del(id) {
	var data = 'id=' + id + '&chk=' + 2;
	$.ajax({
		type : 'POST',
		url : 'stock/stock_outf_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if (msg == 'Y') {
				delbeg.close();
				out_stock();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
		}
	});
}
//--------------------------- beg End ---------------------------\\
//--------------------------- Adjust  ---------------------------\\
function view_adjust(id,name) {
	vajd = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View',
		message: $('<div></div>').load('adjust/adjust_view.php', { id : id, name : name }),
		buttons: [ {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	vajd.open();
}

function adjusted(id,name){
	vajd = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'View',
		message: $('<div></div>').load('adjust/adjust_form.php', { id : id, name : name }),
		buttons: [{
			label: 'Edit',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				edit_adj(id);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	vajd.open();
}
//--------------------------- Adjust Function ---------------------------\\
function edit_adj(id) {
	var nestk = $("#nestk").val();
	var data = 'nestk=' + nestk + '&id=' + id ;
	if(nestk != ''){
		$.ajax({
			type : 'POST',
			url : 'adjust/adjust_pro.php',
			cache : false,
			data : data,
			success : function (msg) {
				if(msg == 'Y'){
					vajd.close();
					adjust_home();
					$("#adtbl").load('adjust/adjust_table.php',{ id : id });
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg:  msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณาเพื่มรายการเบิก'
		});
	}
}
//--------------------------- Adjust End ---------------------------\\
//--------------------------- PO  ---------------------------\\
function apppo(id) {
	Lobibox.confirm({
		msg: "ยืนยันการอนุมัติ",
		callback: function (lobibox, type) {
			if(type === "yes"){
				app_po(id);
			}
		}
	});
}

function del_po(id,name) {
	Lobibox.confirm({
		msg: "ยืนยันการลบ " + name + " ?",
		callback: function (lobibox, type) {
			if(type === "yes"){
				delpo(id);
			}
		}
	});
}

function delfilepo(id,id2,name) {
	Lobibox.confirm({
		msg: "ยืนยันการลบไฟล์ " +name + " ?",
		callback: function (lobibox, type) {
			if(type === "yes"){
				delfile_po(id,id2,name);
			}
		}
	});
}

function addlist2(chk,id,id2) {
	edpo = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'Edit Product',
		message: $('<div></div>').load('po/new_pro_edit.php',{ id2 , id2 }),
		buttons: [{
			label: 'แก้ไข',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				addlistedpo(chk,id,id2);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	edpo.open();
}

function uploadpo(id) {
	uppo = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'Upload Document',
		message: $('<div></div>').load('po/upload_form.php',{ id , id }),
		buttons: [{
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	uppo.open();
}

function dellist(id,id2,name) {
	dlid = new BootstrapDialog({
		size: BootstrapDialog.SIZE_WIDE,
		title: 'Delete Product',
		message: 'คุณต้องการลบ ' + name + ' ออกจากรายการ ?',
		buttons: [{
			label: 'ลบ',
			// no title as it is optional
			cssClass: 'btn-danger',
			action: function(dialogItself){
				delplist(id,id2);
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
	dlid.open();
}
//--------------------------- PO Function ---------------------------\\
function app_po(id) {
	var data = 'id=' + id;
	$.ajax({
		type : 'POST',
		url : 'po/approve_po_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				view_po_apv(id);
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "อนุมัติเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
		}
	});
}

function delpo(id) {
	var data = 'id=' + id;
	$.ajax({
		type : 'POST',
		url : 'po/delete_po.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				po_home();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "ลบเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
		}
	});
}

function addlistedpo(chk,id,id2) {
	var edpoduct = $("#edpoduct").val();
	var detailqe = $("#detailqe").val();
	var numeee = $("#numeee").val();
	var cunitee = $("#cunitee").val();
	var prieee = $("#prieee").val();
	var diseee = $("#diseee").val();
	var totaleee = $("#totaleee").val();
	var data = 'edpoduct=' + edpoduct + '&detailqe=' + detailqe + '&numeee=' + numeee + '&cunitee=' + cunitee + '&prieee=' + prieee + '&diseee=' + diseee + '&totaleee=' + totaleee + '&id=' + id + '&id2=' + id2 + '&chk=' + chk;
	if(edpoduct != '' && numeee != '' && cunitee != '' && prieee != '' && diseee != '' && totaleee != '') {
		$.ajax({
			type : 'POST',
			url : 'po/po_edit_list_pro.php',
			cache : false,
			data : data,
			success : function (msg) {
				if(msg == 'Y'){
					edit_po(id);
					$("#tableedit").load("po/table_edit_po.php",{ id : id });
					edpo.close();
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg:  msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณาเพื่มรายการเบิก'
		});
	}
}

function delplist(id,id2) {
	var data = 'id2=' + id2 + '&chk=' + 3 ;
	$.ajax({
		type : 'POST',
		url : 'po/po_edit_list_pro.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				$("#tableedit").load("po/table_edit_po.php",{ id : id });
				dlid.close();
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
		}
	});
}

function edposave(id) {
	var brahpo = $("#brahpo").val();
	var suppo = $("#suppo").val();
	var poeddet = $("#poeddet").val();
	var sumpaee = $("#sumpaee").val();
	var sumnvatee = $("#sumnvatee").val();
	var sumvatee = $("#sumvatee").val();
	var sumtotalee = $("#sumtotalee").val();
	var apprnaed = $("#apprnaed").val();
	var stoinoted = $("#stoinoted").val();
	var data = 'brahpo=' + brahpo + '&suppo=' + suppo + '&poeddet=' + poeddet + '&sumpaee=' + sumpaee + '&sumnvatee=' + sumnvatee + '&sumvatee=' + sumvatee + '&sumtotalee=' + sumtotalee + '&apprnaed=' + apprnaed + '&stoinoted=' + stoinoted + '&id=' + id; 
	if(brahpo != '' && suppo != '' && poeddet != '' && sumpaee != '' && sumnvatee != '' && sumvatee != '' && sumtotalee != '' && apprnaed != '' && stoinoted != ''){
		$.ajax({
			type : 'POST',
			url : 'po/po_save_edit_pro.php',
			cache : false,
			data : data,
			success : function (msg) {
				if(msg == 'Y'){
					po_home();
					Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "บันทึกเรียบร้อย"
					});
				}else{
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg:  msg
					});
				}
			}
		});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: 'กรุณากรอกข้อมูลให้ครบ'
		});
	}
}

function updoc(id) {
    var file_data = $('#fileup').prop('files')[0];
   // alert(file_data);
    if(file_data!=null){
    var form_data = new FormData();
    form_data.append('fileup', file_data);
    $.ajax({
        url: "po/Upload_pro.php?id=" + id,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(msg){
            if(msg == 'Y'){
				//alert(msg);
				$("#table_upload").load("po/upload_table.php",{ id : id })
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "อัพโหลดเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
        }
	});
	}else{
		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg:  'กรุณาเลือกไฟล์'
		});
		Lobibox.notify("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		{
			msg: "กรุณาเลือกไฟล์"
		});

	}
}

function delfile_po(id,id2,name){
	var data = 'id=' + id + '&name=' + name;
	$.ajax({
		type : 'POST',
		url : 'po/upload_del.php',
		cache : false,
		data : data,
		success : function (msg) {
			if(msg == 'Y'){
				$("#table_upload").load("po/upload_table.php",{ id : id2 })
				Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "อัพโหลดเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg:  msg
				});
			}
		}
	});
}
//--------------------------- PO End ---------------------------\\