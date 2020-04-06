<?php
use App\Http\Controllers\InterventionController;
//die($_GET['name']);
if (isset($_GET['name'])) {
    $Type_Inters = InterventionController::getRolebyEngins($_GET['name']);
    //$value=$_GET['name'];
    //die($Type_Inters);
    //var_dump(print_r($Type_Inters));
    //echo $name = $_GET['name'];
    ?>
    <form action="" id="idform" method="post">
    <?php
    $i = 1;
    //die(print_r($Type_Inters));
    foreach ($Type_Inters as $Type) {
        //die($Type);
        if ($i % 2 == 1) {
?>
            <div class="row">
            <?php
        }
            ?>
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label> <?php echo $Type['ROLE_NAME'] ?> </label>
                    <input type="text" class="form-control" name="<?php echo "Role" . $i ?>" placeholder="Nom & Prenom">
                </div>
            </div>
            <?php
            $i++;
            if ($i % 2 == 1) {
            ?>
            </div>
<?php
            }
        }
    }
?>
    </form> 
