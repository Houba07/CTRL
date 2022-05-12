<?php
	include 'C:\xampp\htdocs\bib_ryh\config.php';
	include_once 'C:\xampp\htdocs\bib_ryh\Model\categorie.php';
	class categorieC {
		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercategorie($id_categorie){
			$sql="DELETE FROM categorie WHERE id_categorie=:id_categorie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_categorie', $id_categorie);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (id_categorie, nom_categorie,image_categorie ) 
			VALUES (:id_categorie,:nom_categorie,:image_categorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_categorie' => $categorie->getid_categorie(),
					'nom_categorie' => $categorie->getnom_categorie(),
					'image_categorie'=> $categorie->getimage_categorie()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercategorie($id_categorie){
			$sql="SELECT * from categorie where id_categorie=$id_categorie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categorie, $id_categorie){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						nom_categorie= :nom_categorie,
						image_categorie=:image_categorie
					WHERE id_categorie= :id_categorie'
				);
				$query->execute([
					'id_categorie' => $id_categorie,
					'nom_categorie' => $categorie->getnom_categorie(),
					'image_categorie'=>$categorie->getimage_categorie()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		

		function tricategorie($categorie){
		$sql="SELECT * FROM `categorie` ";
		$sql .=$type;

		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}           
		}
	function triercategorie_desc()
	{
		$sql = "SELECT * from categorie ORDER BY id_categorie DESC";
		$db = config::getConnexion();
		try {
			$req = $db->query($sql);
			return $req;
		} 
		catch (Exception $e)
		 {
			die('Erreur: ' . $e->getMessage());
		}

	}
	function triercategorie_asc()
	{
	$sql = "SELECT * from categorie ORDER BY nom_categorie ASC";
	$db = config::getConnexion();
	try {
		$req = $db->query($sql);
		return $req;
	} 
	catch (Exception $e)
	 {
		die('Erreur: ' . $e->getMessage());
	}

	}
	function rechercher_cat($rechercher) {
		$pdo = Config::getConnexion();
		try{
		  $query= $pdo->prepare(
			'SELECT * from categorie where nom_categorie= $rechercher ' 
			
			
		  );
		  $query->execute();
		  $result = $query->fetchALL();
		  return $result;
		} catch(PDOException $e) {
		  $e->getMessage();  
		}
	  }

}
class livreC {
	function afficherlivre(){
		$sql="SELECT * FROM livre";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMeesage());
		}
	}
	function supprimerlivre($id_livre){
		$sql="DELETE FROM livre WHERE id_livre=:id_livre";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id_livre', $id_livre);
		try{
			$req->execute();
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	}
	function ajouterlivre($livre){
		$sql="INSERT INTO livre (id_livre,titre_livre ,nom_auteur,date_publication,description_livre,image_livre,pdf_livre,audio_livre,categorie,QR_code ) 
		VALUES (:id_livre,:titre_livre ,:nom_auteur,:date_publication,:description_livre,:image_livre,:pdf_livre,:audio_livre,:categorie,:QR_code)";
		$db = config::getConnexion();
		try{
			$query = $db->prepare($sql);
			$query->execute([
				'id_livre' => $livre->getid_livre(),
				'titre_livre'=> $livre->gettitre_livre(),
				'nom_auteur' => $livre->getnom_auteur(),
				'date_publication'=>$livre->getdate_publication(),
				'description_livre'=>$livre->getdescription_livre(),
				'image_livre'=> $livre->getimage_livre(),
				'pdf_livre'=> $livre->getpdf_livre(),
				'audio_livre'=>$livre->getaudio_livre(),
				'categorie'=>$livre->getcategorie(),
				'QR_code'=>$livre->getQR_code()
			]);			
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}			
	}
	function recupererlivre($id_livre){
		$sql="SELECT * from livre where id_livre=$id_livre";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$livre=$query->fetch();
			return $livre;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
	
	function modifierlivre($livre, $id_livre){
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE livre SET
					id_livre= :id_livre, 
					titre_livre= :titre_livre,
					nom_auteur= :nom_auteur,
					date_publication=:date_publication,
					description_livre=:description_livre,
					image_livre=:image_livre,
					pdf_livre=:pdf_livre,
					audio_livre=:audio_livre,
					categorie=:categorie,
					QR_code=:QR_code
				WHERE id_livre= :id_livre'
			);
			$query->execute([
				'id_livre' => $livre->getid_livre(),
				'nom_auteur' => $livre->getnom_auteur(),
				'titre_livre'=> $livre->gettitre_livre(),
				'date_publication'=>$livre->getdate_publication(),
				'description_livre'=>$livre->getdescription_livre(),
				'image_livre'=> $livre->getimage_livre(),
				'pdf_livre'=> $livre->getpdf_livre(),
				'audio_livre'=>$livre->getaudio_livre(),
				'categorie'=>$livre->getcategorie(),
				'QR_code'=>$livre->getQR_code()
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function trierlivre_desc()
	{
		$sql = "SELECT * from livre ORDER BY id_livre DESC";
		$db = config::getConnexion();
		try {
			$req = $db->query($sql);
			return $req;
		} 
		catch (Exception $e)
		 {
			die('Erreur: ' . $e->getMessage());
		}

}
function trierlivre_asc()
{
	$sql = "SELECT * from livre ORDER BY titre_livre ASC";
	$db = config::getConnexion();
	try {
		$req = $db->query($sql);
		return $req;
	} 
	catch (Exception $e)
	 {
		die('Erreur: ' . $e->getMessage());
	}

}
function rechercher_livre($rechercher) {
	$pdo = Config::getConnexion();
	try{
	  $query= $pdo->prepare(
		'SELECT * from livre where titre_livre= $rechercher ' 
		
		
	  );
	  $query->execute();
	  $result = $query->fetchALL();
	  return $result;
	} catch(PDOException $e) {
	  $e->getMessage();  
	}
  }

}


?>