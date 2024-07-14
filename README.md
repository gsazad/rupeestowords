# RupeesToWords

The `RupeesToWords` package converts Indian currency from digits to words. This package supports English, Punjabi, Hindi and Gurhrati languages, with plans to add more Indian languages in the future.

## Features

- Convert numbers into words for Indian currency.
- Supports multiple languages: English, Punjabi, and Hindi.

## Installation

Install the package via Composer:

```bash
composer require gsazad/rupeestowords
```


## Supported Languages

You can specify the language parameter to convert the numbers into words in the desired language. The supported language parameters are:

```
English: "en" or default
Punjabi: "pa"
Gujrati: "gu"
Hindi: "hi"
```

## Example
```php
$rupeesToWords = new Rupeestowords();
$num = 1234.56;

echo $rupeesToWords->convert($num); // Output: one thousand two hundred thirty four rupees and fifty six paise

echo $rupeesToWords->convert($num, 'pa'); // Output: ਇੱਕ ਹਜ਼ਾਰ ਦੋ ਸੌ ਚੌਂਤੀ ਰੁਪਏ ਅਤੇ ਛਪਿੰਜਾ ਪੈਸੇ

echo $rupeesToWords->convert($num, 'hi'); // Output: एक हजार दो सौ चौंतीस रुपये और छप्पन पैसे

echo $rupeesToWords->convert($num, 'gu'); //એક હજાર બે સો ચોત્રીસ રૂપિયા અને છપ્પન પૈસા
```