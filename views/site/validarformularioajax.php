<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Validar Formulario Ajax</h1>
<div class="form-group">
<h4><?= $msg ?></h4>
</div>
<?php $form = ActiveForm::begin([
	"method" => "post",
	"id"=> "formulario",
	"enableClientValidation" => false,
	"enableAjaxValidation" => true,

	]) ;
?>

	<div class="form-group">
		<?= $form->field($model, "nombre")->input("text") ?>
	</div>

	<div class="form-group">
		<?= $form->field($model, "email")->input("email") ?>
	</div>

	
	
	<?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>
	<?php  
  if ($msg) {
  	echo "<a href='http://localhost/2.0.12/web/index.php?r=site%2Fvalidarformularioajax'><input type='button' class='btn btn-danger' value='Limpiar' </a>";
  }
  ?>

<?php $form->end()?>