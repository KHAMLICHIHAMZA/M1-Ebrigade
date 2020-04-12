<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class Rapport extends Model
{
    /*
    public  function listerapportcommentaire($id){
        $sql="select * from commentaires where id_rapport=:id";
        try {
            $db = DB::connect();
            $stmt=$db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
            $db = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function listeAllRapportresponsable()
    {
        $sql = 'SELECT * FROM rapports ';
        try {
            $db = DB::connect();
            $stmt = $db->prepare($sql);
            $res = ($stmt->execute()) ? $stmt->fetchAll(PDO::FETCH_OBJ) : null;
            $db = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
²
    public function listeAllRapportresponsablebylogin($P_CODE)
    {
        $sql = 'SELECT R.* FROM rapports as R ,interventions as I ,responsables as RE where 
                        R.Numero_intervention = I.Numero_Intervention and I.Responsable_idResponsable = RE.idResponsable and RE.P_CODE=:pcode   ';
        try {
            $db = DB::connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":pcode",$P_CODE);
            $res = ($stmt->execute()) ? $stmt->fetchAll(PDO::FETCH_OBJ) : null;
            $db = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function modificationrapport($id,$contenu)
    {
        $sql = 'UPDATE rapports set contenu=:contenu , statut = NULL where id_rapport=:id ';
        try {
            $db = DB::connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":contenu",$contenu);
            $stmt->bindParam(":id",$id);
            $res = $stmt->execute() ;
            $db = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    */
}
