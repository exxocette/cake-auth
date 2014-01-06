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
        echo $this->Html->css('custom');
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="/js/html5shiv.js"></script>
        <script src="/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <span class="navbar-brand" href="#">Project name</span>
            </div>
            <div class="navbar-collapse collapse">
                <div class="nav navbar-nav navbar-right">
                    <a href="/register" class="btn btn-primary navbar-btn">Sign Up</a>
                    <a href="/login" class="btn btn-default navbar-btn">Sign In</a>
                </div>  
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
    
    <?php
        echo $this->Html->script('jquery-1.10.2.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-dropdown');
        echo $this->Html->script('custom');
    ?>
</body>
</html>
