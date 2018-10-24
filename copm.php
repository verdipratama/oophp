<?php
	// class = blueprint untuk membuat instance dari object
	// class mendefinisikan object
	// class bisa menyimpan data dan perilaku / property & method
	// object = intance yang didefinisakn oleh class
	// banyak object dapat dibuat menggunakan satu class
	// object dibuat dengan menggunakan keyword new
	// visibily itu penting tidak bisa sembarang dan mengubah property yang ada
	// Method adalah function di dalam class
	// Membuat class produk
	class Produk {
		public  $judul = "judul"; // membuat propertynya
		public	$penulis = "penulis";
		public	$penerbit = "penerbit";
		public	$harga = 0;

		public function getLabel() {
			// tambahin this biar sama dengan property
			// this adalah instance bersangkutan
			return "$this->penulis, $this->penerbit, $this->harga";
		}
	}

	// membuat object instance dari class
	// panggil objectnya timpa dengan nama propertynya
	// $produk1 = new Produk();
	// $produk1->judul = "hentai";
	// var_dump($produk1);
	
	// test tambah property
	// $produk2 = new Produk();
	// $produk2->judul 		 = "Matrik";
	// $produk2->tambahProperty = "lol";
	// var_dump($produk2);

	// instansiasi menjadi 2 buah object!
	$produk3 = new Produk();
	$produk3->judul 	= "Naruto";
	$produk3->penulis 	= "Masashi Kishimoto";
	$produk3->penerbit	= "Shonen Jump";
	$produk3->harga		= 50000;

	$produk4 = new Produk();
	$produk4->judul		= "Matrik";
	$produk4->penulis	= "John Liem";
	$produk4->penerbit	= "Disney";
	$produk4->harga		= 100000;

	// Panggil propertynya dan timpa
	echo "Komik : $produk3->penulis, $produk3->penerbit";
	echo "<br>";
	echo "<br>";
	// Panggil functionnya() dan timpa
	echo "Komik : " . $produk3->getLabel();
	echo "<br>";
	echo "Film  : " . $produk4->getLabel();
?>