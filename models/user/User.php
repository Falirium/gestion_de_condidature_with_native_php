<?php 

     class User {

          // attributs
          private $e_nom;
          private $e_prenom;
          private $e_cin;
          private $e_key;


          

          /**
           * Get the value of e_nom
           */ 
          public function getE_nom()
          {
                    return $this->e_nom;
          }

          /**
           * Set the value of e_nom
           *
           * @return  self
           */ 
          public function setE_nom($e_nom)
          {
                    $this->e_nom = $e_nom;

                    return $this;
          }

          /**
           * Get the value of e_prenom
           */ 
          public function getE_prenom()
          {
                    return $this->e_prenom;
          }

          /**
           * Set the value of e_prenom
           *
           * @return  self
           */ 
          public function setE_prenom($e_prenom)
          {
                    $this->e_prenom = $e_prenom;

                    return $this;
          }

          /**
           * Get the value of e_cin
           */ 
          public function getE_cin()
          {
                    return $this->e_cin;
          }

          /**
           * Set the value of e_cin
           *
           * @return  self
           */ 
          public function setE_cin($e_cin)
          {
                    $this->e_cin = $e_cin;

                    return $this;
          }

          /**
           * Get the value of e_key
           */ 
          public function getE_key()
          {
                    return $this->e_key;
          }

          /**
           * Set the value of e_key
           *
           * @return  self
           */ 
          public function setE_key($e_key)
          {
                    $this->e_key = $e_key;

                    return $this;
          }
     }

?>