<?php 
namespace App\helpers;
use App\Models\Order;
use Auth;

class Help 
{
	

	public static function affiliateStatus($is_affiliate){
		switch ($is_affiliate) {
			case '1':
				return "No";
				break;
			case '2':
				return "Pending";
			case '3':
				return "Approved";
				break;
			case '4':
				return "Canceled";
				break;
		}
	}

	public static function withdrawStatus($status){
		switch ($status) {
			case '1':
				return "Pending";
				break;
			case '2':
				return "Approved";
			case '3':
				return "Canceled";
				break;
			case '4':
			    return "Completed";
			    break;
		}
	}


		public static function relationStatus($status){
		switch ($status) {
			case '1':
				return "Single";
				break;
			case '2':
				return "Engaged";
				break;
			case '3':
				return "Maried";
				break;
			case '4':
			    return "Divorced";
			    break;
			 case '5':
			 	return "In a Relationship";
			 	break;
		}
	}


	public static function totalProSell(){
		$orders=Order::where('status',3)->get();
		$numOfProSell=0;
		  foreach ($orders as $order){
		    $data=json_decode($order['product_data'],true);
		        for ($i=0; $i <count($data) ; $i++) { 
		           if($data[$i]['user_id']===Auth::user()->id){
		              $numOfProSell +=1;
		           }
		        }
		    }
		return $numOfProSell;
	}

	
	
}
