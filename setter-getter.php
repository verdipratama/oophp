<?php
	// Visibility untuk mengatur akses dari property dan method pada sebuah objek
	// 3 keyword public, protected, private
	// PUBLIC dapat digunakan dimana saja bahkan diluar kelas
	// PROTECTED hanya dapat digunakan dalam sebuah kelas beserta turunannya
	// PRIVATE hanya dapat digunakan di dalam sebuah kelas tertentu saja

	// ===================================================================== //
	// Tujuan Setter & Getter untuk menghindari ketika membuat visibility public
	// Agar tidak bisa mengakses secara langsung.
	// S & G = Method untuk Ngeset dan untuk Ngeget
	class Produk {
		public $judul;
		public $penulis;
		public $penerbit;
		private $harga;
		protected $diskon;

		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
			$this->judul	= $judul;
			$this->penulis	= $penulis;
			$this->penerbit = $penerbit;
			$this->harga	= $harga;
		}

// =========================================================== //
		// Setter
		public function setJudul($judul) {
			$this->judul = $judul;
		}
		// Getter
		public function getJudul() {
			return $this->judul;
		}
		// Setter
		public function setPenulis($penulis) {
			$this->penulis = $penulis;
		}
		// Getter
		public function getPenulis() {
			return $this->penulis;
		}
		// Setter
		public function setPenerbit($penerbit) {
			$this->penerbit = $penerbit;
		}
		// Getter
		public function getPenerbit() {
			return $this->penerbit;
		}
		// Setter
		public function setHarga($harga) {
			$this->harga = $harga;
		}
		// Getter
		public function getHarga() {
			return $this->harga - ($this->harga * $this->diskon / 100);
		}
		// Setter
		public function setDiskon($diskon) {
			$this->diskon = $diskon;
		}
		// Getter
		public function getDiskon() {
			return $this->diskon;
		}

// =========================================================== //
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
	echo "<hr>";

	echo "<br>";
	echo "SETTER DAN GETTER !!!!!";
	echo "<br>";
	$produk2->setPenulis("Verdi Pratama");
	echo $produk2->getPenulis();
?>