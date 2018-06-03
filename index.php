<?php
$access_token = '9G7umqWJQG5iSqeGem3E4iYGap1DcuIpV2O6UldOppui5boyKfuoBifVC8lOmcq7w5Ua+oVVloOTlztg9TvZA5wkP2UBe+RmEVK38bdEuzlOjzwbADdMtnkHXQcUzz8N3/WYxwic+ouuIXn4y51SzAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$Light = file_get_contents('https://api.thingspeak.com/channels/509782/fields/3/last.txt');
$HUM = file_get_contents('https://api.thingspeak.com/channels/509782/fields/2/last.txt');
$TEM = file_get_contents('https://api.thingspeak.com/channels/509782/fields/1/last.txt');
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => "กรุณาพิมพ์ตามที่กำหนด"."\n"."[0]เพื่อดูแผนที่"."\n"."[1]เพื่อดูสถานที่ตั้ง"."\n"."[2]เพื่อดูรูปสถานที่"."\n"."[3]เพื่อบอกอุณหภูมิ"
					// "text"
			];
			}
			if($text == "0"){

				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://drive.google.com/open?id=1l5-zYGlPL6-_dH0LK9O3sIa1veP3KX0e",
    				'previewImageUrl' => "https://drive.google.com/open?id=1l5-zYGlPL6-_dH0LK9O3sIa1veP3KX0e"
			];
			}
			if($text == "1"){

				$messages = [
				'type' => 'text',
				'text' => "โรงเรียนวิเชียรมาตุ"
			];
			}
			if($text == "2"){

				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://scontent.furt1-1.fna.fbcdn.net/v/t31.0-8/22829081_903091683188291_6843543102483932368_o.jpg?_nc_cat=0&_nc_eui2=AeHb1OKUTePH4pUIjxrUt-s_xAsTDvklvH-M4KR9TnMWDzTZwxG__lUrCXQgFvOQ3r6wvTL5OdA-AGIuaKlkd7oCsVkMthSUkxC1VTjzDMwnMg&oh=7a1dbeb18ff5e1bb033b2cb78973599f&oe=5B8F562D",
    				'previewImageUrl' => "https://scontent.furt1-1.fna.fbcdn.net/v/t31.0-8/22829081_903091683188291_6843543102483932368_o.jpg?_nc_cat=0&_nc_eui2=AeHb1OKUTePH4pUIjxrUt-s_xAsTDvklvH-M4KR9TnMWDzTZwxG__lUrCXQgFvOQ3r6wvTL5OdA-AGIuaKlkd7oCsVkMthSUkxC1VTjzDMwnMg&oh=7a1dbeb18ff5e1bb033b2cb78973599f&oe=5B8F562D"
			];
			if($text == "3"){

				$messages = [
				'type' => 'text',
				'text' => "25.2 องศาเซลเซียส"
			];
			}
			if($text == "รูป"){

				$messages = [
				'type' => 'text',
				'text' => "http://sand.96.lt/images/q.jpg"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "อากาศ"){
				
				$messages = ['type' => 'text', 'text' => "สถานที่ : " . "``" .  "โรงเรียนวิเชียรมาตุ" . "อุณหภูมิ C :" . $TEM . "\n" . "ความชื้น :" . $HUM . " %" . "\n" . "[help] เพื่อดูเมนู"];
			
			}
			if($text == "ภาพ"){

				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://paaying.files.wordpress.com/2008/06/e0b881e0b8a5e0b989e0b8a7e0b8a2.jpg",
    				'previewImageUrl' => "https://paaying.files.wordpress.com/2008/06/e0b881e0b8a5e0b989e0b8a7e0b8a2.jpg"
			];
			}

			/*if($text == "image"){

				$messages = [
				$img_url = "http://sand.96.lt/images/q.jpg";
				$outputText = new LINE\LINEBot\MessageBuilder\ImageMessageBuilder($img_url, $img_url);
				$response = $bot->replyMessage($event->getReplyToken(), $outputText);

			];
			}*/



			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
