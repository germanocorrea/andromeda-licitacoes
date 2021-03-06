<?php
/**
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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Andrômeda Licitações: <?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css');
		echo $this->Html->css('https://code.cdn.mozilla.net/fonts/fira.css');

        echo $this->Html->script('https://code.jquery.com/jquery-3.2.1.min.js');
		echo $this->Html->script('//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
            <div id="user-menu" style="float: right; display: inline-block;">
                <?php if (AuthComponent::user('id') != null)
                {
                    echo 'Bem vindo(a), ' . AuthComponent::user('name') . '!';

                    echo $this->Html->link('Licitações', array(
                        'controller' => 'licitations',
                        'action' => 'index'
                    ));

                    if (AuthComponent::user('role') == 'gerente' || AuthComponent::user('role') == 'funcionario')
                        echo $this->Html->link('Usuários', array(
                            'controller' => 'users',
                            'action' => 'index'
                        ));

                    echo $this->Html->link('Logout', array(
                        'controller' => 'users',
                        'action' => 'logout'
                    ));
                } ?>
            </div>
			<h1><?php echo $this->Html->link('Andrômeda Licitações', '/');?></h1>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
