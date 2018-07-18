/*
Programmer : Agus Sumarna
Describe   : File Ajax untuk halaman USER
*/



/////////////////////////UNTUK KONEKSI KE SERVER/////////////////////////////
var xmlHttp
function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
		// ngecek buat browser firefox, opera 8.0+, safari
		xmlHttp=new XMLHttpRequest();
	}catch(e){
		// browser Internet Explorer
		try
		{
			// IE 6.0+
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			// IE 5.0
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}			
	return xmlHttp;
}




///////////////////////////UNTUK REQUEST KE SERVER/////////////////////////////

//untuk shoutbox
function shout()
{
	//untuk ambil nilai dari form
	var nama= document.getElementById('nama').value;
	var web= document.getElementById('web').value;
	var pesan= document.getElementById('pesan').value;
	
	//untuk url ke server
	var url='proses.php?mode=box';
	url=url+'&nama='+nama+'&web='+web+'&pesan='+pesan
	
	//cek koneksi
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser tidak support HTTP Request")
	}
	
	//untuk mengirim request
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
	//untuk respon
	xmlHttp.onreadystatechange=stateChangedShout
}

//untuk menampilkan shoutbox
function view(id){
	var url='proses.php?mode=view&id='+id;
	
	//cek koneksi
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser tidak support HTTP Request")
	}
	
	//untuk mengirim request
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
	//untuk respon
	xmlHttp.onreadystatechange=stateChangedShout
}

//untuk search
function pencarian(key){
	var url='proses.php?mode=search&key='+key;
	
	//cek koneksi
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser tidak support HTTP Request")
	}
	
	//untuk mengirim request
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
	//untuk respon
	xmlHttp.onreadystatechange=stateChangedSearch
}


//untuk tampilkan jurusan
function fakultas(id_fak){
	var url='proses.php?mode=jurusan-view';
	url=url+'&id_fak='+id_fak
	
	//cek koneksi
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser tidak support HTTP Request")
	}
	
	//untuk mengirim request
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
	//untuk respon
	xmlHttp.onreadystatechange=stateChangedJurusan
}


//////////////////////////////////UNTUK RESPON DARI SERVER//////////////////////////////////

//untuk respon shoutbox
function stateChangedShout()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		document.getElementById("box").innerHTML=xmlHttp.responseText
	}
	
	if (xmlHttp.readyState==1 || xmlHttp.readyState=="loading")
	{
		document.getElementById("box").innerHTML="<center><img src=\"images/waiting.gif\"/><br/>Please wait...</center>"
	}
}

//untuk respon shoutbox
function stateChangedSearch()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		document.getElementById("pencarian").innerHTML=xmlHttp.responseText
	}
	
	if (xmlHttp.readyState==1 || xmlHttp.readyState=="loading")
	{
		document.getElementById("pencarian").innerHTML="<center><img src=\"images/waiting.gif\"/><br/>Please wait...</center>"
	}
}

//untuk respon shoutbox
function stateChangedJurusan()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		document.getElementById("jurusan-view").innerHTML=xmlHttp.responseText
	}
	
	if (xmlHttp.readyState==1 || xmlHttp.readyState=="loading")
	{
		document.getElementById("jurusan-view").innerHTML="<center><img src=\"images/waiting.gif\"/><br/>Please wait...</center>"
	}
}



//////////////////////////UNTUK FUNGSI PENGECEKAN////////////////////////////

//untuk cek login
function ceklogin(){
	var user= document.getElementById('userid').value;
	var pass= document.getElementById('passwd').value;
	if(user.replace(/^\s+|\s+$/g, '')==''){
		alert('Username Harus Diisi!');
		return false;
	} 
	if(pass.replace(/^\s+|\s+$/g, '')==''){
		alert('Password Harus diisi!');
		return false;
	}
	return true;
}

//untuk cek demo email 
function cek(){
	var nama= document.getElementById('nama').value;
	var email= document.getElementById('email').value;
	var teman= document.getElementById('teman').value;
	var pesan= document.getElementById('pesan').value;

	if(nama.replace(/^\s+|\s+$/g, '')==''){
		alert('Nama Harus Diisi!');
		return false;
	} 
	if(email.replace(/^\s+|\s+$/g, '')==''){
		alert('Email Anda Harus diisi!');
		return false;
	}
	if(teman.replace(/^\s+|\s+$/g, '')==''){
		alert('Email Teman Harus Diisi!');
		return false;
	} 
	if(pesan.replace(/^\s+|\s+$/g, '')==''){
		alert('Pesan Harus diisi!');
		return false;
	}
	return true;
}

//untuk cek forum
function forum(){
	var nama= document.getElementById('nama').value;
	var email= document.getElementById('email').value;
	var topik= document.getElementById('topik').value;
	var isi= document.getElementById('isi').value;

	if(nama.replace(/^\s+|\s+$/g, '')==''){
		alert('Nama Harus Diisi!');
		return false;
	} 
	if(email.replace(/^\s+|\s+$/g, '')==''){
		alert('Email Anda Harus diisi!');
		return false;
	}
	if(topik.replace(/^\s+|\s+$/g, '')==''){
		alert('Topik Harus Diisi!');
		return false;
	} 
	if(isi.replace(/^\s+|\s+$/g, '')==''){
		alert('Isi Topik masih kosong!');
		return false;
	}
	return true;
}

//untuk cek combo
function cek_combo(){
	//untuk mengecek validasi input data jembatan
	var nama=document.getElementById('nama').value;
	var npm=document.getElementById('npm').value;
	var id_fak=document.getElementById('id_fak').value;
	var kelas=document.getElementById('kelas').value;
	
	if(nama==''){
		alert('Masukan Nama Anda!');
		return false;
	} 
	if(npm==''){
		alert('Masukan NPM Anda!');
		return false;
	} 
	if(id_fak=='0'){
		alert('Pilih Nama Fakultas!');
		return false;
	} 
	if(kelas==''){
		alert('Masukan Kelas Anda!');
		return false;
	} 
	return true;
}


//////////////////////////////UNTUK FUNGSI YANG LAIN//////////////////////////////

//untuk menampilkan form login yang di hidden
function showHideContents(id){
	if(document.getElementById(id).style.display==""){
		document.getElementById(id).style.display="none";
	}else{
		document.getElementById(id).style.display="";
	}
}

//untuk testing
function test(){
	alert("test");
}

//untuk pilih demo
function demoajax(pilih){
	if(pilih==0){
		alert("Pilihan Salah!");
	}else{
		location.replace("index.php?page="+pilih);
	}
}

//untuk jam
function show2(){
	if (!document.all&&!document.getElementById)
		return
		thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
		var Digital=new Date()
		var hours=Digital.getHours()
		var minutes=Digital.getMinutes()
		var seconds=Digital.getSeconds()
		var dn="PM"
	
	if (hours<12)
		dn="AM"
	
	if (hours>12)
		hours=hours-12
	
	if (hours==0)
		hours=12
	
	if (minutes<=9)
		minutes="0"+minutes
	
	if (seconds<=9)
		seconds="0"+seconds
	
	var ctime=hours+":"+minutes+":"+seconds+" "+dn
	thelement.innerHTML=""+ctime+""
	setTimeout("show2()",1000)
}
window.onload=show2

//untuk klik kanan
document.oncontextmenu = new Function("alert('Copyright by Agus Sumarna - Kucing Lucu');return false");