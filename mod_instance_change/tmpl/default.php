<?php
/*
 * @package    Instance Change Package
 * @version    1.0.0
 * @author     Septdir Workshop - septdir.com
 * @copyright  Copyright (c) 2018 - 2021 Septdir Workshop. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link       https://www.septdir.com/
 */

defined('_JEXEC') or die;

?>
<div class="pull-right">
	<div class="btn-group">
		<?php foreach ($links as $link): ?>
			<a class="btn btn-small <?php if ($link['active']) echo 'btn-success' ?>"
			   href="<?php echo $link['href']; ?>" target="_blank">
				<?php echo $link['title']; ?>
			</a>
		<?php endforeach; ?>
	</div>
</div>