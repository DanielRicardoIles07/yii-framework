<?php 
use yii\helpers\Url;
use yii\helpers\Html;

 ?>
 <h1>Formulario</h1>
 <h3><?= $mensaje ?></h3>
 <?= Html::beginForm(
 	Url::toRoute("site/request"),//accion
 	"get",//metodo
 	["class"=> "form-inline"]//opciones
 	);
  ?>
  <div class="form-group">
  <?= Html::label("Escribe tu nombre", "nombre") ?>
  <?= Html::textInput("nombre" , null , ["class"=> "form-control"]) ?>
  </div>
  <?= Html::submitInput("Enviar", ["class"=> "btn btn-primary"]) ?>
  <?php  
  if ($mensaje) {
  	echo "<a href='http://localhost/2.0.12/web/index.php?r=site%2Fformulario'><input type='button' class='btn btn-danger' value='Limpiar' </a>";
  }
  ?>
 

<? = Html::endForm()?>