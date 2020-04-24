<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Intervention;
use Facade\FlareClient\View;
use resources\listeInterventions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InterventionController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    //Recuperation de la liste de tout les engins de l'Ebrigade "l'usage de l'API"
    public static function getAllEngins(){
        $Type_Inter=Http::get('http://localhost:8002/Engins');
        //$Type_Inter = file_get_contents("http://localhost/api/utilisateurs.php?c=engin&m=getAll");
        $type = json_decode($Type_Inter,true);
        return $type;
    }

    //Recuperation des Roles associers a un engin "l'usage de l'API"
    public static function getRolebyEngins($TV)
    {

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

    public static function getbyinterventionid($id)
    {
        $interventions=DB::table('interventions')->where('Numero_Intervention',$id)->select('interventions.*')->first();
        return  $interventions;
    }

    public static function getrapportbyInterventionNum($id){

        $interventions=DB::table('rapports')->where('Numero_intervention',$id)->select('rapports.*')->get();
        return $interventions;
    }

    public static  function getenginbyinterventionID($id)

    {

    $engins = DB::table('interventions')
    ->join('interventions_engins', 'interventions.Numero_Intervention', '=', 'interventions_engins.Intervention_Numero_Intervention')
    ->join('engins', 'engins.idEngins', '=', 'interventions_engins.Engins_idEngins')
    ->where('interventions.Numero_Intervention',$id)
    ->select('engins.*')
    ->get();

    return $engins;

    }


    public  static function getpersonnelbyenginID($id,$interventionid)
    {

    $personnels = DB::table('engins_personnels')
    ->join('engins', 'engins.idEngins', '=', 'engins_personnels.Engins_idEngins')
    ->join('personnels', 'engins_personnels.Personnel_idPersonnel', '=', 'personnels.idPersonnel')
    ->where('engins.idEngins',$id)
    ->where('engins_personnels.Intervention_Numero_intervention',$interventionid)
    ->select('personnels.*')
    ->get();

return $personnels;

        }

    //Modification des information d'une intervention
    static public function DetailsIntervention($id){
        $tableauxData=array();
        $Intervention= Intervention::FindIntervention($id);
        $Responsable = Intervention::FindResponsableIntervention($Intervention[0]->Responsable_idResponsable);
        $Engins = Intervention::FindEginsUsed($id);
        array_push($tableauxData,$Intervention,$Responsable,$Engins);
        //dd($tableauxData);
        return view('DetailsIntervention',['Interventions' => $tableauxData]);
    }

    //Modification des information d'une intervention
    static public function ShowDataIntervention($id){
        $tableauxData=array();
        $Intervention= Intervention::FindIntervention($id);
        $Responsable = Intervention::FindResponsableIntervention($Intervention[0]->Responsable_idResponsable);
        $Engins = Intervention::FindEginsUsed($id);
        array_push($tableauxData,$Intervention,$Responsable,$Engins);
        //dd($tableauxData);
        return view('UpdateIntervention',['Interventions' => $tableauxData]);
    }

    //Modification des information d'une intervention
    static public function UpdateInterventionEngins(Request $request){
        //dd($request);
        $i=1;
        global $TableIntervention;
        global $TableEngin;
        global $Pompier;
        //die(var_dump($_POST));
        if(isset($request->submit)){
            //if(empty($TableIntervention)){
                if(isset($request->Important)){
                    $Important="on";
                }else{$Important="off";}
                if(isset($request->Opm)){
                    $Opm="on";
                }else{ $Opm="off"; }

                $TableIntervention = array(
                    'Numero_Intervention' => $request->input('Numero_Intervention'),
                    'Commune' => $request->input('Commune'),
                    'Adresse' => $request->input('Adresse'),
                    'Type_interv' => $request->input('Type_interv'),
                    'Date_Heure_Debut' => $request->input('Date_Heure_Debut'),
                    'Date_Heure_Fin' => $request->input('Date_Heure_Fin'),
                    'Important' => $Important,
                    'Opm' => $Opm,
                );

                //dd($TableIntervention);
            //}else{
                $TableEngin = array(
                    'Nom_Engin' => $request->input('Nom_Engin'),
                    'Date_Heur_Depart' => $request->input('Date_Heur_Depart'),
                    'Date_Heure_Arriver' => $request->input('Date_Heure_Arriver'),
                    'Date_Heure_Retour' => $request->input('Date_Heure_Retour'),
                );
                //dd($TableEngin);
                //Modification d'un responsable dans la BDD
                // $UpdateResp = Intervention::UpdateResponsable($TableIntervention['Numero_Intervention'],$request->input('Nom'));
                //Modification des informations de l'engin utiliser lors de l'intervention
                $UpdateEngins = Intervention::UpdateEnginIntervention($TableIntervention['Numero_Intervention'],$TableEngin['Nom_Engin'],$TableEngin['Date_Heur_Depart'],$TableEngin['Date_Heure_Arriver'],$TableEngin['Date_Heure_Retour']);
                //Modification des information de l'intervention
                $UpdateInterv = Intervention::UpdateIntervention($TableIntervention['Numero_Intervention'],$TableIntervention['Commune'],$TableIntervention['Adresse'],$TableIntervention['Type_interv'],$TableIntervention['Date_Heure_Debut'],$TableIntervention['Date_Heure_Fin'],$TableIntervention['Important'],$TableIntervention['Opm']);
                //Mise a zero des personnels qui ont participer a l'intervention
                $MiseAJourPers = Intervention::DeletePersonnels($TableIntervention['Numero_Intervention']);
                //Mise a zero de la table qui contient la liaison entre les engins et les personnels
                $MiseAJourEngiPers = Intervention::DeleteEnginsPersonnels($TableIntervention['Numero_Intervention']);
                $test=true;

                while ($test){
                    $tmp=$request->input('Role'.$i);
                    //dd($tmp);
                    if(isset($tmp)){
                        $InserPersonnel = Intervention::UpdatePersonel($TableIntervention['Numero_Intervention'],$request->input('Role'.$i));
                        $i++;
                    }else{
                        $test=false;
                    }
                }
        }
        return InterventionController::listeAllInterventions();
    }

    public static function ispersonnel($P_CODE)
    {

        $personnels = DB::table('personnels')
        ->where('personnels.P_CODE',$P_CODE)
        ->select('personnels.*')
        ->first();
    if($personnels)
    {
    return true;
    }
    else
    {
    return false;
    }

    }
    public static function isresponsable($P_CODE)
    {
        $responsable = DB::table('responsables')
        ->where('responsables.P_CODE',$P_CODE)
        ->select('responsables.*')
        ->first();

        if($responsable)
        {
        return true;
        }
        else
        {
        return false;
        }
    }

    public static function ischefducorp()
    {
        $chefducorp = DB::table('users')
        ->where('users.P_CODE',1234)
        ->select('users.*')
        ->first();

        if($chefducorp)
        {
        return true;
        }
        else
        {
        return false;
        }


    }

     public static function listeIRapportnonrediger()
     {
            $listeIntervention = DB::table('interventions')
            ->leftJoin('rapports','interventions.Numero_Intervention','=','rapports.Numero_intervention')
            ->join('responsables', 'interventions.Responsable_idResponsable', '=', 'responsables.idResponsable')
            ->where('responsables.P_CODE',session('P_CODE'))
            ->whereNull('rapports.Numero_intervention')
            ->select('interventions.*')
            ->get();

   return view('rapports.rapport_en_attente_de_redaction',[
            'interventions' => $listeIntervention,

        ]);

        }

    public static function listeallrapportchef()

    {

        $listeR = DB::table('rapports')
        ->whereNull('rapports.statut')
        ->orWhere('rapports.statut','rejete')
        ->select('rapports.*')
        ->get();

    return view('rapports.rapport_chef',[
    'rapport' => $listeR,

]);



    }
    public static function isresponsabletest($P_CODE)
    {
        $responsable = DB::table('responsables')
        ->where('responsables.P_CODE',$P_CODE)
        ->select('responsables.*')
        ->first();

return $responsable;
    }

    public static function ispersonneltest($P_CODE)
    {

        $personnels = DB::table('personnels')
        ->where('personnels.P_CODE',$P_CODE)
        ->select('personnels.*')
        ->first();
        return $personnels;
    }
    public static function getResponsableIntervention($id)
    {
        $resp = DB::table('responsables')
        ->join('interventions', 'interventions.Responsable_idResponsable', '=', 'responsables.idResponsable')
        ->where('interventions.Numero_Intervention',$id)
        ->select('responsables.*')
        ->first();
        return $resp;

    }


    public static function detailvalidationrapport($id)
    {
        //get Intervention by numero d'intervention
        //
        $intervention =self::getbyinterventionid($id);
        //rapport correspandant a l'intervention
        $rapports = InterventionController::getrapportbyInterventionNum($id);
        if(isset($rapports[0]))
        $rapports = $rapports[0];
        //L'engin utilisé dans l'intervention
        $listeengin=InterventionController::getenginbyinterventionID($id);
        //
        $listepersonnel= InterventionController::getpersonnelbyenginID(1,$id);
        //
        $responsable= InterventionController::getResponsableIntervention($id);

        if(isset($rapports->id_rapport))
        $comment=RapportController::listerapportcommentaire($rapports->id_rapport);
        return view("rapports.validet",[
            'intervention' => $intervention,
            'engins' => $listeengin,
            'idinterventions' => $id,
            'rapport' => $rapports,
            'commentaire' => $comment,
            'responsable' => $responsable,

            ]);

    }
    public static function detailredactionrapport($id)
    {
        //get Intervention by numero d'intervention
        $intervention =self::getbyinterventionid($id);

        //rapport correspandant a l'intervention
        $rapports = InterventionController::getrapportbyInterventionNum($id);
        if(isset($rapports[0]))
        $rapports = $rapports[0];
        //L'engin utilisé dans l'intervention
        $listeengin=InterventionController::getenginbyinterventionID($id);
        //
        $listepersonnel= InterventionController::getpersonnelbyenginID(1,$id);
        //
        $responsable= InterventionController::getResponsableIntervention($id);

        if(isset($rapports->id_rapport))
        $comment=RapportController::listerapportcommentaire($rapports->id_rapport);
        return view("rapports.rediger",[
            'intervention' => $intervention,
            'engins' => $listeengin,
            'idinterventions' => $id,
            'rapport' => $rapports,
            'responsable' => $responsable,
            ]);

    }
    public static function detailintervention($id)
    {
        //get Intervention by numero d'intervention
        $intervention =self::getbyinterventionid($id);
        //rapport correspandant a l'intervention
        $rapports = InterventionController::getrapportbyInterventionNum($id);
        if(isset($rapports[0])){

        $rapports = $rapports[0];
        }
        //L'engin utilisé dans l'intervention
        $listeengin=InterventionController::getenginbyinterventionID($id);
        //
        $listepersonnel= InterventionController::getpersonnelbyenginID(1,$id);
        //
        $responsable= InterventionController::getResponsableIntervention($id);
        //
        if(isset($rapports->id_rapport))
        $comment=RapportController::listerapportcommentaire($rapports->id_rapport);
        return view("rapports.consulterrapport",[
            'intervention' => $intervention,
            'engins' => $listeengin,
            'idinterventions' => $id,
            'rapport' => $rapports,
            'commentaire' => $comment,
            'responsable' => $responsable,


            ]);

    }


    public static function ajoutRapport(Request $request, $id)
    {

        DB::table('rapports')->insert(['contenu' =>$request->input('rapport'), 'Numero_intervention' => $id]);

        return redirect()->route('listeAllrapportresponsable');

    }

    public function detailscorrectionrapport($id)
    {

//get Intervention by numero d'intervention
$intervention =self::getbyinterventionid($id);
//rapport correspandant a l'intervention
$rapports = InterventionController::getrapportbyInterventionNum($id);
if(isset($rapports[0])){

$rapports = $rapports[0];
}
//L'engin utilisé dans l'intervention
$listeengin=InterventionController::getenginbyinterventionID($id);
//
$listepersonnel= InterventionController::getpersonnelbyenginID(1,$id);
//
$responsable= InterventionController::getResponsableIntervention($id);
//
if(isset($rapports->id_rapport))
$comment=RapportController::listerapportcommentaire($rapports->id_rapport);
return view("rapports.correction_rapport",[
    'intervention' => $intervention,
    'engins' => $listeengin,
    'idinterventions' => $id,
    'rapport' => $rapports,
    'commentaire' => $comment,


    ]);


    }
    public static function validationrapport(Request $request,$id)
    {
        DB::table('rapports')->where('id_rapport',$id)->
        update([
            'statut'=> $request->input('m'),
         ]);

 }

    public static function ajoutcommentaire(Request $request,$id)
    {
        DB::table('commentaires')->insert(['contenu' =>$request->input('commentaire'), 'id_rapport' => $id]);


    }

    public static function validerapport(Request $request,$id)
    {
            if($request->input('commentaire')!= null)
            {
            InterventionController::ajoutcommentaire( $request,$id);
            }
            InterventionController::validationrapport($request,$id);


            return redirect()->route('listeallrapportchef');

    }

    public static function valide($request,$id)
    {

        InterventionController::validerapport($request,$id);

    }
    public static function rejete($request,$id)
    {

        InterventionController::validerapport($request,$id);

    }



}
