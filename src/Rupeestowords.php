<?php
namespace Gsazad\Rupeestowords;

class Rupeestowords
{

    public function convert($num, $lang = "en")
    {
        if ($lang == "en") {
            return $this->en($num);
        } elseif ($lang == "hi") {
            return $this->hi($num);
        } elseif ($lang == "pa") {
            return $this->pa($num);
        } else {
            return "Language not supported. Supported languages are en, hi, pi.";
        }
    }
    private function en($num){
        if($num == null || !is_numeric($num)){
            return "Please enter a valid number";
        }
        if($num == 0){
            return strtolower("Zero Rupees");
        }
        if($num > 999999999){
            return "Sorry This does not support more than 999999999 Rupees";
        }
        if($num < 0){
            return "Negative Rupees not supported";
        }
        

        $num = number_format($num, 2, ".", "");
        $num_arr = explode(".", $num);
        $whole_number = $num_arr[0];
        $decimal_number = $num_arr[1];
        if(strlen($decimal_number) == 1){
            $decimal_number = $decimal_number . "0";
        }
        $end_rupees = " Rupees";
        if($whole_number == 1){
            $end_rupees = " Rupee";
        }
        $end_paise = " Paise";
        if($decimal_number == 1){
            $end_paise = " Paisa";
        }
        if($decimal_number != "00"){
            return strtolower($this->numberToWordsRupees($whole_number) . " $end_rupees and " . $this->numberToWordsRupees($decimal_number) . $end_paise);
        }
        

        return strtolower($this->numberToWordsRupees($whole_number). $end_rupees);
    }
    private function hi($num){
       $words = $this->en($num);
       $en_hi_two = array(
        'twenty one' => 'इक्कीस',
        'twenty two' => 'बाईस',
        'twenty three' => 'तेईस',
        'twenty four' => 'चौबीस',
        'twenty five' => 'पच्चीस',
        'twenty six' => 'छब्बीस',
        'twenty seven' => 'सत्ताईस',
        'twenty eight' => 'अट्ठाईस',
        'twenty nine' => 'उनतीस',
        'thirty one' => 'इकतीस',
        'thirty two' => 'बत्तीस',
        'thirty three' => 'तैंतीस',
        'thirty four' => 'चौंतीस',
        'thirty five' => 'पैंतीस',
        'thirty six' => 'छत्तीस',
        'thirty seven' => 'सैंतीस',
        'thirty eight' => 'अड़तीस',
        'thirty nine' => 'उनतालीस',
        'forty one' => 'इकतालीस',
        'forty two' => 'बयालीस',
        'forty three' => 'तैंतालीस',
        'forty four' => 'चौवालीस',
        'forty five' => 'पैंतालीस',
        'forty six' => 'छियालीस',
        'forty seven' => 'सैंतालीस',
        'forty eight' => 'अड़तालीस',
        'forty nine' => 'उनचास',
        'fifty one' => 'इक्यावन',
        'fifty two' => 'बावन',
        'fifty three' => 'तिरपन',
        'fifty four' => 'चौवन',
        'fifty five' => 'पचपन',
        'fifty six' => 'छप्पन',
        'fifty seven' => 'सत्तावन',
        'fifty eight' => 'अट्ठावन',
        'fifty nine' => 'उनसठ',
        'sixty one' => 'इकसठ',
        'sixty two' => 'बासठ',
        'sixty three' => 'तिरसठ',
        'sixty four' => 'चौंसठ',
        'sixty five' => 'पैंसठ',
        'sixty six' => 'छियासठ',
        'sixty seven' => 'सड़सठ',
        'sixty eight' => 'अड़सठ',
        'sixty nine' => 'उनहत्तर',
        'seventy one' => 'इकहत्तर',
        'seventy two' => 'बहत्तर',
        'seventy three' => 'तिहत्तर',
        'seventy four' => 'चौहत्तर',
        'seventy five' => 'पचहत्तर',
        'seventy six' => 'छिहत्तर',
        'seventy seven' => 'सतहत्तर',
        'seventy eight' => 'अठहत्तर',
        'seventy nine' => 'उनासी',
        'eighty one' => 'इक्यासी',
        'eighty two' => 'बयासी',
        'eighty three' => 'तिरासी',
        'eighty four' => 'चौरासी',
        'eighty five' => 'पचासी',
        'eighty six' => 'छियासी',
        'eighty seven' => 'सतासी',
        'eighty eight' => 'अट्ठासी',
        'eighty nine' => 'नवासी',
        'ninety one' => 'इक्यानवे',
        'ninety two' => 'बानवे',
        'ninety three' => 'तिरानवे',
        'ninety four' => 'चौरानवे',
        'ninety five' => 'पचानवे',
        'ninety six' => 'छियानवे',
        'ninety seven' => 'सत्तानवे',
        'ninety eight' => 'अट्ठानवे',
        'ninety nine' => 'निन्यानवे',
       );

       $en_hi_one = array(
        'zero' => 'शून्य',
        'one' => 'एक',
        'two' => 'दो',
        'three' => 'तीन',
        'four' => 'चार',
        'five' => 'पांच',
        'six' => 'छह',
        'seven' => 'सात',
        'eight' => 'आठ',
        'nine' => 'नौ',
        'ten' => 'दस',
        'eleven' => 'ग्यारह',
        'twelve' => 'बारह',
        'thirteen' => 'तेरह',
        'fourteen' => 'चौदह',
        'fifteen' => 'पंद्रह',
        'sixteen' => 'सोलह',
        'seventeen' => 'सत्रह',
        'eighteen' => 'अठारह',
        'nineteen' => 'उन्नीस',
        'twenty' => 'बीस',
        'thirty' => 'तीस',
        'forty' => 'चालीस',
        'fifty' => 'पचास',
        'sixty' => 'साठ',
        'seventy' => 'सत्तर',
        'eighty' => 'अस्सी',
        'ninety' => 'नब्बे',
        'hundred' => 'सौ',
        'thousand' => 'हजार',
        'lakh' => 'लाख',
        'lakhs' => 'लाख',
        'crore' => 'करोड़',
        'and' => 'और',
        'rupees' => 'रुपये',
        'rupee' => 'रुपया',
        'paise' => 'पैसे',
        'paisa'=> 'पैसा',
        '&amp;' => 'और'
       );
       $hindi = strtr($words, $en_hi_two);
         $hindi = strtr($hindi, $en_hi_one);

         return $hindi;

    }
    private function pa($num){
        //punjabi
        $words = $this->en($num);
        $en_two = array(
         'twenty one' => 'ਇਕੀ',
         'twenty two' => 'ਬਾਈ',
         'twenty three' => 'ਤੇਈ',
         'twenty four' => 'ਚੌਵੀ',
         'twenty five' => 'ਪੱਚੀ',
         'twenty six' => 'ਛੱਬੀ',
         'twenty seven' => 'ਸਤਾਈ',
         'twenty eight' => 'ਅਠਾਈ',
         'twenty nine' => 'ਉਨੱਤੀ',
         'thirty one' => 'ਇਕੱਤੀ',
         'thirty two' => 'ਬੱਤੀ',
         'thirty three' => 'ਤੇਤੀ',
         'thirty four' => 'ਚੌਂਤੀ',
         'thirty five' => 'ਪੈਂਤੀ',
         'thirty six' => 'ਛੱਤੀ',
         'thirty seven' => 'ਸੈਂਤੀ',
         'thirty eight' => 'ਅਠੱਤੀ',
         'thirty nine' => 'ਉਨਤਾਲੀ',
         'forty one' => 'ਇਕਤਾਲੀ',
         'forty two' => 'ਬਤਾਲੀ',
         'forty three' => 'ਤਿਰਤਾਲੀ',
         'forty four' => 'ਚੌਤਾਲੀ',
         'forty five' => 'ਪੰਜਤਾਲੀ',
         'forty six' => 'ਛਿਆਲੀ',
         'forty seven' => 'ਸੰਤਾਲੀ',
         'forty eight' => 'ਅੱਠਤਾਲੀ',
         'forty nine' => 'ਉਣਿੰਜਾ',
         'fifty one' => 'ਇਕਵੰਜਾ',
         'fifty two' => 'ਬਵਿੰਜਾ',
         'fifty three' => 'ਤਰਵਿੰਜਾ',
         'fifty four' => 'ਚਰਿੰਜਾ',
         'fifty five' => 'ਪਚਵਿੰਜਾ',
         'fifty six' => 'ਛਪਿੰਜਾ',
         'fifty seven' => 'ਸਤਵਿੰਜਾ',
         'fifty eight' => 'ਅੱਠਵਿੰਜਾ',
         'fifty nine' => 'ਉਣਾਠ',
         'sixty one' => 'ਇਕਾਠ',
         'sixty two' => 'ਬਾਠ੍ਹ',
         'sixty three' => 'ਤਰੇਠ੍ਹ',
         'sixty four' => 'ਚੌਠ੍ਹ',
         'sixty five' => 'ਪੈਂਠ',
         'sixty six' => 'ਛਿਆਠ',
         'sixty seven' => 'ਸਤਾਹਠ',
         'sixty eight' => 'ਅਠਾਹਠ',
         'sixty nine' => 'ਉਣੱਤਰ',
         'seventy one' => 'ਇਕ੍ਹੱਤਰ',
         'seventy two' => 'ਬਹੱਤਰ',
         'seventy three' => 'ਤਹੱਤਰ',
         'seventy four' => 'ਚੌਹੱਤਰ',
         'seventy five' => 'ਪੰਜੱਤਰ',
         'seventy six' => 'ਛਿਹੱਤਰ',
         'seventy seven' => 'ਸਤੱਤਰ',
         'seventy eight' => 'ਅਠੱਤਰ',
         'seventy nine' => 'ਉਣਾਸੀ',
         'eighty one' => 'ਇਕਾਸੀ',
         'eighty two' => 'ਬਿਆਸੀ',
         'eighty three' => 'ਤਰਾਸੀ',
         'eighty four' => 'ਚੁਰਾਸੀ',
         'eighty five' => 'ਪਚਾਸੀ',
         'eighty six' => 'ਛਿਆਸੀ',
         'eighty seven' => 'ਸਤਾਸੀ',
         'eighty eight' => 'ਅਠਾਸੀ',
         'eighty nine' => 'ਉਣਾਨਵੇਂ',
         'ninety one' => 'ਇਕਾਨਵੇਂ',
         'ninety two' => 'ਬਿਆਨਵੇਂ',
         'ninety three' => 'ਤਰਾਨਵੇਂ',
         'ninety four' => 'ਚਰਾਨਵੇਂ',
         'ninety five' => 'ਪਚਾਨਵੇਂ',
         'ninety six' => 'ਛਿਆਨਵੇਂ',
         'ninety seven' => 'ਸਤਾਨਵੇਂ',
         'ninety eight' => 'ਅਠਾਨਵੇਂ',
         'ninety nine' => 'ਨਿੜਾਨਵੇਂ',
        );
 
        $en_one = array(
         'zero' => 'ਸਿਫਰ',
         'one' => 'ਇੱਕ',
         'two' => 'ਦੋ',
         'three' => 'ਤਿੰਨ',
         'four' => 'ਚਾਰ',
         'five' => 'ਪੰਜ',
         'six' => 'ਛੇ',
         'seven' => 'ਸੱਤ',
         'eight' => 'ਅੱਠ',
         'nine' => 'ਨੌਂ',
         'ten' => 'ਦਸ',
         'eleven' => 'ਗਿਆਰਾਂ',
         'twelve' => 'ਬਾਰਾਂ',
         'thirteen' => 'ਤੇਰਾਂ',
         'fourteen' => 'ਚੌਦਾਂ',
         'fifteen' => 'ਪੰਦਰਾਂ',
         'sixteen' => 'ਸੌਲਾਂ',
         'seventeen' => 'ਸਤਾਰਾਂ',
         'eighteen' => 'ਅਠਾਰਾਂ',
         'nineteen' => 'ਉਨੀ',
         'twenty' => 'ਵੀਹ',
         'thirty' => 'ਤੀਹ',
         'forty' => 'ਚਾਲੀ',
         'fifty' => 'ਪੰਜਾਹ',
         'sixty' => 'ਸੱਠ',
         'seventy' => 'ਸੱਤਰ',
         'eighty' => 'ਅੱਸੀ',
         'ninety' => 'ਨੱਬੇ',
         'hundred' => 'ਸੌ',
         'thousand' => 'ਹਜ਼ਾਰ',
         'lakh' => 'ਲੱਖ',
         'lakhs' => 'ਲੱਖ',
         'crore' => 'ਕਰੋੜ',
         'and' => 'ਅਤੇ',
         'rupees' => 'ਰੁਪਏ',
         'rupee' => 'ਰੁਪਿਆ',
         'paise' => 'ਪੈਸੇ',
            'paisa'=> 'ਪੈਸਾ',
         '&amp;' => 'ਅਤੇ'
        );
        $words = strtr($words, $en_two);
          $words = strtr($words, $en_one);
 
          return $words;
 
     }
 




