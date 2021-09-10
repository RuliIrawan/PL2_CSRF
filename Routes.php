<?php

  // Memanggil fungsi dari CSRF
  include('Csrf.php');


include '../Controllers/Controller_Pegawai.php';
 // Membuat Object dari Class pegawai
$db = new Controller_pegawai();

// Membuat variabel dari Get URL
$function = $_GET['function'];

// Decision variabel create
if($function == "create_pegawai"){

    // Validasi Token CSRF
    if(validation()==true)
    {
        $db->POSTData(
            $_POST['nip'],
            $_POST['nama'],
            $_POST['jns_kel'],
            $_POST['tgl_lahir'],
            $_POST['status'],
            $_POST['mulai_kerja']
        );
    }
    header("location:../Views/View_pegawai.php");
}
// Decision variabel put
elseif($function == "put_pegawai"){

    // Validasi Token CSRF
    if(validation()==true)
    {
        $db->PUTData(
            $_POST['nip'],
            $_POST['nama'],
            $_POST['jns_kel'],
            $_POST['tgl_lahir'],
            $_POST['status'],
            $_POST['mulai_kerja']
        );   
    }
    header("location:../Views/View_pegawai.php");
}
// Decision variabel delete
elseif($function == "delete_pegawai"){
    $db->DELETEData($_GET['nip']);
    header("location:../Views/View_pegawai.php");
}


?>