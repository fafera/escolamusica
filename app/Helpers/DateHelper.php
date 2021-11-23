<?php
namespace App\Helpers;

use Carbon\Carbon;

class DateHelper {
    public static function getWeekDaysOnMonth($weekDay, $month, $year) {
        $day = 1;
        $weekDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $quantity = 0;
        //strftime('%w', strtotime($year.'-'.$month.'-'.$day)
        while($day<=$weekDays) {
            if(Carbon::parse($year.'-'.$month.'-'.$day)->format('w') == $weekDay) {
                $quantity++;
            }
            $day++;
        }
        return $quantity;
    }
    public static function formatBRTimeToTimestamp($time) {
        $time = str_replace('h', ':', $time);
        $time = Carbon::createFromTimeString($time);
        return $time->format('H:i:s');
    }
    public static function formatTimestampToBRTime($hour) {
        $hour = date('H:i', strtotime($hour));
        $hour = str_replace(":","h", $hour);
        return $hour;
    }
    public static function formatBRDateToSqlDate($date) {
        $date = str_replace('/', '-', $date);
        return date('Y-m-d', strtotime($date));
    }
    public static function formatSQLDateToBRDate($date) {
        return date('d/m/Y', strtotime($date));
    }
    public static function getWeekDay($day) {
        switch ($day) {
            case '1':
                return 'Segunda-feira';
                break;
            case '2':
                return 'Terça-feira';
                break;
            case '3':
                return 'Quarta-feira';
                break;
            case '4':
                return 'Quinta-feira';
                break;
            case '5':
                return 'Sexta-feira';
                break;
            case '6':
                return 'Sábado';
                break;
            default:
                return "null";
                break;
        }
    }
    public static function switchWeekDay($day) {
        switch ($day) {
            case 'Segunda-feira':
                return '1';
                break;
            case 'Terça-feira':
                return '2';
                break;
            case 'Quarta-feira':
                return '3';
                break;
            case 'Quinta-feira':
                return '4';
                break;
            case 'Sexta-feira':
                return '5';
                break;
            case 'Sábado':
                return '6';
                break;
            default:
                return "null";
                break;
        }
    }
    public static function getMonthName($month) {
        switch ($month) {
            case '1':
                return 'Janeiro';
                break;
            case '2':
                return 'Fevereiro';
                break;
            case '3':
                return 'Março';
                break;
            case '4':
                return 'Abril';
                break;
            case '5':
                return 'Maio';
                break;
            case '6':
                return 'Junho';
                break;
            case '7':
                return 'Julho';
                break;
            case '8':
                return 'Agosto';
                break;
            case '9':
                return 'Setembro';
                break;
            case '10':
                return 'Outubro';
                break;
            case '11':
                return 'Novembro';
                break;
            case '12':
                return 'Dezembro';
                break;
            default:
                return "null";
                break;
        }
    }
    public static function parseMonthYearBRDate($date) {
        $date = explode('/', $date);
        if(count($date) < 3) {
            $day = 1;
            $month = $date[0];
            $year = $date[1];
        } else {
            $day = $date[0];
            $month = $date[1];
            $year = $date[2];
        }
        return Carbon::createFromDate($year, $month, $day);
    }

}
?>