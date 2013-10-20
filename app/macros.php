<?php

// app/macros.php

Form::macro('fieldStatus', function($field, $value) {
	$v = array(
		"Approved" => false,
		"Disapproved" => false,
		"Needs Work" => false
	);

	switch($value) {
		case "Approved": $v["Approved"] = 'checked="checked"';
						 break;
		case "Disapproved": $v["Disapproved"] = 'checked="checked"';
						    break;
		case "Needs Work": $v["Needs Work"] = 'checked="checked"';
						   break;
	}

	switch($field) {
		case "indication_status": $legend = "Indication"; 
									break; 
		case "technique_status": $legend = "Technique"; 
									break;
		case "comparison_status": $legend = "Comparison"; 
									break;
		case "findings_status": $legend = "Findings"; 
									break;
		case "impression_status": $legend = "Impression"; 
									break;
		case "template_status": $legend = "Template"; 
									break;
	}

	$source = 
		'<fieldset id="'. $legend .'">
			<legend>'. $legend .'</legend>
		<input type="radio" id="'. $field .'_Approved" name="'. $field .'" value="Approved" '. $v["Approved"] .' />
		<label for="'. $field .'_Approved">Approved</label><br />
		<input type="radio" id="'. $field .'_Disapproved" name="'. $field .'" value="Disapproved" '. $v["Disapproved"] .' />
		<label for="'. $field .'_Disapproved">Disapproved</label><br />
		<input type="radio" id="'. $field .'_Needs_Work" name="'. $field .'" value="Needs Work" '. $v["Needs Work"] .' />
		<label for="'. $field .'_Needs_Work">Needs Work</label><br />
		</fieldset>';
	return $source;
});

?>