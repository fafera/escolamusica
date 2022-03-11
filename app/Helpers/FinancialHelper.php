<?php
namespace App\Helpers;

class FinancialHelper {
    public static function getPercentage($value, $percent) {
        return $value * ($percent/100);
    }
    public static function formatToBRL($value) {
      return "R$".str_replace('.',',', $value);
    }
    public static function formatBRLtoDecimal($value) {
      if(strpos($value, 'R$') !== false) {
        $value = str_replace('R$', '', $value);
        return number_format(str_replace(",",".",str_replace(".","",$value)), 2, '.', '');
      } elseif(strpos($value, ',') !== false) {
        return number_format(str_replace(",",".",str_replace(".","",$value)), 2, '.', '');
      }
      return $value;
    }
}
?>