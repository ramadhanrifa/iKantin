<?php
    class Produk{
        public $bakwan,
         $bakso,
         $roti,
         $susu,
         $jmlBakwan,
         $jmlBakso,
         $jmlRoti,
         $jmlSusu,
         $HargaBakwan,
         $HargaBakso,
         $HargaRoti,
         $HargaSusu,
         $TotalSeluruh,
         $TotalHargaBakwan,
         $TotalHargaBakso,
         $TotalHargaRoti,
         $TotalHargaSusu;

        function __construct(){
            $this->HargaBakso = 10000;
            $this->HargaBakwan = 4000;
            $this->HargaRoti = 2000;
            $this->HargaSusu = 5000;
        }
    }

    class Jumlah extends Produk{
        public function getBakso($bakso){
            $this->bakso = $bakso;
        }
        public function getBakwan($bakwan){
            $this->bakwan = $bakwan;
        }
        public function getRoti($roti){
            $this->roti = $roti;
        }
        public function getSusu($susu){
            $this->susu = $susu;
        }
        public function getJumlah($jmlBakwan, $jmlBakso, $jmlRoti, $jmlSusu){
            $this->jmlBakwan =$jmlBakwan;
            $this->jmlBakso = $jmlBakso;
            $this->jmlRoti = $jmlRoti;
            $this->jmlSusu = $jmlSusu;
        }

        public function setHarga() {
            $this->TotalHargaBakwan = $this->HargaBakwan * intval($this->jmlBakwan);
            $this->TotalHargaBakso = $this->HargaBakso * intval($this->jmlBakso);
            $this->TotalHargaRoti = $this->HargaRoti * intval($this->jmlRoti);
            $this->TotalHargaSusu = $this->HargaSusu * intval($this->jmlSusu);
            $this->TotalSeluruh = $this->TotalHargaBakwan + $this->TotalHargaBakso + $this->TotalHargaRoti + $this->TotalHargaSusu;
        }
        
        public function cetakStruk(){
            echo "******* <b>$ iKanntin Wikrama $</b> *******";
            echo "<br>";
            echo "Bakso : $this->jmlBakso x Rp. $this->HargaBakso : <b>$this->TotalHargaBakso</b>";
            echo "<br>";
            echo "Bakwan : $this->jmlBakwan x Rp. $this->HargaBakwan : <b>$this->TotalHargaBakwan</b>";
            echo "<br>";            
            echo "Bakwan : $this->jmlRoti x Rp. $this->HargaRoti : <b>$this->TotalHargaRoti</b>";
            echo "<br>";            
            echo "Bakwan : $this->jmlSusu x Rp. $this->HargaSusu : <b>$this->TotalHargaSusu</b>";
            echo "<br>";            
            echo "Total Bayar : Rp. <b>$this->TotalSeluruh</b>";
            echo "<br>";
            echo "***********************************";
        }
    }
    ?>