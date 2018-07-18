<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>

<form>
<table>
	<tr>
		<td height="44" colspan="2"><div id="box"></div></td>
	</tr>
	<tr>
		<td>Nama</td>
	</tr>
	<tr>
		<td><input type="text" name="nama" id="nama" size="20"/></td>
	</tr>
	<tr>
		<td>HTTP://</td>
	</tr>
	<tr>
		<td><input type="text" name="web" id="web" size="20" title="Web atau Blog Anda"/></td>
	</tr>
	<tr>
		<td valign="top">Pesan</td>
	</tr>
	<tr>
		<td><textarea name="pesan" id="pesan"></textarea></td>
	</tr>
	<tr>
	  <td><input type="reset" onclick="return shout(nama.value,web.value,pesan.value);" value="Kirim"/>
          <input type="button" onclick="view(1);" value="View"/>
      </td>
	</tr>
</table>
</form>

</body>
</html>
