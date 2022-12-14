<?php
$data = array(
    "data" => array(
        array(
            "event_name" => "Purchase",
            "event_time" => time(),
            "user_data" => array(
                "client_ip_address" => $ip,
                "client_user_agent" => $browser,
                "em" => $email,
                "ph" => $phone,
                "fbc" => '',
                "fbp" => ''
            ),
            "custom_data" => array(
                "currency" => "USD",
                "value"    => $order_total,
            ),
            "action_source" => "website",
            "event_source_url"  => $fullURL,
        ),
    ),
    "access_token" => "{Access Token}"
);
$dataString = json_encode($data);
$ch = curl_init('https://graph.facebook.com/v12.0/{PIxel ID}/events');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($dataString)
    )
);
$response = curl_exec($ch);
