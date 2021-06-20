<?php

class RdvController{

    // public function index()
    // {
    //     header("location:http://localhost/br6-rdv/Api/rdv/afficherRdv");   
    //  }

    public function ajouterRdv()
    {
        // if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $data = json_decode(file_get_contents("php://input"));
        $rdv=new Rdv();
        // var_dump($data);
        // die($data->date);
        $rdv->setDate($data->date);
        $rdv->setHoraire($data->horaire);
        $rdv->setTypeCons($data->typeCons);
        $rdv->setReference($data->reference);
        $s=$rdv->ajouterRdv();
                
        // }
    }

    public function afficherRdv($ref)
    { 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

         if($_SERVER['REQUEST_METHOD']=='GET'){
        
        $rdv=new Rdv();
        $tab=$rdv->afficherRdv($ref);
        echo json_encode($tab);
         }
    }
    public function afficherHr($date)
    { 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

         if($_SERVER['REQUEST_METHOD']=='GET'){
        
            $rdv=new Rdv();
            $tab=$rdv->afficherHr($date);
            echo json_encode($tab);
         }
    }
    public function modifierRdv($id)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: PUT');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $data = json_decode(file_get_contents("php://input"));
        $rdv=new Rdv();
        $rdv->setId($data->id); 
        $rdv->setDate($data->date);
        $rdv->setHoraire($data->horaire);
        $rdv->setTypeCons($data->typeCons);
        $s=$rdv->modifierRdv();
        echo "done";
        // }
        
    }

    public function supprimerRdv($id)
    { 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
      
        $rdv=new Rdv();
        $rdv->setId($id);
        $rdv->supprimerRdv();
        
        
    }

    public function getoneRdv($id)
    {  
        // if($_SERVER['REQUEST_METHOD']=='GET'){
            
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: GET');
      
        $rdv=new Rdv();
        $rdv->setId($id); 
        $rdvs=$rdv->editRdv();
        echo json_encode($rdvs);

        // }
    }


    
}



?>