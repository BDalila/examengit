<?php

include_once 'connect.php';

switch ($_GET["param"]) {
	case "personne":
		listPersonne();
		break;
	case "colis":
		listColisPer($id_personne);
		break;		
	default:
		;
	break;
}

function listPersonne(){
	global $conn;
	
	$sql = "SELECT * FROM personne";
	$resultat = $conn->query($sql);
	//echo $sql;
	if ($resultat->num_rows > 0) {
   	
	    while($row = $resultat->fetch_assoc()) {
	        echo json_encode($row);
	    }
	} else {
    	echo "aucune personne enregistre dans la bdd";
	}
}
function listColisPer($id_personne){
	global $conn;
	
	$sql = "SELECT * FROM colis where id_destin =".$id_personne;
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			
		}
	}
}
$id_personne= 1 ;
//var_dump(listColisPer($id_personne));

?>