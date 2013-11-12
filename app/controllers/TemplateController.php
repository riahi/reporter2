<?php
// app/controllers/TemplateController.php

class TemplateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// show list of templates or redirect to search
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// will implement later.  similar to inputform
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// will implement later.  similar to inputform
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$template = Template::find($id);
		
		$data['id'] = $id;
		$data['template'] = $template;
		$data['saved'] = false;

		return View::make('template', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$template = Template::find($id);
		$template->indication_status = Input::get('indication_status');
		$template->technique_status = Input::get('technique_status');
		$template->comparison_status = Input::get('comparison_status');
		$template->findings_status = Input::get('findings_status');
		$template->impression_status = Input::get('impression_status');
		$template->template_status = Input::get('template_status');

		$template->save();

		$data['id'] = $id;
		$data['template'] = $template;
		$data['saved'] = true;

		return View::make('template', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function uploadTemplates()
	{
		// Get file, author, specialty, and level of training
		$file = Input::file('template_export');
		$fileContents = file_get_contents($file);

		$author = Input::get('author');
		$subspecialty = Input::get('subspecialty');
		$authorTraining = Input::get('author_training');

		// Splits apart file based on regex.  
		// PHP regex requires / .. / on either side of pattern
		// returns an array that drops all empty matches
		$array = preg_split('/\$\$\$\r?\n/', $fileContents, -1, PREG_SPLIT_NO_EMPTY);
		
		// ************************************************
		// Process and put into Database
		// ************************************************
		// loops through array and parses.
		$title = '';
		$template = '';

		for($i = 0; $i < count($array); $i++) {
			$temp = $array[$i];
			
			$t = new Template;

			preg_match_all('/(.+)(\r?\n)((\W|\w)+)/', $temp, $matches, PREG_SET_ORDER);
			$tempArray = $matches[0];
			

			$t->title = $tempArray[1];
			$t->template = $tempArray[3];
			$t->author = $author;
			$t->subspecialty = $subspecialty;
			$t->author_training = $authorTraining;
			$t->save();
		}

		return var_dump(file_get_contents($file));
	}

}