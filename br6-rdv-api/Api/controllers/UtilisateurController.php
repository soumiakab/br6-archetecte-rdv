<?php

class UtilisateurController{
    public function ajouterUtil()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $data = json_decode(file_get_contents("php://input"));
        $util=new Utilisateur();
        $ref=$this->nbru($data->nom);
        $util->setReference($ref);
        $util->setNom($data->nom);
        $util->setAge($data->age);
        $util->setPrenom($data->prenom);
        $util->setEmail($data->email);
        $util->setTel($data->tel);
        $util->ajouterU();
        $tab=array("reference"=>$ref);
        echo json_encode($tab);
    }


    public function nbru($nom){
        $util=new Utilisateur();
        $nb=$util->count();
        $ran=rand();
        return $nom.$nb['nb'].$ran;
    }

    public function getone($ref){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: GET');
        $util=new Utilisateur();
        $util->setReference($ref);
        $u=$util->editUtil();
        echo json_encode($u);
       
    }
    
}



?>