<?php

namespace App\Http\Controllers;

use App\Intervention;
use Facade\FlareClient\View;
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
    public static function addInterventionEngins(Request $request){
        //dd($request->all());
        $i=1;
        global $TableIntervention;
        global $TableEngin;
        global $Pompier;
        //die(var_dump($_POST));
        if(isset($_POST['submit'])){
            //if(empty($TableIntervention)){
                $TableIntervention = array(
                    'Commune' => $request->input('Commune'),
                    'Adresse' => $request->input('Adresse'),
                    'Type_interv' => $request->input('Type_interv'),
                    'Date_Heure_Debut' => $request->input('Date_Heure_Debut'),
                    'Date_Heure_Fin' => $request->input('Date_Heure_Fin'),
                    'Important' => $request->input('Important'),
                    'Opm' => $request->input('Opm'),
                );   
                if(is_null($TableIntervention['Important'])){
                    $TableIntervention['Important']="off";
                }
                if(!isset($TableIntervention['Opm'])){
                    $TableIntervention['Opm']="off";
                }
                //dd($TableIntervention);          
            //}else{
                $TableEngin = array(
                    'Nom_Engin' => $request->input('Nom_Engin'),
                    'Date_Heur_Depart' => $request->input('Date_Heur_Depart'),
                    'Date_Heure_Arriver' => $request->input('Date_Heure_Arriver'),
                    'Date_Heure_Retour' => $request->input('Date_Heure_Retour'),
                );
                //dd($TableEngin);          
                //Sauvegarde d'un responsable dans la BDD
                $InserResp = Intervention::AddResponsable($request->input('Nom'));
                //Sauvegarde des informations de l'engin utiliser lors de l'intervention
                $InserEngins = Intervention::AddEnginIntervention($TableEngin['Nom_Engin'],$TableEngin['Date_Heur_Depart'],$TableEngin['Date_Heure_Arriver'],$TableEngin['Date_Heure_Retour']);
                $InserInterv = Intervention::AddIntervention($TableIntervention['Commune'],$TableIntervention['Adresse'],$TableIntervention['Type_interv'],$TableIntervention['Date_Heure_Debut'],$TableIntervention['Date_Heure_Fin'],$TableIntervention['Important'],$TableIntervention['Opm']);
                
                $test=true;
                while ($test){
                    $tmp=$request->input('Role'.$i);
                    //dd($tmp);
                    if(isset($tmp)){
                        $InserPersonnel = Intervention::AddPersonnel($request->input('Role'.$i));   
                        $i++;
                    }else{
                        $test=false;
                    }
                }
        }
        return InterventionController::listeAllInterventions();
    }

    //suppression d'une intervention 
    public static function deleteInterventionEngins($request){
        Intervention::DeleteIntervention($request);
        return InterventionController::listeAllInterventions();
    } 

    //Modification des information d'une intervention
    static public function ShowDataIntervention($id){
        
        return view('UpdateIntervention');
    }

    //Modification des information d'une intervention
    static public function UpdateInterventionEngins(Request $request){
    
    }
}
