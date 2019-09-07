<?php

namespace Oosian\LaravelWorld;

use DB;
use Oosian\LaravelWorld\Models\City;
use Oosian\LaravelWorld\Models\State;
use Oosian\LaravelWorld\Models\Country;

//todo add
class World
{

    /**
     * insertCountry function
     *
     * @param [associative array] $record
     *
     * @return void
     */
    public function insertCountry($record)
    {
        return Country::create($record);
    }


    /**
     * insertState function
     *
     * @param [associative array] $record
     *
     * @return void
     */
    public function insertState($record)
    {
        return State::create($record);            ;
    }

    /**
     * insertCity function
     *
     * @param [associative array] $record
     *
     * @return void
     */
    public function insertCity($record)
    {
        return City::create($record);            ;
    }

    /**
     * bulkInsertCountries function
     *
     * @param [array of associative arrays] $records
     *
     * @return [1 for success | 0 for failure ]
     */
    public function bulkInsertCountries(...$records)
    {
        DB::beginTransaction();
        foreach ($records as  $record) {
            $created = Country::create($record);
            if(is_null($created)){
                DB::rollback();
                return 0;
            }    
        }
        DB::commit();
        return 1;
    }

     /**
     * bulkInsertStates function
     *
     * @param [array of associative arrays] $records
     *
     * @return [1 for success | 0 for failure ]
     */
    public function bulkInsertStates(...$records)
    {
        DB::beginTransaction();
        foreach ($records as  $record) {
            $created = State::create($record);
            if(is_null($created)){
                DB::rollback();
                return 0;
            }    
        }
        DB::commit();
        return 1;
    }

     /**
     * bulkInsertCities function
     *
     * @param [array of associative arrays] $records
     *
     * @return [1 for success | 0 for failure ]
     */
    public function bulkInsertCities(...$records)
    {
        DB::beginTransaction();
        foreach ($records as  $record) {
            $created = City::create($record);
            if(is_null($created)){
                DB::rollback();
                return 0;
            }    
        }
        DB::commit();
        return 1;
    }

    /**
     * getCountries function
     *
     * @param [int|null] $id
     *
     * @return void
     */
    public function getCountries($id=null)
    {
        if (\is_null($id))
            return Country::all();

        return $this->getCountryById($id);
    
    }    
    
    /**
     * getCountries function
     *
     * @param [int|null] $id
     *
     * @return void
     */
    public function getStates($id=null)
    {
        if (\is_null($id))
            return State::all();

        return $this->getStateById($id);
    }
    
    /**
     * getCities function
     *
     * @param [int|null] $id
     *
     * @return void
     */
    public function getCities($id=null)
    {
        if (\is_null($id))
            return City::all();

        return $this->getCityById($id);
    }

    /**
     * getCountryById function
     *
     * @param integer ...$id
     *
     * @return void
     */
    public function getCountryById(int ...$id)
    {    
        return Country::findOrFail($id);
    }

    /**
     * getStateById function
     *
     * @param integer ...$id
     *
     * @return void
     */
    public function getStateById(int ...$id)
    {    
        return State::findOrFail($id);
    }


    /**
     * getCityById function
     *
     * @param integer ...$id
     *
     * @return void
     */
    public function getCityById(int ...$id)
    {    
        return City::findOrFail($id);
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
        //todo db exception handling
        return Country::where('id',$id)->delete();            ;
    }

    /**
     * updateCountries function
     *
     * @param [associative array] $conditions
     * @param [associative array] $updates
     *
     * @return [1 for success | 0 for failure ]
     */
    public function updateCountries($conditions, $updates)
    {
        return Country::where($conditions)->update($updates);            ;
    }
}