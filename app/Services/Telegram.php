<?php


namespace App\Services;


class Telegram
{
    static public function sendMessageOnAdminGroup(string $message)
    {
        $token = env('BOT_ADMIN_ID');

        $getQuery = [
            "chat_id" 	=> env('CHANNEL_ADMIN_ID'),
            "text"  	=> $message,
            "parse_mode" => "html"
        ];
        $ch = curl_init("https://api.telegram.org/bot". $token ."/sendMessage?" . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $resultQuery = curl_exec($ch);
        curl_close($ch);

        return $resultQuery;
    }
}
