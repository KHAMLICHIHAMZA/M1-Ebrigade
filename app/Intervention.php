<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDOException;

class Intervention extends Model
{
    //Recuperation de la Liste des Interventions Enregistrer.
    public static function getAllIntervention(){
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

    //Insertion du responsable dans la BDD
    static public function AddResponsable($Resp){
        $stmt=DB::table('responsables')->insert(['Nom' => $Resp]);
        //Fermeture et initialisation du curseur
        $stmt->closeCursor();
        $stmt=null;      
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
        $stmt->closeCursor();
        $stmt=null;
    }

    //Sauvegarde de l'intervention
    static public function AddIntervention($Commune,$Adresse,$Type_interv,$Date_Heure_Debut,$Date_Heure_Fin,$Important,$Opm){
        //$LastLine=DB::connect()->prepare('SELECT idEngins from engins order by idEngins DESC LIMIT 1');
        //Recuperer la dernier ligne de la table engins sauvegarder dans la BDD 
        $LastLine=DB::table('engins')->select('idEngins')->order_by('idEngins', 'desc')->first();
        
        //$stmt=DB::connect()->prepare('INSERT INTO intervention (Commune, Adresse, Type_interv, Opm, Important, Date_Heure_Debut, Date_Heure_Fin, Responsable_idResponsable) VALUES ("'.$Commune.'","'.$Adresse.'","'.$Type_interv.'","'.$Opm.'","'.$Important.'","'.$Date_Heure_Debut.'","'.$Date_Heure_Fin.'","'.$data['idEngins'].'")');
        //Insertion des information de la table intervention dans la BDD
        $stmt=DB::table('intervention')->insert([
            'Commune' => $Commune,
            'Adresse'=>$Adresse,
            'Type_interv'=>$Type_interv,
            'Opm'=>$Opm,
            'Important'=>$Important,
            'Date_Heure_Debut'=>$Date_Heure_Debut,
            'Date_Heure_Fin'=>$Date_Heure_Fin,
            'Responsable_idResponsable'=>$LastLine['idEngins']]
        );
        
        //Fermeture et initialisation du curseur
        $stmt->closeCursor();
        $stmt=null;
        
        //$LastLine1=DB::connect()->prepare('SELECT Numero_Intervention from intervention order by Numero_Intervention DESC LIMIT 1');;
        //Recuperation de la dernier ligne sauvegarder de la table interventions 
        $LastLine1=DB::table('interventions')->select('Numero_Intervention')->order_by('Numero_Intervention', 'desc')->first();
        
        //$stmt1=DB::connect()->prepare('INSERT INTO intervention_engins (Intervention_Numero_Intervention, Engins_idEngins) VALUES ("'.$data1['Numero_Intervention'].'","'.$data2['idEngins'].'")');
        //Insertion des informations concernant les cles primaire des tables engins et intervention pour faire la liaison.
        $stmt1=DB::table('interventions_engins')->insert([
            'Intervention_Numero_Intervention' => $LastLine1['Numero_Intervention'],
            'Engins_idEngins'=>$LastLine['idEngins']]
        );
        
        //Fermeture et initialisation du curseur
        $stmt1->closeCursor();
        $stmt1=null;
        //Fermeture et initialisation du curseur
        $LastLine->closeCursor();
        $LastLine=null;
        //Fermeture et initialisation du curseur
        $LastLine1->closeCursor();
        $LastLine1=null;
        
    }
}
