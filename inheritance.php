<?php
	// Inheritance = menghubungkan antar class (parent & child)
	// child class mewarisi semua property dan method dari parentnya yang visible (public, private, protected)
	// extends (memperluas) fungsionalitas dari parentnya
	class Produk {
		public $judul;
		public $penulis;
		public $penerbit;
		public $harga;
		public $jumlahhalaman;
		public $waktumain;

		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jumlahhalaman = 0, $waktumain = 0) {
			$this->judul	= $judul;
			$this->penulis	= $penulis;
			$this->penerbit = $penerbit;
			$this->harga	= $harga;

			// menambahkan property baru
			$this->jumlahhalaman = $jumlahhalaman;
			$this->waktumain = $waktumain;
		}

		// Method getLabel
		public function getLabel() {
			return "$this->penulis, $this->penerbit";
		}

		// Method getInfoProduk
		public function getInfoProduk() {
			$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
			return $str;
		}
	}
	// Membuat inheritance
	// HASILNYA akan = Komok : Naruto | Mashasi Kishimoto, Shonen Jump (Rp. 50000) - 100 halaman
	// extends adalah fungsionalitas dari parentnya
	// Membuat child class komik
	class KOMIK extends Produk {
		// Memanggil dan membuat method function getInfoProduk() untuk class KOMIK SAJA
		public function getInfoProduk() {
			// deklarasi string $str
			// Panggil getlabel()
			$str = " KOMIK : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga} ~ {$this->jumlahhalaman} Halaman.)";
			return $str;
		}
	}
	// Membuat Inherintace
	// Membuat child class FILM
	class FILM extends Produk {
		// Memanggil dan membuat method function getInfoProduk() untuk class FILM SAJA
		public function getInfoProduk() {
			// deklarasi string $str
			// panggil getlabel()
			$str = " FILM : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga} ~ {$this->waktumain} JAM.)";
			return $str;
		}
	}

	class CetakInfoProduk {
		public function cetak( Produk $produk) {
			$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga}) ";
			return $str;
		}
	}

	// instansiasi menjadi 2 buah object!
	// 100 masuk ke paramenter jumlah halaman
	// 0 masuk ke parameter waktu main
	// Maksudnya adalah object harus ditulis dan sama dengan parameter di construct!!!
	// membuat object baru tipe KOMIK atau FILM
	$produk1 = new KOMIK("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100, 0);
	$produk2 = new FILM("Matrik","John Liem","Disney",100000, 0, 1);

	// Panggil functionnya() dan timpa
	echo "CETAK INFO LENGKAP !!!!!";
	echo "<br>";
	echo $produk1->getInfoProduk();
	echo "<br>";
	echo $produk2->getInfoProduk();
	echo "<br>";

	echo "<br>";
	echo "CETAK LABEL !!!!!";
	echo "<br>";
	echo "film  : " . $produk2->getLabel();

	echo "<br>";
	echo "<br>";
	echo "CETAK INFO PRODUK !!!!!";
	echo "<br>";
	$infoProduk1 = new CetakInfoProduk();
	echo $infoProduk1->cetak($produk2);
?>