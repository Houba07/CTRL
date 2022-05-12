<?php
	class categorie{
		private $id_categorie=null;
		private $nom_categorie=null;
        private $image_categorie=null;
		function __construct($id_categorie, $nom_categorie,$image_categorie){
            $this->id_categorie=$id_categorie;
			$this->nom_categorie=$nom_categorie;
            $this->image_categorie=$image_categorie;
		}
		function getid_categorie(){
			return $this->id_categorie;
		}
		function getnom_categorie(){
			return $this->nom_categorie;
		}
        function getimage_categorie(){
			return $this->image_categorie;
		}
        function setid_categorie(string $id_categorie){
			$this->id_categorie=$id_categorie;
		}
        function setnom_categorie(string $nom_categorie){
			$this->nom_categorie=$nom_categorie;
		}
        function setimage_categorie(string $image_categorie){
			$this->image_categorie=$image_categorie;
		}
		
	}
class livre{
		private $id_livre=null;
		private $titre_livre=null;
		private $nom_auteur=null;
		private $date_publication=null;
		private $description_livre=null;
		private $image_livre=null;
		private $pdf_livre=null;
        private $audio_livre=null;
		private $categorie=null;
		private $QR_code=null;
		function __construct($id_livre,$titre_livre,$nom_auteur,$date_publication,$description_livre,$image_livre,$pdf_livre,$audio_livre,$categorie,$QR_code){
            $this->id_livre=$id_livre;
			$this->titre_livre=$titre_livre;
            $this->nom_auteur=$nom_auteur;
			$this->date_publication=$date_publication;
            $this->description_livre=$description_livre;
			$this->image_livre=$image_livre;
            $this->pdf_livre=$pdf_livre;
			$this->audio_livre=$audio_livre;
			$this->categorie=$categorie;
			$this->QR_code=$QR_code;
		}
		function getid_livre(){
			return $this->id_livre;
		}
		function gettitre_livre(){
			return $this->titre_livre;
		}
        function getnom_auteur(){
			return $this->nom_auteur;
		}
		function getdate_publication(){
			return $this->date_publication;
		}
		function getdescription_livre(){
			return $this->description_livre;
		}
        function getimage_livre(){
			return $this->image_livre;
		}
		function getpdf_livre(){
			return $this->pdf_livre;
		}
        function getaudio_livre(){
			return $this->audio_livre;
		}
		function getcategorie(){
			return $this->categorie;
		}
		function getQR_code(){
			return $this->QR_code;
		}

        function setid_livre(string $id_livre){
			$this->id_livre=$id_livre;
		}
		function settitre_livre(string $titre_livre){
			$this->titre_livre=$titre_livre;
		}
        function setnom_auteur(string $nom_categorie){
			$this->nom_auteur=$nom_auteur;
		}
        function setdate_publication(string $date_publication){
			$this->date_publication=$date_publication;
		}
		function setdescription_livre(string $description_livre){
			$this->description_livre=$description_livre;
		}
		function setimage_livre(string $image_livre){
			$this->image_livre=$image_livre;
		}
		function setpdf_livre(string $pdf_livre){
			$this->pdf_livre=$pdf_livre;
		}
		function setaudio_livre(string $audio_livre){
			$this->audio_livre=$audio_livre;
		}
		function setcategorie(string $categorie){
			$this->categorie=$categorie;
		}
		function setQR_code(string $QR_code){
			$this->QR_code=$QR_code;
		}
	}

	


?>