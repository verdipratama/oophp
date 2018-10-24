<?php
	class ikan {
		function berenang() {
			echo "FERDI DAPAT BERENANG";
		}
		function nama_ikan($ikan){
			echo $ikan;
		}
	}

	class kerapu extends ikan {
		function nama_ikan() {
			$ikan = "Bigo";
			return $ikan;
		}
	}


	$ikan = new ikan();
	$kerapu = new kerapu();
	$kerapu->berenang();
	$kerapu->nama_ikan();
?>