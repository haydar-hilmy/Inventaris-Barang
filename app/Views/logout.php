<?php
// Mulai session
session_start();

// Hapus semua variabel session
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit();
?>