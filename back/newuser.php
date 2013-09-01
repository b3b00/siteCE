
				
		<div id='content' style='margin-top:150px;display:block'>
			<div class="conteneur" style='display:block'>
			
			
			<table>
			<?php
				require_once('common/tools.php');
				$users = getUsers();
				foreach($users as $u) {
					echo "<tr><td>".$u."</td>";
					echo "<td><a href='admin.php?page=deleteusr&id=".$u."'><img alt='suppression' src='images/delete.gif'/></a></td>";
					echo "</tr>";
				}
				
			?>
			
				<form action='admin.php?page=adduser' method='post'>
				<table>
					<tr><td>username : </td><td><input type='text' name='user' id='user'/></td></tr>
					<tr><td>password : </td><td><input type='password' name='pwd' id='pwd'/></td></tr>
					<tr><td colspan='2' align='center'><input type='submit' name='go' value='OK'/></td></tr>
				</table>
				</form>
				
			</div>	
		</div>
		</div>
</body>
</html>