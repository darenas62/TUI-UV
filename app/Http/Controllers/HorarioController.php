<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateHorarioRequest;
use App\Models\Horario;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class HorarioController extends AppBaseController
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
		$query = Horario::query();
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

        $horarios = $query->get();

        return view('horarios.index')
            ->with('horarios', $horarios)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Horario.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('horarios.create');
	}

	/**
	 * Store a newly created Horario in storage.
	 *
	 * @param CreateHorarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateHorarioRequest $request)
	{
        $input = $request->all();

		$horario = Horario::create($input);

		Flash::message('Horario saved successfully.');

		return redirect(route('horarios.index'));
	}

	/**
	 * Display the specified Horario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$horario = Horario::find($id);

		if(empty($horario))
		{
			Flash::error('Horario not found');
			return redirect(route('horarios.index'));
		}

		return view('horarios.show')->with('horario', $horario);
	}

	/**
	 * Show the form for editing the specified Horario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$horario = Horario::find($id);

		if(empty($horario))
		{
			Flash::error('Horario not found');
			return redirect(route('horarios.index'));
		}

		return view('horarios.edit')->with('horario', $horario);
	}

	/**
	 * Update the specified Horario in storage.
	 *
	 * @param  int    $id
	 * @param CreateHorarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateHorarioRequest $request)
	{
		/** @var Horario $horario */
		$horario = Horario::find($id);

		if(empty($horario))
		{
			Flash::error('Horario not found');
			return redirect(route('horarios.index'));
		}

		$horario->fill($request->all());
		$horario->save();

		Flash::message('Horario updated successfully.');

		return redirect(route('horarios.index'));
	}

	/**
	 * Remove the specified Horario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Horario $horario */
		$horario = Horario::find($id);

		if(empty($horario))
		{
			Flash::error('Horario not found');
			return redirect(route('horarios.index'));
		}

		$horario->delete();

		Flash::message('Horario deleted successfully.');

		return redirect(route('horarios.index'));
	}
}
