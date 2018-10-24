<?php
	// Inheritance dapat menghubungkan antar class (parent & child)
	// child class mewarisi semua property dan method dari parentnya yang visble (public, private, protected)
	class Produk {
		public $judul;
		public $penulis;
		public $penerbit;
		public $harga;
		// membuat property baru
		public $jumlahhalaman;
		public $waktumain;
		public $tipe;

		// defaultnya = 0
		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jumlahhalaman = 0, $waktumain = 0, $tipe = "tipe") {
			$this->judul	= $judul;
			$this->penulis	= $penulis;
			$this->penerbit = $penerbit;
			$this->harga	= $harga;
			$this->jumlahhalaman = $jumlahhalaman;
			$this->waktumain = $waktumain;
			$this->tipe = $tipe;
		}

		public function getLabel() {
			return "$this->penulis, $this->penerbit";
		}

		// Method baru di dalam class produk untuk menggabungan dari CetakInfoProduk
		// HASILNYA = Komok : Naruto | Mashasi Kishimoto, Shonen Jump (Rp. 50000) - 100 halaman
		public function getInfoLengkap() {
			// deklarasikan string $str
			$str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

			// solusi ketika kita mempunyai beberapa tipe yg berbeda
			if ( $this->tipe == "KOMIK") {
				// .= operator concat menggabungkan string
				$str .= " ~ {$this->jumlahhalaman} Halaman.";
			} else if ( $this->tipe == "FILM" ) {
				$str .= " ~ {$this->waktumain} JAM.";
			}

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
	$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100, 0, "KOMIK");
	$produk2 = new Produk("Matrik","John Liem","Disney",100000, 0, 1, "FILM");

	// Panggil functionnya() dan timpa
	echo "CETAK INFO LENGKAP !!!!!";
	echo "<br>";
	echo $produk1->getInfoLengkap();
	echo "<br>";
	echo $produk2->getInfoLengkap();
	echo "<br>";
?>