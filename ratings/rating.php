<?php 
// debug function
function debug($s) {
	echo '<pre>'.print_r($s,true).'</pre>';
}

// get poll file
$rating_file = 'ratings.txt';
// get file
$data = json_decode(file_get_contents($rating_file), true);

if(!empty($_POST['id'])) {
	if(isset($data[$_POST['id']])) {
		$data[$_POST['id']]['votes']++;
		$data[$_POST['id']]['score'] = $data[$_POST['id']]['score'] + $_POST['score'];
	} else {
		$data[$_POST['id']] = array('votes' => 1, 'score' => $_POST['score']);
	}
	
	$fh = fopen($rating_file, 'w');
	fwrite($fh, json_encode($data));
	fclose($fh);
}
echo json_encode($data);
?>