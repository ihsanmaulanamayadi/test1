<?php
include 'koneksi.php';
?>
<h1>Transaksi Pembayaran</h1>
<p><a href="bayarbarang.php">Form Bayar Barang</a></p>
<hr>
<?php
$kode = $_POST['kode'];
$query = mysqli_query($conn,"SELECT * FROM p11 WHERE kode = '$kode'");
if(mysqli_num_rows($query)>0)
{
    $data = mysqli_fetch_array($query);
?>
<form method="post" action="prosesbarang2.php">
    Kode Barang : <?php echo $kode; ?><br>
    Nama Barang : <?php echo $data['namabarang']; ?><br>
    Harga : <?php echo $data['harga']; ?><br>
    Jumlah Barang : <input type="text"name="jumlah">
    <input type="hidden"name="kode"value="<?php echo $kode?>">
    <?php $harga=$data['harga'];?>
    <input type="hidden"name="harga"value="<?php echo $harga?>">
    <input type="submit"name="submit"value="Submit">
</form>
<?php
}
else echo "kode tidak ditemukan";
?>