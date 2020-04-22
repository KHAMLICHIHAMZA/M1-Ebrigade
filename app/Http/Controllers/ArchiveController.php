<?php

namespace App\Http\Controllers;

use App\Intervention;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public static function listeArchives()
    {
        //$interventionM = new interventionsModel();
        //if(self::ispersonnel($_SESSION['username']))
            //$listeIntervention =  $interventionM->getallbyLogin2();
        //else
            $InterventionAll = Intervention::getAllIntervention();
            return view('archive.ListeArchive',['Interventions' => $InterventionAll]);
    }

    public static function findArchive(Request $request){
        //dd($request);


        switch ($request->input('Filre')) {
            case "Numero_Intervention":
                $Intervention = Intervention::SearchArchiveByNumInter($request->input('Search'));
                return view('archive.ListeArchive',['Interventions' => $Intervention]);
                break;
            case "Type_interv":
                $Intervention = Intervention::SearchArchiveByTypeInter($request->input('Search'));
                return view('archive.ListeArchive',['Interventions' => $Intervention]);
                break;
            case "Nom_Engin":
                $Intr=array();
                $Intervention = Intervention::SearchArchiveByEngin($request->input('Search'));
                //dd($Intervention);
                if(!empty($Intervention)){
                    return view('archive.ListeArchive',['Interventions' => $Intervention]);
                }else{
                    return view('archive.ListeArchive',['Interventions' => $Intr]);
                }
                break;
            default:
                    dd($request->input('Filre'));

        }

    }
}
