<?php
namespace App\evaLib\Services;

/**
 * Alters a query to be executed using dynamic paramers provided via URL
 */
class FilterQuery
{
    /**
     *
     * @param Illuminate\Database\Query\Builder $query
     * @param Illuminate\Http\Request $request
     *
     * Pulls from URL query options to modify the query that is going to be executed,
     * this allows to have a dynamic queries using the same url endpoints
     * this is useful when we have a query for all elements and want to filter by category, or type, etc.
     *
     * query options could injected through URL via this params
     *
     *    *** filtered: parameters to alter the where part of the query that means to filter the query
     *                  is accepts a JSON array of filters in the form:
     *                    [{"id":"column","value":"anyvalue","comparator":"anycomparator}]
     * comparator could be:
     *     +   '='
     *     +   'like'
     *     +   '>'
     *     +   '<'
     *     +   in general all posible comparators allowed by mongodb 
     *
     *
     *    *** orderBy:  parameters to change the order of the query maybe by date, name or any order
     *               [{"id":"column","order":"desc|asc"}]
     *
     * Exmaple of filtered param:
     *  ```
     *  filtered=[{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]
     *  ```
     *
     * Example of orderBy param:
     *  ```
     *  orderBy=[{"id":"name","order":"desc"}]
     *
     * @return Illuminate\Database\Query\Builder $query  the altered query with the order and filter options provided by url params filtered and orderBy
     */
    public static function addDynamicQueryFiltersFromUrl($query, $request)
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

            if (!is_array($condition->value)) {
                $query->where($condition->id, $comparator, $condition->value);
            } else {
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
