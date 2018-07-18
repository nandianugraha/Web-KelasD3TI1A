function cek_login(){
	var user= document.getElementById('userid').value;
	var pass= document.getElementById('passwd').value;
	if(user.replace(/^\s+|\s+$/g, '')==''){
		alert('Username Harus Diisi!');
		document.login.userid.focus();
		return false;
	} 
	if(pass.replace(/^\s+|\s+$/g, '')==''){
		alert('Password Harus diisi!');
		document.login.passwd.focus();
		return false;
	}
	return true;
}
