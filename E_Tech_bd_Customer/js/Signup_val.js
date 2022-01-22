var hasError=false;
	function get(id) {
	return document.getElementById(id);
	}

function validate(){
    refresh();
   
    //start username
    if(get("name").value==""){
        hasError = true;
        get("err_name").innerHTML = "**** User-name required";
    }
    else if(get("name").value.length < 5){
        hasError = true;
        get("err_name").innerHTML = "****User-name must be 5 characters";
    }
    //start password
    if(get("password_confirm1").value == ""){
        hasError = true;
        get("err_pass").innerHTML = "*Pass-word required";
    }
    else if(get("password_confirm1").value.length < 3){
        hasError = true;
        get("err_pass").innerHTML = "*Pass-word must be 3 characters";
    }
    //start email
    if(get("e_email").value == ""){
        hasError = true;
        get("er_email").innerHTML = "****E-mail required";
    }
    else if(get("e_email").value.length < 7){
        hasError = true;
        get("er_email").innerHTML = "*E-mail must be 7 characters";
    }
    //start phone number
    if(get("c_contact").value == ""){
        hasError = true;
        get("err_c_contact").innerHTML = "*Phone-number required";
    }
    else if(get("c_contact").value.length < 11){
        hasError = true;
        get("err_c_contact").innerHTML = "*Phone-number must be 11 characters";
    }
   

    if (get("role").selectedIndex == 0) {
    hasError = true;
    get("err_role").innerHTML = "*Role required";
    }

    

    if (get("address").value == "") {
    hasError = true;
    get("err_address").innerHTML = "***Address Required";
    }

    if (get("u_image").value == "") {
    hasError = true;
    get("err_i_image").innerHTML = "****Image Required";
    }
    
    
    return !hasError;
}
		function refresh(){
			hasError = false;
			get("err_name").innerHTML ="";
			
			get("err_pass").innerHTML ="";
			get("er_email").innerHTML ="";
			get("err_c_contact").innerHTML ="";
		
			get("err_role").innerHTML = "";
		
			get("err_address").innerHTML = "";
			get("err_i_image").innerHTML = "";
				}