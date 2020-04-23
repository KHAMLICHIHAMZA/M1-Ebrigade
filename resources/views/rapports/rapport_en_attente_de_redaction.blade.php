@extends('layouts.master')
@section('content')

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">@lang("numero Intervention")</th>
        <th scope="col">@lang("Commune") </th>
        <th scope="col">@lang("adresse")</th>
        <th scope="col">@lang("typeintervention")</th>
        <th scope="col">@lang("date heure debut")</th>
        <th scope="col">@lang("date heure fin")</th>

        <!-- <th scope="col">membre equipe</th> -->
        <th scope="col">@lang("Action")</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($interventions as $i):?>
        <tr>
            <td scope="col"><?php if (isset($i->Numero_Intervention)) echo $i->Numero_Intervention  ?></td>
            <td scope="col"><?php if (isset($i->Commune)) echo $i->Commune  ?></td>
            <td scope="col"><?php if (isset($i->Adresse)) echo $i->Adresse  ?></td>
            <td scope="col"><?php if (isset($i->Type_interv)) echo $i->Type_interv ; ?></td>
            <td scope="col"><?php if (isset($i->Date_Heure_Debut)) echo  $i->Date_Heure_Debut ;?></td>
            <td scope="col"><?php if (isset($i->Date_Heure_Fin)) echo  $i->Date_Heure_Fin ;?></td>

            <td  class="d-flex flex-row" >
                        <a href="http://localhost:8001/Rapports/rediger/<?php if (isset($i->Numero_Intervention)) echo $i->Numero_Intervention  ?>">     <button class="btn btn-sm btn-warning"><i class="fa fa-pencil" ></i>Rediger rapport</button></a>
            </td>

 




        </tr>
    <?php endforeach;?>


    </tbody>

    <!--jusque la qui doit changer-->
</table>

<?php if(!isset($interventions[0]))
{
   $message = '<div class="alert alert-error hidden" role="alert">rien a rediger</div>';
echo $message;

}
 ?>
@endsection
