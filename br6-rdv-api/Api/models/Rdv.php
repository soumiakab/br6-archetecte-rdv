<?php

class Rdv{
    private  $id;
    private  $date;
    private  $horaire;
    // type de consultation
    private  $typeCons;
    private  $reference;

    public function setId($id){
        $this->id = $id;
    }

    public function setDate($date){
        $this->date = $date;
     }

     public function setTypeCons($typeCons){
        $this->typeCons = $typeCons;
     }

     public function setHoraire($horaire){
        $this->horaire = $horaire;
     }

     public function setReference($reference){
        $this->reference = $reference;
     }

     public function ajouterRdv()
    {
        $qr='insert into rendezvous (date,horaire,typeCons,reference) values("'.$this->date.'","'.$this->horaire.'","'.$this->typeCons.'","'.$this->reference.'")';
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no';
        }

    }

     public function afficherRdv($ref)
    {
        $qr='select * from rendezvous where reference="'.$ref.'" order by id DESC' ;
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
            $res->close();
            $res=null;
        // else{
            return 'no';
        // }
    }
    public function afficherHr($date)
    {
        $qr='select horaire from rendezvous where date="'.$date.'"' ;
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll(PDO::FETCH_COLUMN);
            $res->close();
            $res=null;
        // else{
            return [];
        // }
    }

    // public function afficherSome($data)
    // {
    //     if(empty($data)){
    //         $data[0]=0;
    //     }
    //     $qr="select * from salle where id in (".implode(',',$data).")";
    //     $res=DB::connect()->query($qr);
    //     if($row=$res->fetchAll(PDO::FETCH_ASSOC)){
    //         return $row;
    //     }
    //     else{
    //         return $row=[];
    //     }
    //     $res=null;

    // }

     public function modifierRdv()
    {
     
        $qr="UPDATE rendezvous SET date='$this->date',horaire='$this->horaire',typeCons='$this->typeCons' WHERE id=".(int)$this->id;
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }

    public function editRdv()
    {
        $qr='Select * from rendezvous where id='.(int)$this->id;
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
       
        return $row;
        
       }
       else{
        return array("message"=>"pas de rendez-vous avec cette cle");
       }
        
           $res->close();
           $res=null;
      
    }


     public function supprimerRdv()
    {
            $qr="delete from rendezvous where id=".(int)$this->id;
            $res=DB::connect()->query($qr);
    }


}



?>