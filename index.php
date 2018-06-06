<?php
$access_token = '9G7umqWJQG5iSqeGem3E4iYGap1DcuIpV2O6UldOppui5boyKfuoBifVC8lOmcq7w5Ua+oVVloOTlztg9TvZA5wkP2UBe+RmEVK38bdEuzlOjzwbADdMtnkHXQcUzz8N3/WYxwic+ouuIXn4y51SzAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$Light = file_get_contents('https://api.thingspeak.com/channels/509782/fields/3/last.txt');
$HUM = file_get_contents('https://api.thingspeak.com/channels/509782/fields/2/last.txt');
$TEM = file_get_contents('https://api.thingspeak.com/channels/509782/fields/1/last.txt');
$events = json_decode($content, true);

 if ($HUM < 55) {
        $humi = "รู้สึกผิวแห้ง ไม่สบายตัว"  ;;
    } elseif ( $HUM >= 55  && $HUM < 66) {
        $humi = "รู้สึกเย็นกำลังสบาย";
    } else {
       $humi = "รู้สึกร้อนอบอ้าว เหนียวตัว";
    }


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
				'text' => "ไม่มีคำสั่งที่คุณพิมพ์ "."\n"."โปรดเลือกรหัสตามที่กำหนด หรือพิมพ์ [help] เพื่อดูเมนู"
					// "text"
			];
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "HELP"){
				$messages = [
				'type' => 'text',
				'text' => "โปรดกรอกรหัสตามที่กำหนด"."\n"."[A]เพื่อดูวิธีการใช้งาน"."\n"."[B]เพื่อดูคู่มือการเดินทาง"."\n"."[C]เพื่อดูแผนที่"."\n"."ตรวจสอบสภาพอากาศ"."\n"."[1]อำเภอเมือง"."\n"."[2]อำเภอนาโยง"."\n"."[3]อำเภอย่านตาขาว"."\n"."[4]อำเภอปะเหลียน"."\n"."[5]อำเภอหาดสำราญ"."\n"."[6]อำเภอกันตัง"."\n"."[7]อำเภอสิเกา"."\n"."[8]อำเภอวังวิเศษ"."\n"."[9]อำเภอห้วยยอด"."\n"."[10]อำเภอรัษฏา"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "A"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://www.picz.in.th/image/4WgXyN",
    				'previewImageUrl' => "https://www.picz.in.th/image/4WgXyN"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "B"){
				$messages = [
				'type' => 'text',
				'text' => "https://www.facebook.com/Easy-Trips-in-Trang-by-using-Graph-Theory-and-IoT-222676888330387/"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "C"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://www.picz.in.th/images/2018/06/03/zeYd6u.jpg",
    				'previewImageUrl' => "https://www.picz.in.th/images/2018/06/03/zeYd6u.jpg"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "1"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "2"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "3"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "4"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "5"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "6"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "7"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "8"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "9"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "10"){
				$messages = [
				'type' => 'text', 
				'text' => "สถานที่ : " . "" .  "อำเภอเมือง"."\n"."อุณหภูมิ C : " . $TEM . "\n" . "ความชื้น : " . $humi . "\n" . "แสง : ". $Light ." lx" . "\n" . "[help] เพื่อดูเมนู"
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP11"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง',
                		'address'=> 'อนุสาวรีย์พระยารัษฎานุประดิษฐ์มหิศรภักดี',
                		'latitude'=> 7.564244,
               			 'longitude'=> 99.622264
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP21"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.นาโยง จ.ตรัง',
                		'address'=> 'วัดปากเหมือง',
                		'latitude'=> 7.557658,
               			 'longitude'=> 99.694503
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP31"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ย่านตาขาว จ.ตรัง',
                		'address'=> 'สวนพฤกษศาสตร์ภาคใต้(ทุ่งค่าย)',
                		'latitude'=> 7.468389,
               			 'longitude'=> 99.635796
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP41"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ปะเหลียน จ.ตรัง',
                		'address'=> 'น้ำตกช่องบรรพต',
                		'latitude'=> 7.282881,
               			 'longitude'=> 99.813623
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP51"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.หาดสำราญ จ.ตรัง',
                		'address'=> 'วัดปากปรน',
                		'latitude'=> 7.266234,
               			 'longitude'=> 99.545218
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP61"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.กันตัง จ.ตรัง',
                		'address'=> 'บ้านพระยารัษฎานุประดิษฐ์',
                		'latitude'=> 7.407587,
               			 'longitude'=> 99.515416
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP71"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.สิเกา จ.ตรัง',
                		'address'=> 'อุทยานแห่งชาติหาดเจ้าไหม',
                		'latitude'=> 7.412056,
               			 'longitude'=> 99.345359
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP81"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.วังวิเศษ จ.ตรัง',
                		'address'=> 'วังนกน้ำ',
                		'latitude'=> 7.643963,
               			 'longitude'=> 99.481688
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP91"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง',
                		'address'=> 'เขาน้ำพราย',
                		'latitude'=> 7.715560,
               			 'longitude'=> 99.616667
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP101"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.รัษฎา จ.ตรัง',
                		'address'=> 'วัดคลองเขาจันทร์',
                		'latitude'=> 7.918779,
               			 'longitude'=> 99.692320
			];
			}
			if($text == "รูป"){
				$messages = [
				'type' => 'text',
				'text' => "http://sand.96.lt/images/q.jpg"
			];
			}
			if($text == "23548"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://scontent.furt1-1.fna.fbcdn.net/v/t31.0-8/22829081_903091683188291_6843543102483932368_o.jpg?_nc_cat=0&_nc_eui2=AeHb1OKUTePH4pUIjxrUt-s_xAsTDvklvH-M4KR9TnMWDzTZwxG__lUrCXQgFvOQ3r6wvTL5OdA-AGIuaKlkd7oCsVkMthSUkxC1VTjzDMwnMg&oh=7a1dbeb18ff5e1bb033b2cb78973599f&oe=5B8F562D",
    				'previewImageUrl' => "https://scontent.furt1-1.fna.fbcdn.net/v/t31.0-8/22829081_903091683188291_6843543102483932368_o.jpg?_nc_cat=0&_nc_eui2=AeHb1OKUTePH4pUIjxrUt-s_xAsTDvklvH-M4KR9TnMWDzTZwxG__lUrCXQgFvOQ3r6wvTL5OdA-AGIuaKlkd7oCsVkMthSUkxC1VTjzDMwnMg&oh=7a1dbeb18ff5e1bb033b2cb78973599f&oe=5B8F562D"
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
