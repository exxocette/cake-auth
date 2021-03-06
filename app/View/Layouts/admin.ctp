<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'DEMO');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" charset="utf-8">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-theme.min');
	?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      	<script src="/js/html5shiv.js"></script>
      	<script src="/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-static-top">

      	<div class="container">

        	<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand" href="/">DEMO @website</a>
        	</div>

        	<div class="navbar-collapse collapse">
          		<ul class="nav navbar-nav">
            		<li class="active"><a href="/">Home</a></li>
            		<li><a href="/">About</a></li>
            		<li><a href="/">Contact</a></li>
            		<li class="dropdown">
              			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              			<ul class="dropdown-menu">
                			<li><a href="/">Action</a></li>
                			<li><a href="/">Another action</a></li>
                			<li><a href="/">Something else here</a></li>
                			<li class="divider"></li>
                			<li class="dropdown-header">Nav header</li>
                			<li><a href="/">Separated link</a></li>
                			<li><a href="/">One more separated link</a></li>
              			</ul>
            		</li>
          		</ul>

          		<div class="nav navbar-nav navbar-right">
                Welcome <?php echo $this->session->read('Auth.User.username')?>
          			<a href="/logout" class="btn btn-success navbar-btn">Logout</a>
          		</div>
        	</div>

      	</div>

    </nav>

    <div class="container">
		<?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>


	<?php
		echo $this->Html->script('jquery-1.10.2.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('bootstrap-dropdown');
		echo $this->Html->script('custom');
	?>
</body>
</html>
