<?php
/** @var \Exception $exception */
$this->title = $exception->getCode();
?>
<h3><?php echo $exception->getCode() . " - " . $exception->getMessage(); ?></h3>