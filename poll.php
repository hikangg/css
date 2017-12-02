<h2><?php echo $title ?></h2>
<?php 
	$poll_id = strtolower(slug($title));
?>

<?php if(empty($_SESSION[$poll_id])): ?>
	<form method="post" action="<?php echo currentURL(); ?>" class="side-form">
		<?php foreach($options as $k=>$v): ?>
			<div class="input-wrap poll">
				<input type="radio" name="poll-option" id="po-<?php echo $k; ?>" value="<?php echo $k; ?>" class="radio-option" />
				<label for="po-<?php echo $k ?>"><?php echo $v; ?></label>
			</div>
		<?php endforeach; ?>
		<div class="input-wrap submit">
			<input type="hidden" name="poll" value="<?php echo $poll_id; ?>" />
			<button type="submit" class="input2">Vote</button>
		</div>	
	</form>
<?php else: ?>
	<div class="poll-results">
		<?php 
			$poll_file = $_SERVER['DOCUMENT_ROOT'].'/polls/'.$poll_id.'.txt';
			$results = json_decode(file_get_contents($poll_file), true);
			$total_votes = array_sum($results);
		 ?>
		 <?php foreach($options as $k=>$v): ?>
			<div class="poll-result">
				<?php $votes = !empty($results[$k])?$results[$k]:0; ?>
				<?php $bar_width = !empty($total_votes)?ceil(($votes/$total_votes)*100):0; ?>
				<strong><?php echo $v; ?></strong> (<?php echo $votes; ?>)
				<div class="bar-wrap"><div class="bar" style="width: <?php echo $bar_width; ?>%;"></div></div>
			</div>	 	
		 <?php endforeach; ?>
	</div>
<?php endif; ?>