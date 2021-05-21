<?php     

     namespace App\models\dossier ;

     use Faker\Factory;

     class Dossier {

          // attributs
          private $numero;
          private $utilisateur;
          private $sujetAutorisation;
          private $numeroDecision;
          private $dateDecision;
          private $dateDebutAutorisation;
          private $dateFinAutorisation;
          private $surface;
          private $montant;
          private $typeActivite;
          private $situationActuelle;
          private $decisionDeDirection;
          private $archive;




          /*
          function __construct($numero,$utilisateur, $sujetAutorisation, $numeroDecision,$dateDecision, $dateDebutAutorisation, $dateFinAutorisation, $surface, $montant, $typeActivite, $situationActuelle,$decisionDeDirection) {
              $faker = Factory::create();

               $this->numero = $numero;
               $this->utilisateur = $utilisateur;
               $this->sujetAutorisation = $sujetAutorisation;
               $this->numeroDecision = $numeroDecision;
               $this->dateDecision = $dateDecision;
               $this->dateDebutAutorisation = $dateDebutAutorisation;
               $this->dateFinAutorisation = $dateFinAutorisation;
               $this->surface = $surface;
               $this->montant = $montant;
               $this->typeActivite = $typeActivite;
               $this->situationActuelle = $situationActuelle;
               $this->decisionDeDirection = $decisionDeDirection;
               $this->archive = false;

          }*/


          public function toString() {
               
          }



          // getters and setters

          /**
           * Get the value of numero
           */ 
          public function getNumero()
          {
                    return $this->numero;
          }

          /**
           * Set the value of numero
           *
           * @return  self
           */ 
          public function setNumero($numero)
          {
                    $this->numero = $numero;

                    return $this;
          }

          /**
           * Get the value of utilisateur
           */ 
          public function getUtilisateur()
          {
                    return $this->utilisateur;
          }
          
          /**
           * Set the value of utilisateur
           *
           * @return  self
           */ 
          public function setUtilisateur($utilisateur)
          {
                    $this->utilisateur = $utilisateur;

                    return $this;
          }

          /**
           * Get the value of sujetAutorisation
           */ 
          public function getSujetAutorisation()
          {
                    return $this->sujetAutorisation;
          }

          /**
           * Set the value of sujetAutorisation
           *
           * @return  self
           */ 
          public function setSujetAutorisation($sujetAutorisation)
          {
                    $this->sujetAutorisation = $sujetAutorisation;

                    return $this;
          }

          /**
           * Get the value of numeroDecision
           */ 
          public function getNumeroDecision()
          {
                    return $this->numeroDecision;
          }

          /**
           * Set the value of numeroDecision
           *
           * @return  self
           */ 
          public function setNumeroDecision($numeroDecision)
          {
                    $this->numeroDecision = $numeroDecision;

                    return $this;
          }

          /**
           * Get the value of dateDebutAutorisation
           */ 
          public function getDateDebutAutorisation()
          {
                    return $this->dateDebutAutorisation;
          }

          /**
           * Set the value of dateDebutAutorisation
           *
           * @return  self
           */ 
          public function setDateDebutAutorisation($dateDebutAutorisation)
          {
                    $this->dateDebutAutorisation = $dateDebutAutorisation;

                    return $this;
          }

          /**
           * Get the value of dateFinAutorisation
           */ 
          public function getDateFinAutorisation()
          {
                    return $this->dateFinAutorisation;
          }

          /**
           * Set the value of dateFinAutorisation
           *
           * @return  self
           */ 
          public function setDateFinAutorisation($dateFinAutorisation)
          {
                    $this->dateFinAutorisation = $dateFinAutorisation;

                    return $this;
          }

          /**
           * Get the value of surface
           */ 
          public function getSurface()
          {
                    return $this->surface;
          }

          /**
           * Set the value of surface
           *
           * @return  self
           */ 
          public function setSurface($surface)
          {
                    $this->surface = $surface;

                    return $this;
          }

          /**
           * Get the value of montant
           */ 
          public function getMontant()
          {
                    return $this->montant;
          }

          /**
           * Set the value of montant
           *
           * @return  self
           */ 
          public function setMontant($montant)
          {
                    $this->montant = $montant;

                    return $this;
          }

          /**
           * Get the value of typeActivite
           */ 
          public function getTypeActivite()
          {
                    return $this->typeActivite;
          }

          /**
           * Set the value of typeActivite
           *
           * @return  self
           */ 
          public function setTypeActivite($typeActivite)
          {
                    $this->typeActivite = $typeActivite;

                    return $this;
          }

          /**
           * Get the value of situationActuelle
           */ 
          public function getSituationActuelle()
          {
                    return $this->situationActuelle;
          }

          /**
           * Set the value of situationActuelle
           *
           * @return  self
           */ 
          public function setSituationActuelle($situationActuelle)
          {
                    $this->situationActuelle = $situationActuelle;

                    return $this;
          }

          /**
           * Get the value of decisionDeDirection
           */ 
          public function getDecisionDeDirection()
          {
                    return $this->decisionDeDirection;
          }

          /**
           * Set the value of decisionDeDirection
           *
           * @return  self
           */ 
          public function setDecisionDeDirection($decisionDeDirection)
          {
                    $this->decisionDeDirection = $decisionDeDirection;

                    return $this;
          }

         /**
          * @return mixed
          */
         public function getDateDecision()
         {
             return $this->dateDecision;
         }

         /**
          * @param mixed $dateDecision
          */
         public function setDateDecision($dateDecision)
         {
             $this->dateDecision = $dateDecision;
         }

         /**
          * @return mixed
          */
         public function getArchive()
         {
             return $this->archive;
         }

         /**
          * @param mixed $archive
          */
         public function setArchive($archive)
         {
             $this->archive = $archive;
         }
          
     }
?>