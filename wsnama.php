<?php
    $ns = 'http://localhost/nusoapku/wsnama.php';//setting namespace
    require_once 'lib/nusoap.php'; // load nusoap toolkit library in controller
    $server = new soap_server; // create soap server object
    $server->configureWSDL("WEB SERVICE AKADEMIK MENGGUNAKAN SOAP WSDL", $ns); // wsdl configuration
    $server->wsdl->schemaTargetNamespace = $ns; // server namespace
 
    ########################nama BUKU##############################################################
    // Complex Array Keys and Types nama Buku++++++++++++++++++++++++++++++++++++++++++
    $server->wsdl->addComplexType("namaData","complexType","struct","all","",
        array(
        "nim"=>array("name"=>"nim","type"=>"xsd:int"),
        "nama"=>array("name"=>"nama","type"=>"xsd:string")
        )
    );
    // Complex Array nama Buku++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    $server->wsdl->addComplexType("namaArray","complexType","array","","SOAP-ENC:Array",
        array(),
        array(
            array(
                "ref"=>"SOAP-ENC:arrayType",
                "wsdl:arrayType"=>"tns:namaData[]"
            )
        ),
        "namaData"
    );
    // End Complex Type nama++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //create nama buku
    $input_create = array('nama' => "xsd:string"); // parameter create nama
    $return_create = array("return" => "xsd:string");
    $server->register('create',
        $input_create,
        $return_create,
        $ns,
        "urn:".$ns."/create",
        "rpc",
        "encoded",
        "Menyimpan nama Buku Baru");
    //end create nama buku
    //readbyid nama buku
    $input_readbynim = array('nim' => "xsd:int"); // parameter readbyid nama
    $return_readbynim = array("return" => "tns:namaArray");
    $server->register('readbynim',
        $input_readbynim,
        $return_readbynim,
        $ns,
        "urn:".$ns."/readbynim",
        "rpc",
        "encoded",
        "Mengambil nama Buku by nim");
    //end readbyid nama buku
    //update nama buku
    $input_update = array('nim' => "xsd:int","nama"=>"xsd:string"); // parameter update nama
    $return_update = array("return" => "xsd:string");
    $server->register('updatebynim',
        $input_update,
        $return_update,
        $ns,
        "urn:".$ns."/updatebynim",
        "rpc",
        "encoded",
        "Mengupdate nama by nim");
    //end update nama buku
    //delete nama buku
    $input_delete = array('nim' => "xsd:string"); // parameter hapus nama
    $return_delete = array("return" => "xsd:string");
    $server->register('deletebynim',
        $input_delete,
        $return_delete,
        $ns,
        "urn:".$ns."/deletebynim",
        "rpc",
        "encoded",
        "Menghapus nama by nim");
    //end delete nama buku
    //Ambil Semua Data nama buku
    $input_readall = array(); // parameter ambil data nama
    $return_readall = array("return" => "tns:namaArray");
    $server->register('readall',
        $input_readall,
        $return_readall,
        $ns,
        "urn:".$ns."/readall",
        "rpc",
        "encoded",
        "Mengambil Semua Data nama Buku");
    //Ambil Semua Data nama buku
    ################################nama BUKU#######################################################
    ###########################FUNCTION nama BUKU###################################################
    function create($nama){
        require_once 'nusoapmu/Classnama.php';
        $nama = new Classnama;
        if ($nama->create($nama)) {
            $respon = "sukses";
        }else{
            $respon = "error";
        }
        return $respon;
    }
    function readbyid($nim){
        require_once 'nusoapmu/Classnama.php';
        $nama = new Classnama;
        $hasil = $nama->readbyid($nim);
        $daftar = array();
        while ($item = $hasil->fetch_assoc()) {
            array_push($daftar, array('nim'=>$item['nim'],'nama'=>$item['nama']));
        }
        return $daftar;
    }
    function readall(){
        require_once 'nusoapmu/Classnama.php';
        $nama = new Classnama;
        $hasil = $nama->readAll();
        $daftar = array();
        while ($item = $hasil->fetch_assoc()) {
            array_push($daftar, array('nim'=>$item['nim'],'nama'=>$item['nama']));
        }
        return $daftar;
    }
    function updatebyid($nim,$nama){
        require_once 'nusoapmu/Classnama.php';
        $nama = new Classnama;
        if ($nama->updatebyid($nim,$nama)) {
            $respon = "sukses";
        }else{
            $respon = "error";
        }
        return $respon;
    }
    function deletebynim($nim){
        require_once 'nusoapmu/Classnama.php';
        $nama = new Classnama;
        if ($nama->deletebynim($nim)) {
            $respon = "sukses";
        }else{
            $respon = "error";
        }
        return $respon;
    }
 
    $server->service(file_get_contents("php://input"));
 ?>