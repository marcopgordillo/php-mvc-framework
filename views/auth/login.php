<?php
/**
 * @var $model App\models\User
 * @var $this App\core\View
 */

use App\core\form\Form;

$this->title = 'Register';
?>
<h1>Login</h1>
<?php $form = Form::begin('', 'post'); ?>
  <?php echo $form->field($model, 'email')->emailField(); ?>
  <?php echo $form->field($model, 'password')->passwordField(); ?>

  <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>