<?php
session_start();
if( !isset($_SESSION["admin"]) ) {
    header("Location: index.php");
    exit;
}
require 'func/func_instruktur.php';
$id_akun = $_GET["id"];
if (hapus($id_akun)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'instruktur.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'instruktur.php';
		</script>
	";
}
?>