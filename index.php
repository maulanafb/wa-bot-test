<h1>Form HTML Dengan PHP</h1>
<form action="" method="post">
    <div>
        <label>Nama</label><input type="text" name="nama" value="<?= isset($_POST['nama']) ? $_POST['nama'] : '' ?>" />
    </div>
    <div>
        <label>No Hp</label><input type="text" name="tlp" value="<?= isset($_POST['tlp']) ? $_POST['tlp'] : '' ?>" />
    </div>
    <input type="submit" name="daftar" value="Simpan" />
</form>
<?php
if (isset($_POST['daftar'])) {
  $no = $_POST['tlp'];



  include('WhatsappAPI.php'); // include given API file


  $wp = new WhatsappAPI("3775", "46e9c6844590be0f6d4df3e0871f185a0e53226f");
  $number = '+' . $no; // NOTE: Phone Number should be with country code
  $message = 'Selamat Registrasi anda berhasil cos no no me, '; // You can use WhatsApp Code to compose text messages like *bold*, ~Strikethrough~, ```Monospace```



  $status = $wp->sendText($number, $message);

  $status = json_decode($status);

  if ($status->status == 'error') {
    echo $status->response;
  } elseif ($status->status == 'success') {
    echo 'Success Bro <br />';
    echo $status->response;
  } else {
    print_r($status);
  }
}