<?php
	if(!empty($crediwatch_search_result) && is_array($crediwatch_search_result) && sizeof($crediwatch_search_result) <> 0){
	
		foreach($crediwatch_search_result as $csrow){
 ?>	
	
	<ul>
		<li class="left_li">Name</li>
		<li class="left_li_point">:</li>
		<li class="left_li_text">
			<?=(isset($csrow['name']) ? $csrow['name'] : 'Not Found');?>
		</li>
	</ul>
	<ul>
		<li class="left_li">Status</li>
		<li class="left_li_point">:</li>
		<li class="left_li_text">
			<?=(isset($csrow['status']) ? $csrow['status'] : 'Not Found');?>
		</li>
	</ul>
	<ul>
		<li class="left_li">Incorporation Date</li>
		<li class="left_li_point">:</li>
		<li class="left_li_text">
			<?=(isset($csrow['date_of_incorporation']) ? $csrow['date_of_incorporation'] : 'Not Found');?>
		</li>
	</ul>
	<ul>
		<li class="left_li"><div class="more"><button type="button" class="scomp_details" comp_id="<?=(isset($csrow['id']) ? $csrow['id'] : '0');?>">Get Detail Info</button></div></li>
		<li class="left_li_point"></li>
		<li class="left_li_text">
		</li>
	</ul>
<?php
		}
	}	

?>	
	
	<ul>
	</ul>