    private function numberToWordsRupees($number){
        //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
        $words = array(
        '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
        '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
        '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
        '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
        '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
        '80' => 'eighty','90' => 'ninty');
        
        //First find the length of the number
        $number_length = strlen($number);
        //Initialize an empty array
        $number_array = array(0,0,0,0,0,0,0,0,0);        
        $received_number_array = array();
        
        //Store all received numbers into an array
        for($i=0;$i<$number_length;$i++){    
              $received_number_array[$i] = substr($number,$i,1);    
          }
    
        //Populate the empty array with the numbers received - most critical operation
        for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
            $number_array[$i] = $received_number_array[$j]; 
        }
    
        $number_to_words_string = "";
        //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
        for($i=0,$j=1;$i<9;$i++,$j++){
            //"01,23,45,6,78"
            //"00,10,06,7,42"
            //"00,01,90,0,00"
            if($i==0 || $i==2 || $i==4 || $i==7){
                if($number_array[$j]==0 || $number_array[$i] == "1"){
                    $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                    $number_array[$i] = 0;
                }
                   
            }
        }
    
        $value = "";
        for($i=0;$i<9;$i++){
            if($i==0 || $i==2 || $i==4 || $i==7){    
                $value = $number_array[$i]*10; 
            }
            else{ 
                $value = $number_array[$i];    
            }            
            if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
            if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
            if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
            if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
            if($i==6 && $value!=0){    $number_to_words_string.= "Hundred "; }            
    
        }
        if($number_length>9){
            $number_to_words_string = "Sorry This does not support more than 99 Crores";
        }
        return ucwords(strtolower($number_to_words_string));
    }
}