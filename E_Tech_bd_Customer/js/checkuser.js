function get(id){
	return document.getElementById(id);;
}
function checkUseremail(e){
	var xhr = new XMLHttpRequest();
	xhr.open("GET","/../Customer/check_useremail.php?email="+e.value,true);
	xhr.onreadystatechange=function(){
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText.trim() == "invalid"){
				get("err_email").innerHTML = "Username is already taken!";
			}
			else{
				get("err_email").innerHTML = "";
			}
		}
	};
	xhr.send();
}