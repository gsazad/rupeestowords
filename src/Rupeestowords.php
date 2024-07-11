<?php
class Rupeestowords
{

    public function convert($num, $lang = "en")
    {
        if ($lang == "en") {
            return $this->en($num);
        } elseif ($lang == "hi") {
            return $this->hi($num);
        } elseif ($lang == "pi") {
            return $this->pi($num);
        } else {
            return "Language not supported. Supported languages are en, hi, pi.";
        }
    }

    private function en($num)
    {
        $ones = array(
            0 => "",
            1 => "One",
            2 => "Two",
            3 => "Three",
            4 => "Four",
            5 => "Five",
            6 => "Six",
            7 => "Seven",
            8 => "Eight",
            9 => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );

        $tens = array(
            0 => "",
            1 => "",
            2 => "Twenty",
            3 => "Thirty",
            4 => "Forty",
            5 => "Fifty",
            6 => "Sixty",
            7 => "Seventy",
            8 => "Eighty",
            9 => "Ninety"
        );

        $hundreds = array(
            "Hundred",
            "Thousand",
            "Lakh",
            "Crore"
        );

        $num = number_format($num, 2, ".", "");
        $num_arr = explode(".", $num);
        $whole_number = $num_arr[0];
        $decimal_number = $num_arr[1];

        $whole_number_arr = array_reverse(str_split($whole_number));
        $words = "";
        $place = 0;

        foreach ($whole_number_arr as $key => $digit) {
            if ($key % 2 == 0) {
                if ($key == 0) {
                    if ($digit != 0) {
                        $words = $ones[$digit] . " " . $words;
                    }
                } else {
                    if ($digit != 0) {
                        $words = $ones[$digit] . " " . $hundreds[$place] . " " . $words;
                    }
                    $place++;
                }
            } else {
                if ($digit != 0) {
                    if ($whole_number_arr[$key - 1] != 0) {
                        $words = $tens[$digit] . " " . $words;
                    } else {
                        $words = $ones[$digit * 10] . " " . $words;
                    }
                }
            }
        }

        $words = trim(preg_replace('/\s+/', ' ', $words));

        if ($decimal_number != "00") {
            $paise_words = $ones[$decimal_number[0]] . " " . $tens[$decimal_number[1]] . " Paise";
            $words .= " and " . trim(preg_replace('/\s+/', ' ', $paise_words));
        }

        return $words ? $words . " Rupees" : "Zero Rupees";
    }

    private function hi($num)
    {
        $ones = array(
            0 => "",
            1 => "एक",
            2 => "दो",
            3 => "तीन",
            4 => "चार",
            5 => "पाँच",
            6 => "छह",
            7 => "सात",
            8 => "आठ",
            9 => "नौ",
            10 => "दस",
            11 => "ग्यारह",
            12 => "बारह",
            13 => "तेरह",
            14 => "चौदह",
            15 => "पंद्रह",
            16 => "सोलह",
            17 => "सत्रह",
            18 => "अठारह",
            19 => "उन्नीस"
        );

        $tens = array(
            0 => "",
            1 => "",
            2 => "बीस",
            3 => "तीस",
            4 => "चालीस",
            5 => "पचास",
            6 => "साठ",
            7 => "सत्तर",
            8 => "अस्सी",
            9 => "नब्बे"
        );

        $hundreds = array(
            "सौ",
            "हज़ार",
            "लाख",
            "करोड़"
        );

        $num = number_format($num, 2, ".", "");
        $num_arr = explode(".", $num);
        $whole_number = $num_arr[0];
        $decimal_number = $num_arr[1];

        $whole_number_arr = array_reverse(str_split($whole_number));
        $words = "";
        $place = 0;

        foreach ($whole_number_arr as $key => $digit) {
            if ($key % 2 == 0) {
                if ($key == 0) {
                    if ($digit != 0) {
                        $words = $ones[$digit] . " " . $words;
                    }
                } else {
                    if ($digit != 0) {
                        $words = $ones[$digit] . " " . $hundreds[$place] . " " . $words;
                    }
                    $place++;
                }
            } else {
                if ($digit != 0) {
                    if ($whole_number_arr[$key - 1] != 0) {
                        $words = $tens[$digit] . " " . $words;
                    } else {
                        $words = $ones[$digit * 10] . " " . $words;
                    }
                }
            }
        }

        $words = trim(preg_replace('/\s+/', ' ', $words));

        if ($decimal_number != "00") {
            $paise_words = $ones[$decimal_number[0]] . " " . $tens[$decimal_number[1]] . " पैसे";
            $words .= " और " . trim(preg_replace('/\s+/', ' ', $paise_words));
        }

        return $words ? $words . " रुपये" : "शून्य रुपये";
    }

    private function pi($num)
    {
        $ones = array(
            0 => "",
            1 => "ਇੱਕ",
            2 => "ਦੋ",
            3 => "ਤਿੰਨ",
            4 => "ਚਾਰ",
            5 => "ਪੰਜ",
            6 => "ਛੇ",
            7 => "ਸੱਤ",
            8 => "ਅੱਠ",
            9 => "ਨੌ",
            10 => "ਦਸ",
            11 => "ਗਿਆਰਾਂ",
            12 => "ਬਾਰਾਂ",
            13 => "ਤੇਰਾਂ",
            14 => "ਚੌਦਾਂ",
            15 => "ਪੰਦਰਾਂ",
            16 => "ਸੋਲਾਂ",
            17 => "ਸਤਾਰਾਂ",
            18 => "ਅਠਾਰਾਂ",
            19 => "ਉਨਨੀ"
        );

        $tens = array(
            0 => "",
            1 => "",
            2 => "ਵੀਹ",
            3 => "ਤੀਹ",
            4 => "ਚਾਲੀ",
            5 => "ਪੰਜਾਹ",
            6 => "ਸਾਠ",
            7 => "ਸਤੱਤਰ",
            8 => "ਅੱਸੀ",
            9 => "ਨੱਬੇ"
        );

        $hundreds = array(
            "ਸੌ",
            "ਹਜ਼ਾਰ",
            "ਲੱਖ",
            "ਕਰੋੜ"
        );

        $num = number_format($num, 2, ".", "");
        $num_arr = explode(".", $num);
        $whole_number = $num_arr[0];
        $decimal_number = $num_arr[1];

        $whole_number_arr = array_reverse(str_split($whole_number));
        $words = "";
        $place = 0;

        foreach ($whole_number_arr as $key => $digit) {
            if ($key % 2 == 0) {
                if ($key == 0) {
                    if ($digit != 0) {
                        $words = $ones[$digit] . " " . $words;
                    }
                } else {
                    if ($digit != 0) {
                        $words = $ones[$digit] . " " . $hundreds[$place] . " " . $words;
                    }
                    $place++;
                }
            } else {
                if ($digit != 0) {
                    if ($whole_number_arr[$key - 1] != 0) {
                        $words = $tens[$digit] . " " . $words;
                    } else {
                        $words = $ones[$digit * 10] . " " . $words;
                    }
                }
            }
        }

        $words = trim(preg_replace('/\s+/', ' ', $words));

        if ($decimal_number != "00") {
            $paise_words = $ones[$decimal_number[0]] . " " . $tens[$decimal_number[1]] . " ਪੈਸੇ";
            $words .= " ਅਤੇ " . trim(preg_replace('/\s+/', ' ', $paise_words));
        }

        return $words ? $words . " ਰੁਪਏ" : "ਸ਼ੂਨਿਆ ਰੁਪਏ";
    }
}
