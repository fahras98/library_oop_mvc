<?php

class UserModel {

    private $database;
    public function __construct()
    {
        //creer un objet d'une class en utulisant "new"
        $this->database = new Database; //objet

    }

    public function getUser()
    {
        //preparation de la query
        $this->database->query("SELECT * FROM `books` ");
        //execution de la query / fetch all 
        $result = $this->database->resultSet();
        return $result;
      
    }

    public function addUser($data)
    {
        //preparation de la query
        // :placeholders
        $this->database->query("INSERT INTO `books`(`titre`, `auteur`, `categorie`, `resume`) VALUES (:titre,:auteur,:categorie,:resume)");
       
        //saniteser contre sql injection
        $this->database->bind(':titre', $data['titre']);
        $this->database->bind(':auteur', $data['auteur']);
        $this->database->bind(':categorie', $data['catégorie']);
        $this->database->bind(':resume', $data['résumé']);

      
        //execution
      
        if ($this->database->execute()){
            return true;
        }
        else {
            return false;
        }

    }

    public function getContactById($id)
    {
        $this->database->query('SELECT * FROM `books` WHERE id = :id');
        $this->database->bind(':id' , $id);

        $row = $this->database->single();

        return $row;
 
    }

    public function getPostbyId($id){
        $this->database->query("SELECT * FROM `books` WHERE id = :id");
        $this->database->bind(':id',$id);
  
        $results = $this->database->single();
  
        return $results;
      }


      public function updatePost($params)
      {
        $this->database->query("UPDATE books  SET titre= :titre, auteur= :auteur, date= :date , catégorie= :catégorie , résumé= :résumé WHERE id= :id");
        $this->database->bind(':titre', $params['titre']);
        $this->database->bind(':auteur',$params['auteur']);
        $this->database->bind(':date',$params['date']);
        $this->database->bind(':catégorie',$params['catégorie']);
        $this->database->bind(':résumé',$params['résumé']);


        $this->database->bind(':id',$params['id']);
        $params=$this->database->execute();
        if($this->database->execute()){
            return true;
          } else {
            return false;
          }
  
      }

     // <--// delete//-->

     public function deleteUser($data)
     {
         $this->database->query('DELETE FROM books WHERE id = :id');
         $this->database->bind(':id', $data['id']);
 
 
         $row = $this->database->single();
 
         return $row;
 
     }

    


     public function login($email, $password)
     {
         $this->database->query('SELECT * FROM admin WHERE email = :email');
         $this->database->bind(':email', $email);
 
         $row = $this->database->single();
 
         $hashed_password = $row->password;
         
         if ($password == $hashed_password) {
             return $row;
         } else {
             return false;
         }
     }
 
     // Find user by email
     public function findUserByEmail($email)
     {
         $this->database->query('SELECT * FROM admin WHERE email = :email');
         // Bind value
         $this->database->bind(':email', $email);
         
       
         $row = $this->database->single();
 
         // Check row
         if ($this->database->rowCount() > 0) {
             return true;
         } else {
             return false;
         }
     }
}

