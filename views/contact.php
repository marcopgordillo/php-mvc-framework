<?php
/** 
 * @var $this marcopgordillo\phpmvc\View
 * @var $model App\models\ContactForm
 */
use marcopgordillo\phpmvc\form\Form;
use marcopgordillo\phpmvc\form\TextAreaField;

$this->title = 'Contact Us';
?>
<h1>Contact us</h1>

<?php $form = Form::begin('', 'post'); ?>
  <?php echo $form->field($model, 'subject'); ?>
  <?php echo $form->field($model, 'email'); ?>
  <?php echo new TextAreaField($model, 'body'); ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php $form = Form::end(); ?>