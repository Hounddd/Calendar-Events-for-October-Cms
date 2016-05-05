<?php namespace JorgeAndrade\Events\Components;

use Cms\Classes\ComponentBase;
use JorgeAndrade\Events\Models\Event as CalendarEvent;

class Event extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Calendar Event',
            'description' => 'Displays a calendar event on the page',
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        // base url on slug, not id
        $event = CalendarEvent::where('slug', $this->param('slug'))->firstOrFail();
        $latLong = preg_split('/, ?/', $event->lat_long);
        $this->event = $this->page['event'] = $event;
        $this->dates = $this->page['dates'] = $event->dates;

        // check latlong
        !empty($latLong[0]) ? $this->lat = $this->page['lat'] = str_replace('(', '', $latLong[0]) : '';
        !empty($latLong[1]) ? $this->long = $this->page['long'] = str_replace(')', '', $latLong[1]) : '';
    }

}
