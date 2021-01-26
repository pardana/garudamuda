<?php 
        if(isset($_GET['page'])){ $page = $_GET['page'];
     
            switch ($page) {
                case 'home':
                    include "beranda/home-sekolah.php";
                    break;
                case 'profil-sekolah':
                    include "beranda/profil-sekolah.php";
                    break;
                case 'visi-misi-sekolah':
                    include "beranda/visi-misi-sekolah.php";
                    break;
                case 'galeri-sekolah':
                    include "beranda/galeri-sekolah.php";
                    break;
                case 'kritik-saran-sekolah':
                    include "beranda/kritik-saran-sekolah.php";
                    break;
                case 'proses-kritik-saran':
                    include "beranda/proses-kritik-saran.php";
                    break;              
                default:
                    echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                    break;
            }
        }else{
            include "beranda/home-sekolah.php";
        }
     
         ?>