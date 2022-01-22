
var hasError=false;
    function get(id){
        return document.getElementById(id);
    }
		function validate(){
			refresh();
			if(get("e_email").value==""){
				hasError = true;
				get("er_email").innerHTML = "**** Email must required";
			}
			else if(get("e_email").value.length <7){
				hasError = true;
				get("er_email").innerHTML = "**** Email must greater than 7 characters";
			}
			if(get("password_confirm1").value == ""){
				hasError = true;
				get("err_pass").innerHTML = "*** Password must required";
			}
			else if(get("password_confirm1").value.length < 5){
				hasError = true;
				get("err_pass").innerHTML = "***Password must 4 characters";
			}
			
			return !hasError;
		}
		function refresh(){
			hasError = false;
			get("e_email").innerHTML ="";
			get("err_pass").innerHTML ="";
			
		}
