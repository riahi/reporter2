<?php

// app/controllers/ReviewController.php

class ReviewController extends BaseController {

	public function getIndex() {
		// Get current user
		$user = Auth::user();

		// Check if user has an existing worklist
		if($user->hasWorklist()) {
			// Get next element
			$next = $user->templates()->first();

			return Redirect::to(url('review', $next->id));

		}
		else {
			return Redirect::to(url('worklist'));
		}
	}

	public function showIndex($templateId) {
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
		// Get current user
		$user = Auth::user();
		// Dissociate this template from pivottable
		$user->templates()->detach($template);

		// Check if user has an existing worklist
		if($user->hasWorklist()) {
			// Get next element
			$next = $user->templates()->first();

			return Redirect::to(url('review', $next->id));

		}
		else {
			return Redirect::to(url('worklist'));
			//return Redirect::action('ReviewController@showIndex', $next->id);
		}
	}

}

?>