<?php session_start();
include "control/konek.php";

if(isset($_POST['submit']))
{
  $errors   = array();
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  if (empty($username) && empty($password)) 
  {
    echo "<script language='javascript'>alert('Isikan USERNAME dan PASSWORD'); location.replace('index2.php')</script>";
  }
  elseif (empty($username))
  {              
    echo "<script language='javascript'>alert('Isikan USERNAME'); location.replace('index2.php')</script>";
  } 
  elseif (empty($password)) 
  {
    echo "<script language='javascript'>alert('Isikan PASSWORD'); location.replace('index2.php')</script>";
  }
  
  $sql    = "SELECT * FROM user WHERE username = '$username' ";
  $result = mysqli_query($conn, $sql);
  $data   = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0)
  {
    if(password_verify($password, $data['password']))
    {
      if(empty($errors))
      {
        // Menyimpan session login
        $_SESSION['id_user']    = $data['id_user'];   // id user
        $_SESSION['nama']       = $data['nama'];      // nama user
        $_SESSION['username']   = $data['username'];  // username user
        $_SESSION['usertype']   = $data['usertype'];  // tipe user
        // $_SESSION['access']     = $data['access'];    // hak akses user
        
        if($data['usertype'] == 'admin')
        {
          echo "<script language='javascript'>alert('Anda berhasil Login sebagai Admin'); location.replace('home.php')</script>";
        }
        elseif($data['usertype'] == 'user')
        {
          echo "<script language='javascript'>alert('Anda berhasil Login sebagai user'); location.replace('home2.php')</script>";
        }
        
      } 
    }
      else
      {
        echo "<script>alert('PASSWORD SALAH!');history.go(-1)</script>";
      }
  }
    else
    {
      echo "<script>alert('USERNAME yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
    }
}
  else
  {
    echo "<script>alert('Pencet dulu tombolnya!');history.go(-1)</script>";
  } 
?>