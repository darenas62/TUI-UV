<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCalendarRequest;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class CalendarController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Calendar::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $calendars = $query->get();

        return view('calendars.index')
            ->with('calendars', $calendars)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Calendar.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('calendars.create');
	}

	/**
	 * Store a newly created Calendar in storage.
	 *
	 * @param CreateCalendarRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCalendarRequest $request)
	{
        $input = $request->all();

		$calendar = Calendar::create($input);

		Flash::message('Calendar saved successfully.');

		return redirect(route('calendars.index'));
	}

	/**
	 * Display the specified Calendar.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$calendar = Calendar::find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');
			return redirect(route('calendars.index'));
		}

		return view('calendars.show')->with('calendar', $calendar);
	}

	/**
	 * Show the form for editing the specified Calendar.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$calendar = Calendar::find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');
			return redirect(route('calendars.index'));
		}

		return view('calendars.edit')->with('calendar', $calendar);
	}

	/**
	 * Update the specified Calendar in storage.
	 *
	 * @param  int    $id
	 * @param CreateCalendarRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCalendarRequest $request)
	{
		/** @var Calendar $calendar */
		$calendar = Calendar::find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');
			return redirect(route('calendars.index'));
		}

		$calendar->fill($request->all());
		$calendar->save();

		Flash::message('Calendar updated successfully.');

		return redirect(route('calendars.index'));
	}

	/**
	 * Remove the specified Calendar from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Calendar $calendar */
		$calendar = Calendar::find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');
			return redirect(route('calendars.index'));
		}

		$calendar->delete();

		Flash::message('Calendar deleted successfully.');

		return redirect(route('calendars.index'));
	}
}
