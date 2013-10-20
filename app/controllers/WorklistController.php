<?php

// app/controllers/WorklistController.php

class WorklistController extends BaseController {

	// Display worklist
	public function getIndex() {
		// Check if there is an existing worklist in the Session
		if (Session::has('worklist'))
		{
			// Check if empty
			if(Session::get('worklist')->isEmpty()) {
				// tell view to print out empty worklist message
				$worklistEmpty = true;
			}
			else {
				$worklistEmpty = false;
				$data['worklist'] = Session::get('worklist');
			}
		}
		else {
			$worklistEmpty = true;
		}

		$data['worklistEmpty'] = $worklistEmpty;
		return View::make('worklist', $data);
	}

	// Add to worklist
	public function postIndex() {
		// Check if WL in session
		if (Session::has('worklist')) {
			$worklist = Session::get('worklist');
			// merge in the search results
			$worklist = $worklist->merge(Session::get('searchResults'));
			Session::forget('worklist');
			Session::put('worklist', $worklist);
		}
		else {
			$worklist = Session::get('searchResults');
			Session::put('worklist', $worklist);
		}

		// Pass variables to the view
		$data['worklist'] = Session::get('worklist');
		$data['worklistEmpty'] = false;
		return View::make('worklist', $data);
	}

	// Clear Worklist
	public function deleteIndex() {
		Session::forget('worklist');

		$data['worklistEmpty'] = true;
		return View::make('worklist', $data);
	}
}

?>