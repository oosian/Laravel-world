<?php

namespace Oosian\LaravelWorld;

use Illuminate\Support\Facades\DB;
use Oosian\LaravelWorld\Models\City;
use Oosian\LaravelWorld\Models\State;
use Illuminate\Database\Eloquent\Model;
use Oosian\LaravelWorld\Models\Country;

class World
{

    /**
     * insertCountry function
     * @param [associative array] $record
     * @return mixed
     */
    public function insertCountry(array $record)
    {
        return Country::create($record);
    }


    /**
     * insertState function
     *
     * @param [associative array] $record
     *
     * @return mixed
     */
    public function insertState(array $record)
    {
        return State::create($record);
    }

    /**
     * insertCity function
     *
     * @param [associative array] $record
     *
     * @return mixed
     */
    public function insertCity(array $record)
    {
        return City::create($record);
    }

    /**
     * bulkInsertCountries function
     *
     * @param [array of associative arrays] $records
     *
     * @return [1 for success | exception for failure ]
     */
    public function bulkInsertCountries(array $records)
    {
        $this->bulkInsert($records, Country::class);
    }

    /**
     * bulkInsertCountries function
     *
     * @param [array of associative arrays] $records
     * @param Model $model
     *
     * @return [1 for success | exception for failure ]
     */
    public function bulkInsert(array $records, Model $model)
    {
        try {
            DB::beginTransaction();
            $model::insert($records);
        } catch (\Exception $exception) {
            DB::rollback();
            throw $exception;
        }
        DB::commit();
        return 1;
    }

    /**
     * bulkInsertStates function
     *
     * @param [array of associative arrays] $records
     *
     * @return [1 for success | exception for failure ]
     */
    public function bulkInsertStates(array $records)
    {
        $this->bulkInsert($records, State::class);
    }

    /**
     * bulkInsertCities function
     *
     * @param [array of associative arrays] $records
     *
     * @return [1 for success | exception for failure ]
     */
    public function bulkInsertCities(array $records)
    {
        $this->bulkInsert($records, City::class);
    }

    /**
     * getCountries function
     *
     * @param [int|null] $id
     *
     * @return mixed
     */
    public function getCountries(int $id = null)
    {
        if (\is_null($id))
            return Country::all();

        return $this->getCountryById($id);

    }

    /**
     * getCountryById function
     *
     * @param integer ...$id
     *
     * @return mixed
     */
    public function getCountryById(int ...$id)
    {
        return Country::findOrFail($id);
    }

    /**
     * getCountries function
     *
     * @param [int|null] $id
     *
     * @return mixed
     */
    public function getStates(int $id = null)
    {
        if (\is_null($id))
            return State::all();

        return $this->getStateById($id);
    }

    /**
     * getStateById function
     *
     * @param integer ...$id
     *
     * @return mixed
     */
    public function getStateById(int ...$id)
    {
        return State::findOrFail($id);
    }

    /**
     * getCities function
     *
     * @param [int|null] $id
     *
     * @return mixed
     */
    public function getCities(int $id = null)
    {
        if (\is_null($id))
            return City::all();

        return $this->getCityById($id);
    }

    /**
     * getCityById function
     *
     * @param integer ...$id
     *
     * @return mixed
     */
    public function getCityById(int ...$id)
    {
        return City::findOrFail($id);
    }

    /**
     * get model data by name
     * @param $model
     * @param $name
     * @return mixed
     */
    public function getModelByName($model, $name)
    {
        return $model::where('name', "=", $name)->get();
    }

    /**
     * get City data by name
     * @param $name
     * @return mixed
     */
    public function getCityByName($name)
    {
        return $this->getModelByName('City', $name);
    }

    /**
     * get Country data by name
     * @param $name
     * @return mixed
     */
    public function getCountryByName($name)
    {
        return $this->getModelByName('Country', $name);
    }


    /**
     * get State data by name
     * @param $name
     * @return mixed
     */
    public function getStateByName($name)
    {
        return $this->getModelByName('State', $name);
    }

    /**
     * deleteCountryById function
     *
     * @param integer ...$id
     *
     * @return [1 for success | 0 for failure ]
     */
    public function deleteCountryById(int ...$id)
    {
        return Country::where('id', $id)->delete();
    }

    /**
     * updateCountries function
     *
     * @param [associative array] $conditions
     * @param [associative array] $updates
     *
     * @return [1 for success | 0 for failure ]
     */
    public function updateCountries(array $conditions, array $updates)
    {
        return Country::where($conditions)->update($updates);
    }
}