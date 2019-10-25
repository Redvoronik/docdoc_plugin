<div class="wrap">
	<h2>Настройки API Docdoc.ru</h2>

	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

		<table class="form-table">

			<tr valign="top">
				<th scope="row">Имя пользователя</th>
				<td><input type="text" name="username" value="<?php echo get_option('username'); ?>" /></td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Пароль</th>
				<td><input type="text" name="password" value="<?php echo get_option('password'); ?>" /></td>
			</tr>

		</table>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="username,password" />

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
</div>