<?php

// app/controllers/ViewController.php

class ViewController extends BaseController {

	public function getIndex() {

		$template = Template::find($templateId);
		
		$data['templateId'] = $templateId;
		$data['template'] = $template;

		return View::make('review', $data);
	}

	// Save and Next button handled here
	public function putIndex($templateId) {

		// Save
		$template = Template::find($templateId);
		$template->indication_status = Input::get('indication_status');
		$template->technique_status = Input::get('technique_status');
		$template->comparison_status = Input::get('comparison_status');
		$template->findings_status = Input::get('findings_status');
		$template->impression_status = Input::get('impression_status');
		$template->template_status = Input::get('template_status');

		$template->save();

		// and Next
		// Check for worklist
		if (Session::has('worklist')) {
			// Check if empty
			if(Session::get('worklist')->isEmpty()) {
				// return to empty worklist page
				return Redirect::to('worklist');
			}
			else {
				// Shift the first element from worklist.
				$next = Session::get('worklist')->shift();

				return Redirect::action('ReviewController@showTemplate', $next->id);
			}
		}
		else {
			return Redirect::to('worklist');
		}
	}

}

?>