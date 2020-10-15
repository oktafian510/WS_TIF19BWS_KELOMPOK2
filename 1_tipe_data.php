<?php 
echo "<h1>Tipe data php </h1><br>";
$string ="Tipe Data String";
$integer =123456789;
$float = 22.123;
$boolean = true;
$array =['aku','kamu',12,22.12,false];


echo "String = ".$string."<br>";
echo  "integer = ".$integer."<br>";
echo  "float = ".$float."<br>";
echo  "boolean = ".$boolean."<br>";
echo  "array = ".$array['0'];




 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Document</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<h1>Paragraf</h1>
 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

 	<p style="text-align: right;">
 		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 	</p>

 	<table border="3">
 		<h1>Membuat Table</h1>
	<tr>
		<td>baris 1 / kolom 1</td>
		<td>baris 1 / kolom 2</td>
		<td>baris 1 / kolom 3</td>
	</tr>
	<tr>
		<td>baris 2 / kolom 1</td>
		<td>baris 2 / kolom 2</td>
		<td>baris 2 / kolom 3</td>
	</tr>
	<tr>
		<td>baris 3/ kolom 1</td>
		<td>baris 3/ kolom 2</td>
		<td>baris 3/ kolom 3</td>
	</tr>
	<tr>
		<td>baris 4/ kolom 1</td>
		<td>baris 4/ kolom 2</td>
		<td>baris 4/ kolom 3</td>
	</tr>

	
</table>
<h1>
	
	Membuat Link
	</h1><a href="index_profile.html">Klik aku</a>




	<h1>
		MEmbuat List
	</h1>

	<ul>
		<li>1</li>
		<li>2</li>
		<li>3</li>
		<li>4</li>
		<li>5</li>
	</ul>


	<h1>Form</h1>
	<form>
	Nama Depan :<input type="text" placeholder="isikan nama"><br/>
	Nama Belakang : <input type="text">
</form>

<h1>Gambar</h1>
<img src="img/logo.jpg" width="100">

<h1>Mengenal Class dan Id pada HTML<br/>www.malasngoding.com</h1>
	<!-- contoh penggunaan class -->
	<div class="kotak">kotak 1</div>
	<div class="kotak">kotak 2</div>
	<div class="kotak">kotak 3</div>
 
	<!-- contoh penggunaan id -->
	<div id="kotak">Kotak 4</div>

 </body>
 </html>