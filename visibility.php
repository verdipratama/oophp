<?php
	// Visibility = untuk mengatur akses dari property dan method pada sebuah objek
	// 3 keyword = public, protected, private
	// public dapat digunakan dimana saja bahkan diluar kelas
	// protected hanya dapat digunakan dalam sebuah kelas beserta turunannya
	// private hanya dapat digunakan di dalam sebuah kelas tertentu saja
	class Produk {
		public $judul;
		public $penulis;
		public $penerbit;

		// Mencoba visibility private dan protected
		private $harga; // di dalam class produk
		protected $diskon; // di child class

		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
			$this->judul	= $judul;
			$this->penulis	= $penulis;
			$this->penerbit = $penerbit;
			$this->harga	= $harga;
		}

		// Menambahkan Visibility Private untuk menampilkan harga
		public function getHarga() {
			return $this->harga - ($this->harga * $this->diskon / 100);
		}

		public function getLabel() {
			return "$this->penulis, $this->penerbit";
		}

		public function getInfoProduk() {
			$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
			return $str;
		}
	}
	class KOMIK extends Produk {
		public $jumlahhalaman;

		public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jumlahhalaman = 0) {

			parent::__construct($judul, $penulis, $penerbit, $harga);

			$this->jumlahhalaman = $jumlahhalaman;
		}

		// Menambahkan Visibility Protected untuk menampilkan harga
		public function setDiskon($diskon) {
			$this->diskon = $diskon;
		}

		public function getInfoProduk() {
			$str = " KOMIK : " . parent::getInfoProduk() . " ~ {$this->jumlahhalaman} Halaman.)";
			return $str;
		}
	}

	class FILM extends Produk {
		public $waktumain;

		public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktumain = 0) {

			parent::__construct($judul, $penulis, $penerbit, $harga);

			$this->waktumain = $waktumain;
		}

		public function getInfoProduk() {
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
	echo "<br>";
	echo "<hr>";

	echo "<br>";
	echo "HARGA SEBELUMNYA !!!!!";
	echo "<br>";
	echo $produk1->getHarga();
	echo "<hr>";

	echo "<br>";
	echo "HARGA SETELAH DISKON !!!!!";
	echo "<br>";
	$produk1->setDiskon(50);
	echo $produk1->getHarga();
?>