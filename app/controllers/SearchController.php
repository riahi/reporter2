<?php

// app/controllers/SearchController.php

// use View;
// use BaseController;

class SearchController extends BaseController {

	public function getIndex() {
		$data['showResults'] = false;
		return View::make('search', $data);
	}

	public function postIndex() {
		$formData = Input::all();

		$titleSearch = $formData['template_title'];
		$templateSearch = '%' . $titleSearch . '%';
		$query = Template::where('title', 'LIKE', $templateSearch);

		// if author is selected, add an author search
		if ($formData['template_author'] != 'All') {
			$query->where('author', '=', $formData['template_author']);
		}
		// if specialty is selected, add a specialty search
		if ($formData['template_subspecialty'] != 'All') {
			$query->where('subspecialty', '=', $formData['template_subspecialty']);
		}
		// if level of training is selected
		if ($formData['template_level_of_training'] != 'All') {
			$query->where('author_training', '=', $formData['template_level_of_training']);
		}
		// if template status is selected, add a template search
		if ($formData['template_status'] != 'All') {
			$query->where('template_status', '=', $formData['template_status']);
		}

		$searchResults = $query->get();
		$data['titleSearch'] = $titleSearch;
		$data['templateSearch'] = $templateSearch;
		$data['searchResults'] = $searchResults;
		$data['showResults'] = true;

		// store searchResults in session to grab later
		Session::put('searchResults', $searchResults);

		return View::make('search', $data);
	}
}

?>