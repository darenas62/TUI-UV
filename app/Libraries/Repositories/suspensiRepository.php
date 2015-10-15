<?php

namespace App\Libraries\Repositories;


use App\Models\suspensi;
use Illuminate\Support\Facades\Schema;

class suspensiRepository
{

	/**
	 * Returns all suspensis
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return suspensi::all();
	}

	public function search($input)
    {
        $query = suspensi::query();

        $columns = Schema::getColumnListing('suspensis');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores suspensi into database
	 *
	 * @param array $input
	 *
	 * @return suspensi
	 */
	public function store($input)
	{
		return suspensi::create($input);
	}

	/**
	 * Find suspensi by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|suspensi
	 */
	public function findsuspensiById($id)
	{
		return suspensi::find($id);
	}

	/**
	 * Updates suspensi into database
	 *
	 * @param suspensi $suspensi
	 * @param array $input
	 *
	 * @return suspensi
	 */
	public function update($suspensi, $input)
	{
		$suspensi->fill($input);
		$suspensi->save();

		return $suspensi;
	}
}