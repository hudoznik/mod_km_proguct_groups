<?php
/**
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="ksm-module-shopreviews ksm-block<?php echo $moduleclass_sfx; ?>">
<?php if(!empty($reviews)){ ?>
    <?php foreach($reviews as $review){ ?>
        <div class="ksm-module-shopreviews-item"> <!-- article -->
			<div class="ksm-module-shopreviews-item-h">
				<div class="ksm-review-avatar">
					<!-- <img src="/templates/ksenmartcolorful/images/user_rev.png" alt="<?php echo $review->name; ?>" class="" /> -->
				</div>
				<div class="ksm-module-shopreviews-item-h-info">
					<div class="ksm-module-shopreviews-item-h-name"><?php echo $review->name; ?></div>
					<?php echo KSSystem::loadTemplate(array('rate' => $review->rate), 'product', 'product', 'rating_stars'); ?>
				</div>
			</div>
            <div class="ksm-module-shopreviews-item-b">
				<div class="ksm-module-shopreviews-item-b-comment-ug"></div>
				<div class="ksm-module-shopreviews-item-b-comment">
					 <div class="ksm-module-shopreviews-item-b-comment-text">
						<?php
							$cmt = mb_substr($review->comment_full, 0, $params->get('count_symbol', 200));
						?>
						<?php echo $cmt.(($cmt == $review->comment)?'':'...');  ?>
					</div>
				</div>
				<div class="ksm-module-shopreviews-item-b-read_more">
					<a href="<?php echo JRoute::_('index.php?option=com_ksenmart&view=comments&layout=shopreview&Itemid='.$Itemid .'&id='.$review->id); ?>" title="Подробнее">Подробнее</a>
				</div>
            </div>
        </div> <!-- article -->
    <?php } ?>
	<div class="ksm-module-shopreviews-read_all">
		<a class="ksm-btn"  href="<?php echo JRoute::_('index.php?option=com_ksenmart&view=comments&layout=reviews&Itemid='.$Itemid); ?>" class="ksm-module-shopreviews-link">
		<?php echo JText::_('MOВ_KM_SHOP_REVIEWS_ALL_REVIEWS'); ?>
		</a>
	</div>
<?php } ?>
</div>