<?php

namespace App\Http\Controllers;

use App\Intervention;
use resources\listeInterventions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InterventionController extends Controller
{
    //Recuperation de la liste de tout les engins de l'Ebrigade "l'usage de l'API"
    public static function getAllEngins(){
        $Type_Inter=Http::get('http://localhost:8002/Engins');
        //$Type_Inter = file_get_contents("http://localhost/api/utilisateurs.php?c=engin&m=getAll");
        $type = json_decode($Type_Inter,true);
        return $type;
    }

    //Recuperation des Roles associers a un engin "l'usage de l'API"
    public static function getRolebyEngins($TV){
        
        //die($TV."test0");
        $Role=Http::get('http://localhost:8002/NamesRolesEngin/'.$TV);
        //die($Role);

        //$RoleEngin = file_get_contents("http://localhost/api/utilisateurs.php?c=Engin&m=getRolesEngin&P_CODE=".$TV);       
        $type=json_decode($Role,true);
        return $type;
    }

    //Recuperation de la liste de tout les types d'intervention "l'usage de l'API"
    public static function getAllType()
    {
        $Type_Inter=Http::get('http://localhost:8002/TypeInterventions');
        //$Type_Inter = file_get_contents("http://localhost/api/utilisateurs.php?c=typeintervention&m=getAll");
        $type = json_decode($Type_Inter,true);
        return $type;
    }

    //Affichage de la liste des interventions sauvegarger sur la BDD
    public static function listeAllInterventions()
    {
        //$interventionM = new interventionsModel();
        //if(self::ispersonnel($_SESSION['username']))
            //$listeIntervention =  $interventionM->getallbyLogin2();
        //else
            $InterventionAll = Intervention::getAllIntervention();
            return view('ListeInterventions',['Interventions' => $InterventionAll]);
    }

    //Ajout d'une intervention et la sauvegarder sur la BDD
    public static function addInterventionEngins(){
        $i=1;
        global $TableIntervention;
        global $TableEngin;
        global $Pompier;
        //die(var_dump($_POST));
        if(isset($_POST['submit'])){
            if(is_null($_POST['Important'])){
                $_POST['Important']="off";
            }
            if(!isset($_POST['Opm'])){
                $_POST['Opm']="off";
            }
            //if(empty($TableIntervention)){
                $TableIntervention = array(
                    'Commune' => $_POST['Commune'],
                    'Adresse' => $_POST['Adresse'],
                    'Type_interv' => $_POST['Type_interv'],
                    'Date_Heure_Debut' => $_POST['Date_Heure_Debut'],
                    'Date_Heure_Fin' => $_POST['Date_Heure_Fin'],
                    'Important' => $_POST['Important'],
                    'Opm' => $_POST['Opm'],
                );             
            //}else{
                $TableEngin = array(
                    'Nom_Engin' => $_POST['Nom_Engin'],
                    'Date_Heur_Depart' => $_POST['Date_Heur_Depart'],
                    'Date_Heure_Arriver' => $_POST['Date_Heure_Arriver'],
                    'Date_Heure_Retour' => $_POST['Date_Heure_Retour'],
                );
                //Sauvegarde d'un responsable dans la BDD
                $InserResp = Intervention::AddResponsable($_POST['Nom']);
                //Sauvegarde des informations de l'engin utiliser lors de l'intervention
                $InserEngins = Intervention::AddEnginIntervention($TableEngin['Nom_Engin'],$TableEngin['Date_Heur_Depart'],$TableEngin['Date_Heure_Arriver'],$TableEngin['Date_Heure_Retour']);
                $InserInterv = Intervention::AddIntervention($TableIntervention['Commune'],$TableIntervention['Adresse'],$TableIntervention['Type_interv'],$TableIntervention['Date_Heure_Debut'],$TableIntervention['Date_Heure_Fin'],$TableIntervention['Important'],$TableIntervention['Opm']);
                

                while (isset($_POST['Role'.$i])){
                    //die(var_dump($_POST['Role'.$i]));
                    $InserPersonnel = Intervention::AddPersonnel($_POST['Role'.$i]);
                    $i++; 
                }
        }
    }
}
