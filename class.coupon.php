<?php
/**
 * Class to handle coupon operations
 * 
 * @author Joash Pereira
 * @date  2015-11-06
 */
class coupon {
	// MASK FORMAT [XXX-XXX]
	// 'X' this is random symbols
	// '-' this is sepatator
	public static function generate($length=6, $prefix='', $suffix='', $numbers=true, $letters=true, $symbols=false, $random_register=false, $mask=false) {
		$numbers = $numbers == 'false' ? false : true ;
		$letters = $letters == 'false' ? false : true ;
		$symbols = $symbols == 'true' ? true : false ;
		$random_register = $random_register == 'true' ? true : false ;
		$mask = $mask == 'false' ? false : $mask ;

		$numbers_a   = array(0,1,2,3,4,5,6,7,8,9);
		$lowercase = array('q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m');
		$uppercase = array('Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');
		$symbols_a = array('`','~','!','@','#','$','%','^','&','*','(',')','-','_','=','+','\\','|','/','[',']','{','}','"',"'",';',':','<','>',',','.','?');

		$string = Array();
		$coupon = '';
		if ($letters) {
			if ($random_register) {
				$string = array_merge($string, $lowercase, $uppercase);
			} else {
				$string = array_merge($string, $uppercase);
			}
		}

		if ($numbers) {
			$string = array_merge($string, $numbers_a);
		}

		if ($symbols) {
			$string = array_merge($string, $symbols_a);
		}

		if ($mask) {
			for ($i=0; $i < strlen($mask); $i++) { 
				if ($mask[$i] === 'X') {
					$coupon .= $string[rand(0, count($string)-1)];
				} else {
					$coupon .= $mask[$i];
				}
			}
		} else {
			for ($i=0; $i < $length ; $i++) { 
				$coupon .= $string[rand(0, count($string)-1)];
			}
		}

		return $prefix . $coupon . $suffix;
	}

	public static function generate_coupons($no_of_coupons=1, $length=6, $prefix='', $suffix='', $numbers=true, $letters=true, $symbols=false, $random_register=false, $mask=false) {
		$coupons = array();

		for ($i = 0; $i < $no_of_coupons; $i++) { 
			$tenp = '';
			$temp = self::generate($length, $prefix, $suffix, $numbers, $letters, $symbols, $random_register, $mask);
			array_push($coupons, $temp);
		}

		return $coupons;
	}


	public static function generate_coupons_to_xls($no_of_coupons=1, $length=6, $prefix='', $suffix='', $numbers=true, $letters=true, $symbols=false, $random_register=false, $mask=false) {
		header("Content-Type: application/vnd.ms-excel");

		echo 'Coupon Codes' . "\t\n";

		for ($i = 0; $i < $no_of_coupons; $i++) { 
			$tenp = '';
			$temp = self::generate($length, $prefix, $suffix, $numbers, $letters, $symbols, $random_register, $mask);
			echo $temp . "\t\n";	
		}

		header("Content-disposition: attachment; filename=coupons.xls");
	}
}