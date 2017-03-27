<?php
    class Classkategori{
 
        public function create($nama){
            include 'Koneksi.php';
            $sql = "INSERT INTO mahasiswa (nama) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s',$nama);
            $query = $stmt->execute();
            $stmt->close();
            $conn->close();
            return $query;
        }
        public function readbyid($nim){
            include 'Koneksi.php';
            $sql = "SELECT * FROM mahasiswa WHERE nim = '".$nim."'";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        }
        public function readAll(){
            include 'Koneksi.php';
            $sql = "SELECT * FROM mahasiswa";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        }
        public function updatebyid($nim,$nama){
            include 'Koneksi.php';
            $sql = "UPDATE mahasiswa SET nama = ? WHERE nim = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si',$nama,$nim);
            $query = $stmt->execute();
            $stmt->close();
            $conn->close();
            return $query;
        }
        public function deletebyid($nim){
            include 'Koneksi.php';
            $sql = "DELETE FROM mahasiswa WHERE nim = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$nim);
            $query = $stmt->execute();
            $stmt->close();
            $conn->close();
            return $query;
        }
    }
 ?>