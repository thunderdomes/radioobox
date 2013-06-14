<?php

$db = new PDO("mysql:host=localhost;dbname=radio",'root','', array(PDO::ATTR_PERSISTENT => true));

// ambil group
$db->beginTransaction();

$data = file_get_contents('http://radio.dihital.in/api/?do=group&key=6f865ca5e57dd20087a03fa98a725594');
$ar = json_decode($data);

$sth = $db->prepare("truncate group_radio");
$sth->execute();

foreach($ar->data as $value){
	$sth = $db->prepare("INSERT IGNORE INTO group_radio VALUES (:id,:nama)");
    // i know this is all wrong ----------------
    $sth->bindParam(':id',$value->idGrup);
    $sth->bindParam(':nama',$value->NamaGrup);
    // ----------------------------------------
    $sth->execute();
}


$sth = $db->prepare("SELECT m.*,s.name FROM maping_radio_dihital m inner join states s on  m.id_radio=s.id");
$sth->execute();
$all = $sth->fetchAll(PDO::FETCH_ASSOC);
$totalGagalPropinsi = 0;
$totalInsert = 0;	

$sth = $db->prepare("truncate radio");
$sth->execute();

foreach($all as $result){
	$id_dihital = $result['id_dihital'];
	$id_radio 	= $result['id_radio'];

	echo "mulai download data ".$result['name']." id : ".$id_dihital."\n";

	$data = file_get_contents('http://radio.dihital.in/api/?do=listPropinsi&id='.$id_dihital.'&key=6f865ca5e57dd20087a03fa98a725594');
	//echo $data;
	$ar = json_decode($data);
	if(!$ar){
		echo "oh shit\n";
		$totalGagalPropinsi++;
		continue;
	}
	foreach($ar->data as $value){
		$sth = $db->prepare("INSERT IGNORE INTO radio VALUES (:id,:nama,null)");
	    // i know this is all wrong ----------------
	    $sth->bindParam(':id',$value->IdRadio);
	    $sth->bindParam(':nama',$value->NamaRadio);
	    // ----------------------------------------
	    if($sth->execute()){
	    	echo "mulai inser radio ".$value->NamaRadio."\n";
	    	$totalInsert++;
	    }
	}
}
echo "Total Propinsi Gagal Diambil : ".$totalGagalPropinsi."\n";
echo "Total Radio berhasil Diambil : ".$totalInsert."\n";

if($totalInsert == 0){
	$db->rollBack();
}
else{
	$db->commit();
}