<?php
	global $post;
	$ozel_alan_seti = get_post_meta($post->ID, 'ozel_alan_seti', true);
?>
<div class="dragdrop-sortable-content">
	<ul id="dragdrop-sortable">
		
		<?php if(is_array($ozel_alan_seti) && !empty($ozel_alan_seti)): foreach($ozel_alan_seti as $index => $item): ?>
		
		<li class="ui-state-default single-sortable-item">
			<div class="dragdrop-sortable-item closed">
				<div class="dragdrop-sortable-item-header">
					<button type="button" class="handlediv" aria-expanded="true">
						<span class="dashicons dashicons-arrow-up"></span>
					</button>
					<h3 class="hndle">Sıralanabilir Özel Alan  <span class="dragdrop-item-count"><?= $item['order'] + 1; ?></span></h3>
					<button type="button" class="remove-dragdrop-sortable header-dragdrop-remove-icon">
						<span class="dashicons dashicons-no-alt"></span>
					</button>
				</div>
				<div class="dragdrop-sortable-item-body">
					<table class="wp-list-table widefat fixed striped">
						<thead>
							<tr>
								<th>İcon Adı</th>
								<th>Başlık</th>
								<th>Url</th>
							</tr>
						</thead>
						<tbody>
							<tr>
						    	<td><input type="text" class="widefat" name="ozel_alan_seti[<?= $index; ?>][kolon_1]" value="<?= empty($item['kolon_1']) ? '' : $item['kolon_1']; ?>"></td>
								<td><input type="text" class="widefat" name="ozel_alan_seti[<?= $index; ?>][kolon_2]" value="<?= empty($item['kolon_2']) ? '' : $item['kolon_2']; ?>"></td>
								<td><input type="text" class="widefat" name="ozel_alan_seti[<?= $index; ?>][kolon_3]" value="<?= empty($item['kolon_3']) ? '' : $item['kolon_3']; ?>"></td>
							</tr>
						</tbody>
					</table>
					<div class="dragdrop-sortable-item-bottom">
						<button type="button" class="button remove-dragdrop-sortable">Sil</button>
					</div>
				</div>
				<input type="hidden" name="ozel_alan_seti[<?= $index; ?>][order]" value="<?= $index; ?>" class="dragdrop-set-order">
			</div>
		</li>

		<?php endforeach; else: //If array is empty or not set ?>
		
		<li class="ui-state-default single-sortable-item">
			<div class="dragdrop-sortable-item">
				<div class="dragdrop-sortable-item-header">
					<button type="button" class="handlediv" aria-expanded="true">
						<span class="dashicons dashicons-arrow-up"></span>
					</button>
					<h3 class="hndle">Özel Alan <span class="dragdrop-item-count">1</span></h3>
					<button type="button" class="remove-dragdrop-sortable header-dragdrop-remove-icon">
						<span class="dashicons dashicons-no-alt"></span>
					</button>
				</div>
				<div class="dragdrop-sortable-item-body">
					<table class="wp-list-table widefat fixed striped pages">
						<thead>
							<tr>
								<th>İcon Adı</th>
								<th>Başlık</th>
								<th>Özel Alan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
						    	<td><input type="text" class="widefat" name="ozel_alan_seti[0][kolon_1]"></td>
								<td><input type="text" class="widefat" name="ozel_alan_seti[0][kolon_2]"></td>
								<td><input type="text" class="widefat" name="ozel_alan_seti[0][kolon_3]"></td>
							</tr>
						</tbody>
					</table>
					<div class="dragdrop-sortable-item-bottom">
						<button type="button" class="button remove-dragdrop-sortable">Özel Alan Seti Sil</button>
					</div>
				</div>
				<input type="hidden" name="ozel_alan_seti[0][order]" value="0" class="dragdrop-set-order">
			</div>
		</li>

		<?php endif; ?>

	</ul> <!-- /#dragdrop-sortable -->

	<button type="button" class="button add-dragdrop-sortable">Yeni Özel Alan Seti Ekle</button>
</div>