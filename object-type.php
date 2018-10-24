<?php
	// Konsep konstruktor
	// sebuah method yang special karena otomatis dijalankan ketika sebuah class kita instansiasi atau kita buat objectnya
	class Produk {
		// Property
		public $judul;
		public $penulis;
		public $penerbit;
		public $harga;

		// __ magic method yang dimiliki php
		// constructor adalah metode khusus yang akan jalankan setiap kita membuat instance dari sebuah class
		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ) {
			// timpa semua property karena berbeda dengan property yg diatas
			$this->judul	= $judul;
			$this->penulis	= $penulis;
			$this->penerbit = $penerbit;
			$this->harga	= $harga;
		}

		// Method
		public function getLabel() {
			// tambahin this biar sama dengan property
			return "$this->penulis, $this->penerbit";
		}
	}

	//  Membuat Object Type
	// class ini hanya mencetak object dari class
	// Keseimpulannya kita bisa membuat object sebagai tipe data sendiri
	class CetakInfoProduk {
		// fungsi cetak hanya menerima parameter yg jenisnya class Produk LALU OBJECTnya apa gtuuu...
		public function cetak( Produk $produk) {
			// pangil fungsi getlabel()
			$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})"; // buat variable string = $str
			return $str;
		}
	}

	// instansiasi menjadi 2 buah object!
	$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000);
	$produk2 = new Produk("Matrik","John Liem","Disney",100000);

	// Panggil functionnya() dan timpa
	echo "Komik : " . $produk1->getLabel();
	echo "<br>";
	echo "Film  : " . $produk2->getLabel();

	echo "<br>";
	echo "<br>";
	echo "CETAK INFO PRODUK !!!!!";
	echo "<br>";
	// cara mencetak cetakinfoproduk
	$infoProduk1 = new CetakInfoProduk();
	echo $infoProduk1->cetak($produk2);
?>