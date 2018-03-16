<?php
// Agradeço a Deus pelo dom do conhecimento

namespace App\Controllers;

use App\Models\EventModel;

use App\Core\{ App, Error, Request };

class EventController
{
	public function index()
	{
		return view('index');
	}

	public function getOne($id)
	{
		$event = App::get('database')->where('events', 'id', "$id");

		$event = EventModel::parser($event);

		return view('modal.info-edit', [ 'event' => $event[0] ]);
		#return json($event);
	}

	public function list()
	{
		$events = App::get('database')->selectAll('events');

		$events = EventModel::parser($events);

		return json($events);
	}

	public function store()
	{
		App::get('database')->insert('events',  $this->validate());
		redirect('');
	}

	public function update($id)
	{
		$parameter = Request::put();

		die(var_dump($_PUT));
		#die(var_dump($parameter));

		$status = App::get('database')->update('events', $parameter, $parameter['id']);

		return json(['status' => (bool) $status]);
		#return view('index', ['event' => $event ]);
	}

	public function delete($id)
	{
		$status = App::get('database')->delete('events', $id);
		return json(['status' => (bool) $status]);
		//redirect();
	}

	public function validate()
	{

		#die(var_dump(file_get_contents("php://input")));

		if (empty($_POST['title']))
			throw new Error("O campo 'Title' é obrigatório");

		if (empty($_POST['start']) || !preg_match(EventModel::ALL_DAY_REGEX, $_POST['start'])) 
			throw new Error("O campo 'Start' é obrigatório");

		if (!preg_match(EventModel::ALL_HOUR_REGEX, $_POST['startHour']))
			throw new Error("Data inválida");


		# Add key if not empty
		$return = [];

		if (!empty($_POST['title']))
			$return['title'] = $_POST['title'];

		if (!empty($_POST['start']) || !empty($_POST['startHour']))
			$return['startDate'] = $_POST['start'] . ' ' . $_POST['startHour'];

		if (!empty($_POST['end']))
			$return['endDate'] = $_POST['end'] . ' ' . $_POST['endHour'];

		if (!empty($_POST['description']))
			$return['description'] = $_POST['description'];

		if (!empty($_POST['url']))
			$return['url'] = $_POST['url'];

		return $return;
	}
}
