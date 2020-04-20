<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\InterventionController;
use App\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
     
    public static function listerapportcommentaire($id)
    {
        $RapportM = DB::table('commentaires')->where('id_rapport', $id)->get();

        return  $RapportM;
    }

    public static function listeAllrapportresponsable()
    {
        //liste Allrapport resposable bylogin
        $rapport = DB::table('rapports')
        ->join('interventions', 'rapports.Numero_intervention', '=', 'interventions.Numero_Intervention')
        ->join('responsables', 'interventions.Responsable_idResponsable', '=', 'responsables.idResponsable')
        ->where('responsables.P_CODE',session('P_CODE'))
        ->select('rapports.*')
        ->get();

        return view('rapports.rapport_responsable',[
            'rapport' => $rapport,     
        ]);

            
    }
       
    public static function Modificationrapport($id,$contenu)
    {

        $stmt=DB::table('rapports')->where('P_ID',$id)->
        update([
            'contenu'=> $contenu,
            'statut'=> NULL ]);

    }


    public static function detail($id,$pageretourner)
    {

        $intervention =InterventionController::getbyinterventionid($id);
        $rapports = InterventionController::getinterventionrapport($id);
        if(isset($rapports[0]))
        $rapports = $rapports[0];
        $listeengin=InterventionController::getenginbyinterventionID($id);
        $listepersonnel= InterventionController::getpersonnelbyenginID(1,$id);
        if(isset($rapports->id_rapport))
        $comment=Rapport::listerapportcommentaire($rapports->id_rapport);
        return view("rapports.$pageretourner",[
            'intervention' => $intervention,
            'engins' => $listeengin,
            'idinterventions' => $id,
            'rapport' => $rapports,

            ]);
        
    }
    public static function correctionrapport($id)
    {

        self::detail($id,'correction_rapport');

    }
    public function index()
    {



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
