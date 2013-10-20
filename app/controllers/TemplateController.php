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

}