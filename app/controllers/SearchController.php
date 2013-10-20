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
		$titleSearch = $formData['title_search'];
		$templateSearch = '%' . $titleSearch . '%';

		$searchResults = Template::where('title', 'LIKE', $templateSearch)
			->get();
		$searchSQL = Template::where('template', 'LIKE', $templateSearch)
			->toSql();
		$data['titleSearch'] = $titleSearch;
		$data['templateSearch'] = $templateSearch;
		$data['searchResults'] = $searchResults;
		$data['showResults'] = true;
		$data['SQL'] = $searchSQL;

		// store searchResults in session to grab later
		Session::put('searchResults', $searchResults);

		return View::make('search', $data);
	}
}

?>