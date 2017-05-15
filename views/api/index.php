

		<?php			
			foreach($message as $row) {
				echo json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
			}
		?>    	    	
