<?php
include 'koneksi.php';
$today=date('Ymd');
?>
<h1>Transaksi Pembayaran Barang</h1>
<p><a href="bayarbarang.php">Form Bayar Barang</a></p>
<hr>
<?php
$kode = $_POST['kode'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$total = $jumlah*$harga;
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM p111 WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
$lastnourut = substr($lastnotransaksi,8,4);
$nextnourut = $lastnourut=1;
$nextnotransaksi = $today.sprintf('%04s',$nextnourut);
$query = mysqli_query($conn,"INSERT INTO p111 (idtransaksi,kode,jumlah,total) VALUES ('$nextnotransaksi','$kode','$jumlah','$total')");
if($query)
{
    $query2 = mysqli_query($conn,"SELECT * FROM p11 WHERE kode = '$kode'");
    $data2 = mysqli_fetch_array($query2);
?>
<p>Transaksi Pembayaran Barang Sukses</p>
ID Transaksi : <?php echo $nextnotransaksi;?><br>
Kode Barang : <?php echo $kode;?><br>
Nama Barang : <?php echo $data2['namabarang'];?><br>
Harga : <?php echo $data2['harga'];?><br>
Jumlah Barang : <?php echo $jumlah;?><br>
Total Bayar : <?php echo $total;?><br>
<?php
}
else echo "Transaksi gagal";

?>