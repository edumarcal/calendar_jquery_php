<?php
// Agradeço a Deus pelo dom do conhecimento

namespace App\Models;

class EventModel
{

	const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/';
	const ALL_HOUR_REGEX = '/^\d{2}:\d{2}$/';

	private $id, $title, $start, $end, $description, $url;

	public function __construct($title, $start, $end, $description = '', $url = '')
	{
		$this->title = $title;
		$this->description = $description;
		$this->start = $start;
		$this->end = $end;
		$this->url = $url;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getStart()
	{
		return $this->start;
	}

	public function setStart($start)
	{
		$this->start = $start;
	}

	public function getEnd()
	{
		return $this->end;
	}

	public function setEnd($end)
	{
		$this->end = $end;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function setUrl($url)
	{
		$this->url = $url;
	}

	public function __toString()
	{
		return "[{$this->start} - {$this->end}] : {$this->title}";
	}

	public static function parser($events)
	{
		foreach ($events as $key => $value)
		{
			$events[$key]->start = $events[$key]->startDate;
			unset($events[$key]->startDate);

			$events[$key]->end = $events[$key]->endDate;
			unset($events[$key]->endDate);

			if (null === $events[$key]->url)
				unset($events[$key]->url);

			if (null === $events[$key]->end)
				unset($events[$key]->end);
		}

		return $events;
	}
}