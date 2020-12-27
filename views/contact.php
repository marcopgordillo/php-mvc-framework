<?php
/** 
 * @var $this App\core\View
 * @var $model App\models\ContactForm
 */
use App\core\form\Form;
use App\core\form\TextAreaField;

$this->title = 'Contact Us';
?>
<h1>Contact us</h1>

<?php $form = Form::begin('', 'post'); ?>
  <?php echo $form->field($model, 'subject'); ?>
  <?php echo $form->field($model, 'email'); ?>
  <?php echo new TextAreaField($model, 'body'); ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php $form = Form::end(); ?>