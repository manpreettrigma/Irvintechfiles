<img src="<?php echo base_url()."uploads/id_proofs/".$id_proof['0']['id_proof'];?>">
   <form name="id accept" method="post" action="">
		<label><input required type="radio" name="action" value="2">:Inactive</label>
		<label><input required type="radio" name="action" value="1">:Active</label></br>
		<p>Comments</p>
		<textarea name="message"></textarea>
		</br>
		<input type="submit" value="Submit">
   </form>