<?php

// app/models/Template.php

class Template extends Eloquent {
	public $timestamps = false;

	// Many-to-many relationship with User (implements Worklist)
	public function users() {
		return $this->belongsToMany('Template');
	}

}

?>