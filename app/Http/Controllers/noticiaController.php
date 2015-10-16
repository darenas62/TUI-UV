<?php
namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class noticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $noticias = Noticia::all();

        // load the view and pass the nerds
        return \View::make('noticias.index')
            ->with('noticias', $noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return \View::make('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titulo'       => 'required',
            'contenido'      => 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('noticias/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {
            // store
            $noticia = new Noticia;
            $noticia->titulo       = \Input::get('titulo');
            $noticia->contenido      = \Input::get('contenido');
            $noticia->save();

            // redirect
            \Session::flash('Mensaje', 'Noticia publicada correctamente');
            return \Redirect::to('noticias');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $noticia = Noticia::find($id);

        // show the view and pass the nerd to it
        return \View::make('noticias.show')
            ->with('noticia', $noticia);
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
        $noticia = Noticia::find($id);

        // show the edit form and pass the nerd
        return \View::make('noticias.edit')
            ->with('noticia', $noticia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, $id)
    {
        //
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titulo'       => 'required',
            'contenido'      => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('noticias/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {
            // store
            $noticia = Noticia::find($id);
            $noticia->titulo       = \Input::get('titulo');
            $noticia->contenido      = \Input::get('contenido');
            $noticia->save();

            // redirect
            \Session::flash('message', 'Noticia actualizada con exito!');
            return \Redirect::to('noticias');
        }
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
        $noticia = Noticia::find($id);
        $noticia->delete();

        // redirect
        \Session::flash('message', 'La noticia ha sido borrada exitosamente!');
        return \Redirect::to('noticias');
    }
    public function postNotify(Request $request)
    {
        $notifyText = e($request->input('notify_text'));
        $pusher = App::make('pusher');

        $pusher->trigger( 'canal-suspension',
                          'evento-suspension', 
                          array('text' => $notifyText));

        // TODO: Get Pusher instance from service container

        // TODO: The notification event data should have a property named 'text'

        // TODO: On the 'notifications' channel trigger a 'new-notification' event
    }

}
