<?php

namespace App;

use App\Http\Controllers\InterventionController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDOException;

class Intervention extends Model
{
    //Recuperation de la Liste des Interventions Enregistrer.
    public static function getAllIntervention()
    {
        try {
            $sql=DB::table('interventions')->get();
            return $sql;
            //Fermeture et initialisation du curseur
            $sql->closeCursor();
            $sql=null;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //Modification du champs Nom du responsable dans la BDD
    static public function UpdateResponsable($idResp,$NomResp){
        $stm=DB::table('responsables')->where('idResponsable', $idResp)->update(['Nom' => $NomResp]);
        $stm=null;
    }

    //Modification des informations de l'engin utiliser lors de l'intervention dans BDD
    static public function UpdateEnginIntervention($idIntervention,$Nom_Engin,$Date_Heur_Depart,$Date_Heure_Arriver,$Date_Heure_Retour){
        $Engin = Intervention::FindInterventionEgins($idIntervention);
        //dd($Engin);
        $stmt=DB::table('engins')->where('idEngins', $Engin[0]->Engins_idEngins)
        ->update(['Nom_Engin' => $Nom_Engin,
                  'Date_Heur_Depart'=>$Date_Heur_Depart,
                  'Date_Heure_Arriver'=>$Date_Heure_Arriver,
                  'Date_Heure_Retour'=>$Date_Heure_Retour]
        );
        //$stmt=DB::connect()->prepare('INSERT INTO engins(Nom_Engin, Date_Heur_Depart, Date_Heure_Arriver, Date_Heure_Retour) VALUES ("'.$Nom_Engin.'","'.$Date_Heur_Depart.'","'.$Date_Heure_Arriver.'","'.$Date_Heure_Retour.'")');
        //$stmt->execute();
        //Fermeture et initialisation du curseur
        //$stmt->closeCursor();
        $stmt=null;
    }

    //Insertion des informations de l'intervention dans la BDD
    static public function UpdateIntervention($idResponsable,$Commune,$Adresse,$Type_interv,$Date_Heure_Debut,$Date_Heure_Fin,$Important,$Opm){
        $stmt=DB::table('interventions')->where('Numero_Intervention', $idResponsable)
        ->update([
            'Commune' => $Commune,
            'Adresse'=>$Adresse,
            'Type_interv'=>$Type_interv,
            'Opm'=>$Opm,
            'Important'=>$Important,
            'Date_Heure_Debut'=>$Date_Heure_Debut,
            'Date_Heure_Fin'=>$Date_Heure_Fin,]
        );
        //Fermeture et initialisation du curseur
        $stmt=null;
    }
    //Update des personnels qui ont participer lors d'une intervention
    static public function UpdatePersonel($idInte,$nom){
        $Responsable=DB::table('interventions')->select('Responsable_idResponsable')->where('Numero_Intervention',$idInte)->get();
        //Insertion d'un nouveau responsable
        $stmt=DB::table('personnels')->insert([
            'Nom' => $nom,
            'Responsable_idResponsable'=>$Responsable[0]->Responsable_idResponsable]
        );

        //Recuperation de l'ID  de l'engins qui a participer a l'intervention
        $LastLine2=DB::table('interventions_engins')->select('Engins_idEngins')->where('Intervention_Numero_Intervention',$idInte)->get();
        //Recuperation du dernier personnels creer
        $LastLine3=DB::table('personnels')->latest('idPersonnel')->first();

        //Insertion de la liaison entre les table Engins, Interventions et Personnels
        $Final=DB::table('engins_personnels')->insert([
            'Engins_idEngins' => $LastLine2[0]->Engins_idEngins,
            'Personnel_idPersonnel'=>$LastLine3->idPersonnel,
            'Intervention_Numero_intervention'=>$idInte]
        );

        //Initialisation des curseur
        $Responsable=null;
        $stmt=null;
        $LastLine2=null;
        $LastLine3=null;

    }

    //Insertion du responsable dans la BDD
    static public function AddResponsable($Resp){
        $stm=DB::table('responsables')->insert(['Nom' => session('P_NOM'),'P_CODE' =>session('P_CODE')]);

        //Fermeture et initialisation du curseur
        //$stm->closeCursor();
        $stm=null;
    }

    //Insertion des informations de l'engin utiliser lors de l'intervention dans BDD
    static public function AddEnginIntervention($Nom_Engin,$Date_Heur_Depart,$Date_Heure_Arriver,$Date_Heure_Retour){
        $stmt=DB::table('engins')->insert([
            'Nom_Engin' => $Nom_Engin,
            'Date_Heur_Depart'=>$Date_Heur_Depart,
            'Date_Heure_Arriver'=>$Date_Heure_Arriver,
            'Date_Heure_Retour'=>$Date_Heure_Retour]
        );
        //$stmt=DB::connect()->prepare('INSERT INTO engins(Nom_Engin, Date_Heur_Depart, Date_Heure_Arriver, Date_Heure_Retour) VALUES ("'.$Nom_Engin.'","'.$Date_Heur_Depart.'","'.$Date_Heure_Arriver.'","'.$Date_Heure_Retour.'")');
        //$stmt->execute();
        //Fermeture et initialisation du curseur
        //$stmt->closeCursor();
        $stmt=null;
    }

    static public function AddPersonnel($Personnel){
        //$LastLine=DB::connect()->prepare('SELECT idResponsable from Responsable order by idResponsable DESC LIMIT 1');
        $LastLine=DB::table('responsables')->select("responsables.*")->where('P_CODE',session('P_CODE'))->first();

        $stmt=DB::table('personnels')->insert([
            'Nom' => $Personnel,
            'Responsable_idResponsable'=>$LastLine->idResponsable]
        );
        //die(var_dump($stmt));
        $LastLine=null;
        $stmt=null;

        $LastLine1=DB::table('interventions')->latest('Numero_Intervention')->first();
        $LastLine2=DB::table('engins')->latest('idEngins')->first();
        $LastLine3=DB::table('personnels')->latest('idPersonnel')->first();

        //Insertion des information de la table intervention dans la BDD
        $Final=DB::table('engins_personnels')->insert([
            'Engins_idEngins' => $LastLine2->idEngins,
            'Personnel_idPersonnel'=>$LastLine3->idPersonnel,
            'Intervention_Numero_intervention'=>$LastLine1->Numero_Intervention]
        );

        //Fermeture et initialisation du curseur
        $LastLine1=null;
        $LastLine2=null;
        $LastLine3=null;
        $Final=null;

    }

    //Insertion des informations de l'intervention dans la BDD
    static public function AddIntervention($Commune,$Adresse,$Type_interv,$Date_Heure_Debut,$Date_Heure_Fin,$Important,$Opm){
        //Recuperer la dernier ligne de la table engins sauvegarder dans la BDD

        $LastLine=DB::table('engins')->latest('idEngins')->first();

        $Last=DB::table('responsables')->select("responsables.*")->where('P_CODE',session('P_CODE'))->first();
        //Insertion des information de la table intervention dans la BDD
        $stmt=DB::table('interventions')->insert([
            'Commune' => $Commune,
            'Adresse'=>$Adresse,
            'Type_interv'=>$Type_interv,
            'Opm'=>$Opm,
            'Important'=>$Important,
            'Date_Heure_Debut'=>$Date_Heure_Debut,
            'Date_Heure_Fin'=>$Date_Heure_Fin,
            'Responsable_idResponsable'=>$Last->idResponsable]
        );

        //Fermeture et initialisation du curseur
        //$stmt->closeCursor();
        $stmt=null;

        //Recuperation de la dernier ligne sauvegarder de la table interventions
        $LastLine1=DB::table('interventions')->latest('Numero_Intervention')->first();

        //Insertion des informations concernant les cles primaire des tables engins et intervention pour faire la liaison.
        $stmt1=DB::table('interventions_engins')->insert([
            'Intervention_Numero_Intervention' => $LastLine1->Numero_Intervention,
            'Engins_idEngins'=>$LastLine->idEngins]
        );

        //Fermeture et initialisation du curseur
        $stmt1=null;
        //Fermeture et initialisation du curseur
        $LastLine=null;
        //Fermeture et initialisation du curseur
        $LastLine1=null;
    }

    //Recherche d'une intervention dans la BDD
    static public function FindIntervention($id){
        $stmt=DB::table('interventions')->where('Numero_Intervention',$id)->get();
        return $stmt;
    }

    //Rechercher l'engin utiliser lors d'une intervention
    static public function FindInterventionEgins($id){
        $stmt=DB::table('interventions_engins')->select()->where('Intervention_Numero_Intervention',$id)->get();
        return $stmt;
    }

    //Rechercher les infos de l'engin utiliser lors d'une intervention
    static public function FindEginsUsed($id){
        $stmt=Intervention::FindInterventionEgins($id);
        foreach($stmt as $stm){
            $stmt1=DB::table('engins')->select()->where('idEngins',$stm->Engins_idEngins)->get();
        }
        //dd($stmt1);
        return $stmt1;
    }

    //Rechercher les infos de l'engin utiliser lors d'une intervention
    static public function FindResponsableIntervention($idResponsable){
        $stmt1=DB::table('responsables')->select()->where('idResponsable',$idResponsable)->get();
        return $stmt1;
    }

    //supprimer un engin de la BDD
    static public function DeleteEngin($id){
        DB::table('engins')->where('idEngins',$id)->delete();
    }

    //supprimer les liaison entre des engins utiliser lors de l'intervention de la BDD
    static public function DeleteEnginsInterventions($idIntervention,$idEngin){
        DB::table('interventions_engins')->where(['Intervention_Numero_Intervention' => $idIntervention,
                                                  'Engins_idEngins'=> $idEngin])->delete();
    }

    //suppression des Personnels qui ont participer a l'intervention de la BDD
    static public function DeleteInterventionPersonnels($idRespensable){
        DB::table('personnels')->where('Responsable_idResponsable' , $idRespensable)->delete();
    }

    //supprimer du Responsable de l'intervention de la BDD
    static public function DeleteInterventionResponsable($idRespensable){
        DB::table('responsables')->where('idResponsable' , $idRespensable)->delete();
    }

    //supprimer des informations de l'intervention de la BDD
    static public function DeleteInterventionTable($id){
        DB::table('interventions')->where('Numero_Intervention' , $id)->delete();
    }

    //supprimer les liaison entre les engins et les personnels qui ont participer a l'intervention de la BDD
    static public function DeleteEnginsPersonnels($idIntervention){
        DB::table('engins_personnels')->where('Intervention_Numero_intervention' , $idIntervention)->delete();
    }

    //Suppression des personnels
    static public function DeletePersonnels($idInte){
        $Responsable=DB::table('interventions')->select('Responsable_idResponsable')->where('Numero_Intervention',$idInte)->get();
        DB::table('personnels')->where('Responsable_idResponsable' , $Responsable[0]->Responsable_idResponsable)->delete();
    }

    //Suppression de l'intervention de la BDD
    static public function DeleteIntervention($id){
        $Intervention=Intervention::FindIntervention($id);
        //dd($Intervention[0]->Numero_Intervention);
        $UseEngins=Intervention::FindInterventionEgins($Intervention[0]->Numero_Intervention);
        foreach($UseEngins as $UseEngin){
            Intervention::DeleteEngin($UseEngin->Engins_idEngins);
            Intervention::DeleteEnginsInterventions($Intervention[0]->Numero_Intervention,$UseEngin->Engins_idEngins);
        }
        $EnginsPersonnels=Intervention::DeleteEnginsPersonnels($Intervention[0]->Numero_Intervention);
        $Personnel=Intervention::DeleteInterventionPersonnels($Intervention[0]->Responsable_idResponsable);
        $Responsable=Intervention::DeleteInterventionResponsable($Intervention[0]->Responsable_idResponsable);
        $InterTable=Intervention::DeleteInterventionTable($Intervention[0]->Numero_Intervention);
    }

    //Rechercher d'une intervention dans les archive via le Numero d'Intervention
    static public function SearchArchiveByNumInter($Numero_Intervention){
        $stmt1=DB::table('interventions')->select()->where('Numero_Intervention',$Numero_Intervention)->get();
        return $stmt1;
    }

    //Rechercher de tout les interventions dans les archive qui ont le meme Type d'Intervention
    static public function SearchArchiveByTypeInter($Type_interv){
        $stmt1=DB::table('interventions')->select()->where('Type_interv',$Type_interv)->get();
        return $stmt1;
    }

    //Rechercher de tout les interventions dans les archives qui ont le meme Engin Utiliser
    static public function SearchArchiveByEngin($Nom_Engin){
        $liste=array();
        $stmt1=DB::table('engins')->select()->where('Nom_Engin',$Nom_Engin)->get();
        //dd($stmt1[1]);
        $i=0;
        while(isset($stmt1[$i])){
            $stmt2=DB::table('interventions_engins')->select()->where('Engins_idEngins',$stmt1[$i]->idEngins)->get();
            $stmt3=DB::table('interventions')->select()->where('Numero_Intervention',$stmt2[0]->Intervention_Numero_Intervention)->get();
            $liste[$i]=$stmt3;
            $i++;
        }
        return $liste;

   }

    //Rechercher de tout les interventions dans les archives par leurs Commune
      static public function SearchArchiveByCommune($Commune){
        $stmt1=DB::table('interventions')->select()->where('Commune',$Commune)->get();
        return $stmt1;
    }


}
