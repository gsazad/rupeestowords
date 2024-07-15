# RupeesToWords

The RupeesToWords PHP library provides functionality to convert a given number into words for Indian currency in multiple Indian languages, including English, Hindi, Punjabi, Gujarati, and more. It is designed for use with Composer, making it easy to integrate into your PHP projects. Whether you need to generate invoice amounts, financial reports, or any other monetary representations, this library ensures that the numbers are accurately and appropriately expressed in words for the specified Indian language.

## Features

- Convert numbers into words for Indian currency.
- Supports multiple languages: English, Punjabi, Hindi, and Gujrati.

## Installation

Install the package via Composer:

```bash
composer require gsazad/rupeestowords
```


## Supported Languages

You can specify the language parameter to convert the numbers into words in the desired language. The supported language parameters are:

```
English:    "en" or default
Punjabi:    "pa"
Gujrati:    "gu"
Hindi:      "hi"
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