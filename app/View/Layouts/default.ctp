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
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

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
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
		</div>
	</div>
</body>
</html>
