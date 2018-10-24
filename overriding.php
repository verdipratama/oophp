<?php
	class Produk {
		public $judul;
		public $penulis;
		public $penerbit;
		public $harga;

		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
			$this->judul	= $judul;
			$this->penulis	= $penulis;
			$this->penerbit = $penerbit;
			$this->harga	= $harga;
		}

		public function getLabel() {
			return "$this->penulis, $this->penerbit";
		}

		public function getInfoProduk() {
			$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
			return $str;
		}
	}
	// Overriding (Mengambil alih / Menimpa Method parent class)
	class KOMIK extends Produk {
		// Lebih baik untuk menulis variable class komik di child class
		public $jumlahhalaman;

		// Butuh __construct method untuk jumlahhalaman di child class
		public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jumlahhalaman = 0) {
			// Dari pada 1 - 1 lebih efektif menggunakan parent::
			parent::__construct($judul, $penulis, $penerbit, $harga);

			// Hanya jumlah halaman yang ditulis manual
			$this->jumlahhalaman = $jumlahhalaman;
		}

		public function getInfoProduk() {
			// Ovveriding getInfoProduk() menggunakan parent:: dengan concat
			// Karena dia method menggunakan ""
			$str = " KOMIK : " . parent::getInfoProduk() . " ~ {$this->jumlahhalaman} Halaman.)";
			return $str;
		}
	}

	class FILM extends Produk {
		// Lebih baik untuk menulis variable class komik di child class
		public $waktumain;

		// Butuh __construct method untuk jumlahhalaman di child class
		public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktumain = 0) {
			// Dari pada 1 - 1 lebih efektif menggunakan parent::
			parent::__construct($judul, $penulis, $penerbit, $harga);

			// Hanya waktu main yang ditulis manual
			$this->waktumain = $waktumain;
		}

		public function getInfoProduk() {
			// Ovveriding getInfoProduk() menggunakan parent:: dengan concat
			// Karena dia method menggunakan ""
			$str = " FILM : " . parent::getInfoProduk() . " ~ {$this->waktumain} JAM.)";
			return $str;
		}
	}

	class CetakInfoProduk {
		public function cetak( Produk $produk) {
			$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga}) ";
			return $str;
		}
	}

	$produk1 = new KOMIK("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100);
	$produk2 = new FILM("Matrik","John Liem","Disney",100000, 1);

	echo "CETAK INFO LENGKAP !!!!!";
	echo "<br>";
	echo $produk1->getInfoProduk();
	echo "<br>";
	echo $produk2->getInfoProduk();
	echo "<br>";
	echo "<hr>";

	echo "<br>";
	echo "CETAK LABEL !!!!!";
	echo "<br>";
	echo "film  : " . $produk2->getLabel();
	echo "<hr>";

	echo "<br>";
	echo "<br>";
	echo "CETAK INFO PRODUK !!!!!";
	echo "<br>";
	$infoProduk1 = new CetakInfoProduk();
	echo $infoProduk1->cetak($produk2);
?>