


<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">numero Intervention</th>
        <th scope="col">Commune</th>
        <th scope="col">adresse</th>
        <th scope="col">typeintervention</th>
        <th scope="col">date heure debut</th>
        <th scope="col">date heure fin </th>

        <!-- <th scope="col">membre equipe</th> -->
        <th scope="col">Action</th>
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
                <a href="index.php?c=InterventionsController&m=redactionrapport&id=<?php if (isset($i->Numero_Intervention)) echo $i->Numero_Intervention  ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil" ></i>Rediger rapport</button></a>
            </td>

        </tr>
    <?php endforeach;?>


    </tbody>

    <!--jusque la qui doit changer-->
</table>
</br>
</br>
<?php if(!isset($interventions[0])) echo "tous les rapports sont rediger" ?>
