<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
 ?>
 <a href="<?= Url::toRoute("site/create") ?>"><i style="font-size:18px" class="fa">&#xf196;</i> Crear Alumno</a>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <?php 
  $f = ActiveForm::begin([
  	"method" => "get",
  	"action" => Url::toRoute("site/view"),
  	"enableClientValidation"=> true,
  	]);
   ?>
   <div class="form-group">
   		
   		<?= $f->field($form, "q")->input("search") ?>
   </div>
   <?= Html::submitButton("Buscar", ["class" => "btn btn-primary"]) ?>
   <?php $f->end() ?>
<h3><?= $search ?></h3>
 <h3>Lista de alumnos</h3>

 <table class="table">
 <tr style="background-color: white">
 	<th>Id Alumno</th>
 	<th>Nombre</th>
 	<th>Apellidos</th>
 	<th>Clase</th>
 	<th>Nota Final</th>
 	<th>opciones</th>
 
 </tr>
 <?php foreach ($model as $row): ?>
 	<tr style="background-color: white">
 		<td class="col-sm-1"><?= $row->id_alumno ?></td>
 		<td><?= $row->nombre ?></td>
 		<td><?= $row->apellidos ?></td>
 		<td><?= $row->clase ?></td>
 		<td><?= $row->nota_final ?></td>
 		<td>
 		<!--<a href="#" ><button class="btn btn-primary"><i style="font-size:15px" class="fa">&#xf044;</i> Editar</button></a> -->
 		 <a href="<?= Url::toRoute(['site/update', "id_alumno" =>$row->id_alumno]) ?>" ><button class="btn btn-primary"><i style="font-size:15px" class="fa">&#xf044; </i> Editar</button></a>
           
 		<!-- <a href="#"  class="text-danger"><button class="btn btn-danger"><i style="font-size:15px" class="fa">&#xf00d;</i> Eliminar</button></a> --> 
            <a href="#" class="text-danger" data-toggle="modal" data-target="#id_alumno_<?= $row->id_alumno ?>"><button class="btn btn-danger"><i style="font-size:15px" class="fa">&#xf00d;</i> Eliminar</button></a>

            <div class="modal fade" role="dialog" aria-hidden="true" id="id_alumno_<?= $row->id_alumno ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar alumno</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar el alumno <b><?= $row->id_alumno?>. <?= $row->nombre?> <?= $row->apellidos?></b>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/delete"), "POST") ?>
                                    <input type="hidden" name="id_alumno" value="<?= $row->id_alumno ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </td>
 		</td>
 	</tr>
 <?php endforeach ?>
 	
 </table>
 <?= LinkPager::Widget([
 	"pagination" => $pages,
 ]); 
 ?>
