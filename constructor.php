<?php
	// Konsep konstruktor
	// sebuah method yang special karena otomatis dijalankan ketika sebuah class kita instansiasi atau kita buat objectnya
	class Produk {
		// Property
		public  $judul;
		public	$penulis;
		public	$penerbit;
		public	$harga;

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

	// instansiasi menjadi 3 buah object!
	$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000);
	$produk2 = new Produk("Matrik","John Liem","Disney",100000);
	$produk3 = new Produk("www.verside.com");

	// Panggil functionnya() dan timpa
	echo "Komik : " . $produk1->getLabel();
	echo "<br>";
	echo "Film  : " . $produk2->getLabel();
	echo "<br>";
	var_dump($produk3);
?>