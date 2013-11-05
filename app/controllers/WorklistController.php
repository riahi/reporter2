<?php 

// app/controllers/WorklistController.php

class WorklistController extends BaseController {

	// Display worklist
	public function getIndex() {
		// Get current user
		$user = Auth::user();

		// Check if user has an existing worklist
		if($user->hasWorklist()) {
			$worklistEmpty = false;
			$data['worklist'] = $user->templates()->get();
		}
		else {
			$worklistEmpty = true;
		}

		$data['worklistEmpty'] = $worklistEmpty;
		//return var_dump($data['worklist']);
		return View::make('worklist', $data);
	}

	// Add to Worklist
	public function postIndex() {
		// Get current user
		$user = Auth::user();

		// Find out if we are adding all or just adding selected

		// If just adding selected
		if(Input::has('add_to_worklist')) {
			$searchResults = Input::get('add_to_worklist');
			$searchResults = Template::find($searchResults);
		}
		// else adding all
		else {
		$searchResults = Session::get('searchResults');
		}
		
		// Use each() method and closure to 
		//   add the template-user relationship and update pivottable
		$searchResults->each(function($template) {
			$user = Auth::user();
			$user->templates()->save($template);
		});

		// Pass variables to the view
		$data['worklist'] = $user->templates()->get();
		$data['worklistEmpty'] = false;
		return View::make('worklist', $data);
	}

	// Add Selected Templates to Worklist
	public function addSelected() {
		// Get current user
		$user = Auth::user();

		// Retrieve selected options, then use each() method and closure to
		//		add the template-user relationship and update pivottable.
		$selectedTemplates = Input::all();

		return var_dump($selectedTemplates);
	}

	// Clear Worklist
	public function deleteIndex() {
		$user = Auth::user();
		$user->templates()->detach();

		$data['worklistEmpty'] = true;
		return View::make('worklist', $data);
	}
}

?>