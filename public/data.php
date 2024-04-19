<?php 

    require(__DIR__.'/Classes/PHPExcel.php') ;
    require(__DIR__.'/Classes/PHPExcel/IOFactory.php') ;

    $instagram = null; // JSONデータ配列をここに格納
    // $instagram_business_id = '17841406748292187'; // InstagramビジネスアカウントのID
    $instagram_business_id = '1707377982753354'; // InstagramビジネスアカウントのID
    $access_token = 'EAALGsNrlnYABOweqaCm81wkGH1Ar0ZBZCwW0q0aqeLU4Ckon6u4cqhr5a5EmKMUL4XTu549MKfJYQOgLBtHQKZCZAkirPWWAGnA3LKNiL9lEgNJfBk5umjeSQ2MRq8qQWFhtJHw1lZBpgGU6RBO25MIpXmBwKmzmyuZCmL7EjPBvQFRB1A9NuZB4h1RTqwZBmvEgk9SvhsDbFk5m6aGKxPMzQZClxmiQZD'; // 有効期限無期限のアクセストークン
    $post_count = 10; // 表示件数
    $query = 'name,media.limit(' . $post_count. '){caption,like_count,media_url,media_type,thumbnail_url,permalink,timestamp,username,comments_count}';
    $get_url = 'https://graph.facebook.com/v11.0/' . $instagram_business_id . '?fields=' . $query . '&access_token=' . $access_token;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $get_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // curl_execの結果を文字列で返す
    $response = curl_exec($curl);
    curl_close($curl);

    if($response){
    $instagram = json_decode($response);
    if(isset($instagram->error)){
        $instagram = null;
    }
    }
    $instadata = $instagram->media->data;

    foreach($instadata as $data){
        $data->caption = str_replace("\n", "<br>", $data->caption);
        $data->timestamp =  date('Y.m.d',strtotime($data->timestamp));
        $thumb = $data->thumbnail_url ?? false;
        $data->media_url = $thumb ?: $data->media_url;
    }

    for ($i=0; $i < 4; $i++) { 
        $instadata_mini[$i] = $instadata[$i];
    }

    // excelファイル読み込み
    $input_food = 'tanimoto_food.xlsx';
    $input_drink = 'tanimoto_drink.xlsx';

    $excel_food = PHPExcel_IOFactory::load($input_food);
    $excel_drink = PHPExcel_IOFactory::load($input_drink);

    $excel_food_data = $excel_food->getActiveSheet()->toArray(null,true,true);
    $excel_drink_data = $excel_drink->getActiveSheet()->toArray(null,true,true);

    date_default_timezone_set('Asia/Tokyo');
    $now_hour = date('G');
    $image_url_pc = "";
    $image_url_phone = "";
    $signboard = "";
    $bg_img = "";

    if ( 3 <= $now_hour && $now_hour <= 11 || 12 <= $now_hour && $now_hour <= 15){ //昼
        $image_url_pc = "../public/assets/image/cover_noon_pc.jpg";
        $image_url_phone = "../public/assets/image/cover_noon_phone.jpg";
        $signboard = "../public/assets/image/noon_signboard.JPG"; 
        $bg_img = "background-image: url('../public/assets/image/wood6.jpg')";
    }elseif (0 <= $now_hour && $now_hour <= 2 || 16 <= $now_hour && $now_hour <= 23) {  //夜
        $image_url_pc = "../public/assets/image/cover_afnoon_pc.jpeg";
        $image_url_phone = "../public/assets/image/cover_afnoon_phone.JPG";
        $signboard = "../public/assets/image/afnoon_signboard.JPG";
        $bg_img = "background-image: url('../public/assets/image/wood7.jpg')";
    }

?>