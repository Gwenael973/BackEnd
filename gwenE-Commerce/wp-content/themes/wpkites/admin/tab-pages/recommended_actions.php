<?php 
	$wpkites_actions = $this->recommended_actions;
	$wpkites_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="wpkites-tab-pane panel-close">
	<div class="action-list">
		<?php if($wpkites_actions): foreach ($wpkites_actions as $key => $wpkites_val): ?>
		<div class="action col-md-6" id="<?php echo esc_attr($wpkites_val['id']); ?>">
			<div class="action-box">
				<div class="action-watch">
				<?php if(!$wpkites_val['is_done']): ?>
					<?php if(!isset($wpkites_actions_todo[$wpkites_val['id']]) || !$wpkites_actions_todo[$wpkites_val['id']]): ?>
						<span class="dashicons dashicons-visibility"></span>
					<?php else: ?>
						<span class="dashicons dashicons-hidden"></span>
					<?php endif; ?>
				<?php else: ?>
					<span class="dashicons dashicons-yes"></span>
				<?php endif; ?>
				</div>
				<div class="action-inner">
					<h3 class="action-title"><?php echo esc_html($wpkites_val['title']); ?></h3>
					<div class="action-desc"><?php echo esc_html($wpkites_val['desc']); ?></div>
					<?php echo wp_kses_post($wpkites_val['link']); ?>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>