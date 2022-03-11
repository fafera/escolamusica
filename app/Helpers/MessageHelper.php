<?php 
namespace App\Helpers;

use Illuminate\Support\Collection;

class MessageHelper {
    public static function createMessageObject(string $status, string $message) {
        return collect(['message' => $message, 'status' => $status]);
        //dd($collection);
    }
    
}
?>