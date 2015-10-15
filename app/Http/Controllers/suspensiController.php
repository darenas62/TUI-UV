<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatesuspensiRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\suspensiRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class suspensiController extends AppBaseController
{

	/** @var  suspensiRepository */
	private $suspensiRepository;

	function __construct(suspensiRepository $suspensiRepo)
	{
		$this->suspensiRepository = $suspensiRepo;
	}

	/**
	 * Display a listing of the suspensi.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->suspensiRepository->search($input);

		$suspensis = $result[0];

		$attributes = $result[1];

		return view('suspensis.index')
		    ->with('suspensis', $suspensis)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new suspensi.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('suspensis.create');
	}

	/**
	 * Store a newly created suspensi in storage.
	 *
	 * @param CreatesuspensiRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatesuspensiRequest $request)
	{
        $input = $request->all();

		$suspensi = $this->suspensiRepository->store($input);

		Flash::message('suspensi saved successfully.');

		return redirect(route('suspensis.index'));
	}

	/**
	 * Display the specified suspensi.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$suspensi = $this->suspensiRepository->findsuspensiById($id);

		if(empty($suspensi))
		{
			Flash::error('suspensi not found');
			return redirect(route('suspensis.index'));
		}

		return view('suspensis.show')->with('suspensi', $suspensi);
	}

	/**
	 * Show the form for editing the specified suspensi.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$suspensi = $this->suspensiRepository->findsuspensiById($id);

		if(empty($suspensi))
		{
			Flash::error('suspensi not found');
			return redirect(route('suspensis.index'));
		}

		return view('suspensis.edit')->with('suspensi', $suspensi);
	}

	/**
	 * Update the specified suspensi in storage.
	 *
	 * @param  int    $id
	 * @param CreatesuspensiRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatesuspensiRequest $request)
	{
		$suspensi = $this->suspensiRepository->findsuspensiById($id);

		if(empty($suspensi))
		{
			Flash::error('suspensi not found');
			return redirect(route('suspensis.index'));
		}

		$suspensi = $this->suspensiRepository->update($suspensi, $request->all());

		Flash::message('suspensi updated successfully.');

		return redirect(route('suspensis.index'));
	}

	/**
	 * Remove the specified suspensi from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$suspensi = $this->suspensiRepository->findsuspensiById($id);

		if(empty($suspensi))
		{
			Flash::error('suspensi not found');
			return redirect(route('suspensis.index'));
		}

		$suspensi->delete();

		Flash::message('suspensi deleted successfully.');

		return redirect(route('suspensis.index'));
	}

}
