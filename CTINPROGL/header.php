<div id="pageHeader"><table width="100%" border="0" cellspacing="0" cellpadding="12">
	  <tr>
		<td width="32%"><a href="CTINPROGL/index.php">
			<?php
			$currentDir = dirname($_SERVER['SCRIPT_NAME']); // Get the current directory

			if ($currentDir == "/CTINPROGL") {
				echo '<img src="style/logo.jpg" alt="Logo" width="252" height="36" border="0" />';
			} else {
				echo '<img src="../style/logo.jpg" alt="Logo" width="252" height="36" border="0" />';
			}
			?>
			</a>
		</td>
		<td width="68%" align="right"><a href="MyOnlineStorecart.php">Your Cart</a></td>
	  </tr>
	  <tr>
		<td colspan="2"><a href="../index.php">Home</a> &nbsp; &middot; &nbsp; <a href="#">Products</a> &nbsp; &middot; &nbsp; <a href="#">Help</a> &nbsp; &middot; &nbsp; <a href="#">Contact</a></td>
	  </tr>
	  </table>
</div>