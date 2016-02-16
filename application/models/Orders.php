<?php

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class Orders extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('orders', 'num');
    }

    // add an item to an order
    function add_item($num, $code) {
        $CI = & get_instance();
		if ($CI->orderitems->exists($num, $code))
		{
			$record = $CI->oderitems->get($num, $code);
			$record->quantity++;
			$CI->orderitems->update($record);
		}
		else{
			$record = $CI->orderitems->create();
			$record->order = $num;
			$record->item = $code;
			$record->quantity = 1;
			$CI->orderitems->add($record);
		}
    }

    // calculate the total for an order
    function total($num) {
        return 0.0;
    }

    // retrieve the details for an order
    function details($num) {
        
    }

    // cancel an order
    function flush($num) {
        
    }

    // validate an order
    // it must have at least one item from each category
    function validate($num) {
        return false;
    }

}
