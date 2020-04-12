<div class="row col-12">
    <div class="col-12">
        <div class="card col-12">
            <div class="card-header ">
                <h3 class="card-title">Liste Des Rapport</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 230px;">
                        <select class="form-control">
                            <option>tous </option>
                            <option>Validé</option>
                            <option>En cours de validation</option>
                            <option>Rejetter</option>
                        </select>

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Numero intervention</th>
                        <th>date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($rapport as $r){ ?>
                    <tr>
                        <td><?php if (isset($r->Numero_intervention)) echo $r->Numero_intervention  ?></td>
                        <td><?php if (isset($r->date)) echo $r->date  ?></td>
                        <td><?php if ($r->statut == null) echo 'En attente de validation'; if ($r->statut != null) echo $r->statut;  ?></td>
                        <td  class="d-flex flex-row" >
                            <a href="index.php?c=InterventionsController&m=validationRapport&id=<?php if (isset($r->Numero_intervention)) echo $r->Numero_intervention  ?>"><button class="btn btn-sm btn-primary  " <?php if ($r->statut == 'rejete') echo "disabled"  ?>><i class="fa fa-pencil" ></i>consulter</button></a>
                        </td>
                    </tr>
                    <?php } ?>

                    </tbody>

                </table>
                <?php if(!isset($rapport[0])) echo "tous les rapports on ete valider" ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>