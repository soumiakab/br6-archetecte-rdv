<?php

class Utilisateur{
    private  $reference;
    private  $nom;
    private  $prenom;
    private  $age;
    private  $email;
    private  $tel;

    public function setReference($reference){
        $this->reference = $reference;
    }

    public function setNom($nom){
        $this->nom = $nom;
     }

     public function setAge($age){
        $this->age = $age;
     }

     public function setPrenom($prenom){
        $this->prenom = $prenom;
     }

     public function setEmail($email){
        $this->email = $email;
     }

     public function setTel($tel){
        $this->tel = $tel;
     }

     public function count(){

        $qr='select count(*) as nb from utilisateur';
        $res=DB::connect()->query($qr)->fetch(PDO::FETCH_ASSOC);
        return $res;
     }


     public function ajouterU()
    {
        $qr='insert into utilisateur (reference, nom, prenom, age, email,tel) values("'.$this->reference.'","'.$this->nom.'","'.$this->prenom.'",'.$this->age.',"'.$this->email.'","'.$this->tel.'")';
        // die($qr);
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no';
        }
    }
    public function editUtil()
    {
        $qr='Select * from utilisateur where reference="'.$this->reference.'"';
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
        return $row;
        
       }
       else{
        return array("message"=>"la reference entrer est invalid");
       }
        
           $res->close();
           $res=null;
      
    }

}

?>