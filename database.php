<?php

// host database
DEFINE ("DB_HOST", "localhost");

// user datbase
DEFINE ("DB_USER", "root");

// password database
DEFINE ("DB_PASS", "");

// nama database
DEFINE ("DB_NAME", "");

class DB {
    private $mysqli;

    function __construct () {
        $this->mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    function tampil() {
        $query = "SELECT * FROM komentar ORDER BY tanggal DESC";
        $run = $this->mysqli->query($query);
        return $run;
    }

    function kirim($nama,$email,$website,$komentar,$tanggal) {
        $query = "INSERT INTO komentar(`nama`,`email`,`website`,`komentar`,`tanggal`) values('$nama','$email','$website','$komentar','$tanggal')";
        $this->mysqli->query($query);
        header('location: index.php?id='.time());
    }
}
