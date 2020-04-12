


<div class="card card-primary " style="width: 100%">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i>
            INTERVENTION n° <?php if (isset($intervention->Commune)) echo $intervention->Numero_Intervention?>
        </h3>
    </div>
    <div class="card-body">
        <h4>DETAIL</h4>


        <div class="row">
            <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Intervention</a>
                    <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Engins</a>
                    <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Personnels</a>
                </div>
            </div>
            <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">

                    <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                        <!--            detail intervention       -->

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width:50%" > Responsable :</th>
                                    <td>Oumar</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Commune</th>
                                    <td><?php if (isset($intervention->Commune)) echo $intervention->Commune ?></td>
                                </tr>
                                <tr>
                                    <th>Adresse:</th>
                                    <td><?php if (isset($intervention->Adresse)) echo $intervention->Adresse ?></td>
                                </tr>
                                <tr>
                                    <th>Type Intervention:</th>
                                    <td><?php if (isset($intervention->Type_interv)) echo $intervention->Type_interv ?></td>
                                </tr>
                                <tr>
                                    <th>Debut Intervention:</th>
                                    <td><?php if (isset($intervention->Date_Heure_Debut)) echo $intervention->Date_Heure_Debut ?></td>
                                </tr>
                                <tr>
                                    <th>Fin Intervention:</th>
                                    <td><?php if (isset($intervention->Date_Heure_Fin)) echo $intervention->Date_Heure_Fin ?></td>
                                </tr>
                                </tbody></table>
                        </div>

                        <!--             fin detail               -->
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                        <div class="row">


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                    <tr>
                                        <th style="width:50%">Engins</th>
                                        <td>Depart</td>
                                        <td>Arriver</td>
                                        <td>Retour</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($engins as $e){ ?>
                                        <tr>
                                            <th><?php if (isset($e->Nom_Engin))  echo $e->Nom_Engin?></th>
                                            <td><?php if (isset($e->Date_Heur_Depart))  echo $e->Date_Heur_Depart ?></td>
                                            <td><?php if (isset($e->Date_Heure_Arriver))  echo $e->Date_Heure_Arriver?></td>
                                            <td><?php if (isset($e->Date_Heure_Retour))  echo $e->Date_Heure_Retour?></td>
                                        </tr>
                                    <?php }  ?>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">

                        <!-- personnel -->

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <?php
                                        $drp = 0;
                                        foreach($engins as $e){?>
                                            <li class="nav-item"><a class="nav-link <?php if ($drp== 0)  echo 'active' ?> " href="#<?php if (isset($e->Nom_Engin))  echo $e->Nom_Engin?>" data-toggle="tab"><?php if (isset($e->Nom_Engin))  echo $e->Nom_Engin?></a></li>
                                            <?php $drp++;  } ?>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">

                                        <?php
                                        $drp = 0;
                                        foreach($engins as $e){?>
                                            <div class="<?php if ($drp== 0)  echo 'active' ?> tab-pane" id="<?php if (isset($e->Nom_Engin))  echo $e->Nom_Engin ; ?>">
                                                <?php $listePersonnel = $interventionM->getpersonnelbyenginID($e->idEngins,$intervention->Numero_Intervention) ; ?>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th style="width:50%">Role</th>
                                                            <td>Nom</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($listePersonnel as $p){ ?>
                                                            <tr>
                                                                <th><?php if (isset($p->Role))  echo $p->Role ;?></th>
                                                                <td><?php if (isset($p->Nom))  echo $p->Nom ; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>



                                            </div>
                                            <?php $drp++;  } ?>





                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>

                        <!-- fin personnel -->

                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"></li>

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content" style="width: 100%">
                <div class="container-fluid">

                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">

                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                        <h3 class="timeline-header"> RAPPORT </h3>

                                        <div class="timeline-body">
                                            <?php if (isset($rapport->contenu))  echo $rapport->contenu ; ?>
                                        </div>

                                        <section class="content-header">
                                            <div class="container-fluid">
                                                <div class="row mb-2">
                                                    <div class="col-sm-6">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ol class="breadcrumb float-sm-right">
                                                            <li class="breadcrumb-item"></li>

                                                        </ol>
                                                    </div>
                                                </div>
                                            </div><!-- /.container-fluid -->
                                        </section>
                                                                    




                                        <form   class=" col-sm-12" action="index.php" role="form">
                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <input name="id_rapport" type="hidden" class="form-control" type="text" placeholder="Default input" value="<?php if (isset($rapport->id_rapport))  echo $rapport->id_rapport ; ?>">
                                                <input name="c" type="hidden" class="form-control" type="text" placeholder="Default input" value="InterventionsController">
                                                <input name="numero_intervention" type="hidden" class="form-control" type="text" placeholder="Default input" value="<?php if (isset($intervention->Commune)) echo $intervention->Numero_Intervention?>">
                                                <div class="form-group">
                                                    <textarea name="commentaire" class="form-control" rows="2" placeholder="commentaire ..."></textarea>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="" style="display: flex; ">
                                                <input style="margin-right : 2%; "  type="submit" name="m" class="btn btn-primary align-items-center" value="valide">
                                                <input type="submit" name="m" class="btn btn-danger align-items-center" value="rejete">
                                            </div>
                                        </form>



                                        <section class="content-header">
                                            <div class="container-fluid">
                                                <div class="row mb-2">
                                                    <div class="col-sm-6">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ol class="breadcrumb float-sm-right">
                                                            <li class="breadcrumb-item"></li>

                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>




                                    </div>
                                </div>

                                <?php if(isset($commentaire)) foreach($commentaire as $c){?>
                                    <div>
                                        <i class="fas fa-comments bg-yellow"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> <?php if (isset($c->date))  echo date('d/m/Y',strtotime($c->date)); ?></span>
                                            <h3 class="timeline-header"><a href="#"><!-- nom chef --></a> commentaire</h3>
                                            <div class="timeline-body">
                                                <?php if (isset($c->contenu))  echo $c->contenu ; ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                                
                                <!-- END timeline item -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">

                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <div>

                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.timeline -->

            </section>



        </div>
    </div>
    <!-- /.card -->
</div>




