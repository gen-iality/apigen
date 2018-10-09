<?php
/**
 *
 */
namespace App\evaLib\Services;

use App\EventUser;
use App\OrganizationUser;
use App\User;
use App\Rol;
use App\State;
use Storage;

class FilterQuery
{
    public static function FilterQueryService($query, $request)
    {
            $filteredBy = json_decode($request->input('filtered'));
            $filteredBy = is_array($filteredBy) ? $filteredBy : [$filteredBy];

            $orderedBy = json_decode($request->input('orderBy'));
            $orderedBy = is_array($orderedBy) ? $orderedBy : [$orderedBy];

            foreach ((array) $filteredBy as $condition) {
                if (!$condition || !isset($condition->id) || !isset($condition->value)) {
                    continue;
                }

                //for any eventUser inner properties enable text like partial search by default is the most common use case
                if (strpos($condition->id, 'properties.') === 0) {
                    $condition->comparator = "like";
                }

                //if like comparator is stated add partial search using %% symbols
                $comparator = (isset($condition->comparator)) ? $condition->comparator : "=";
                if (strtolower($comparator) == "like") {
                    $condition->value = "%" . $condition->value . "%";
                }


                if (!is_array($condition->value))
                {   
                    $query->where($condition->id, $comparator, $condition->value);
                }
                else
                {
                    $query->whereIn($condition->id, $condition->value);
                }
            }

            foreach ((array) $orderedBy as $order) {

                if (!isset($order->id)) {
                    continue;
                }

                $direccion = (isset($order->order) && $order->order) ? $order->order : "desc";
                $query->orderBy($order->id, $direccion);

            }

        return $query;
    }


}
