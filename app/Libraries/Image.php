<?php


namespace App\Libraries;


use HTTP_Request2;

class Image
{
    private static function effect($type = 'text')
    {
        $nameFile = '132|Tay cầm ảnh với hiệu ứng 2 lớp|image
134|Mặt dây chuyền trái tim|image
135|Viên đá trong suốt 2 lớp|image
136|Viên ngọc trong tay quỷ|image
142|Mảnh vỡ trái tim 2 lớp|image
143|Tay cầm trái tim|image
144|Trái tim bị buộc dây|image
149|Dây móc treo trái tim|image
151|Trái tim trong bàn tay|image
152|Trái tim trong lòng bàn tay|image
153|Tay ôm hình trái tim|image
155|Hiệu ứng trái tim 3d|image
156|Vòng cổ trái tim trong suốt|image
158|Mặt dây chuyền đá quý|image
160|Chiếc nhẫn trái tim tình yêu|image
161|Hiệu ứng CD 2 lớp|image
162|Hiệu ứng đĩa nhạc CD|image
163|Hiệu ứng khung ảnh camera|image
164|Hiệu ứng text kim cương|text
166|Hiệu ứng ảnh mảnh ghép|image
168|Hiệu ứng text quý tộc|text
175|Hiệu ứng text dưới nước|text
179|Text trên cửa xếp|text
180|Text trên áo hot girl|text
181|Text trên thảm cỏ|text
182|Text street nghệ thuật|text
183|Text ngọc bích viền gold|text
184|Text trên mặt nước|text
185|Hiệu ứng text chrome|text
188|Beach scene picture|image|text
190|Mảnh ghép trái tim|image
209|Hiệu ứng team logo gold|text
211|Hiệu ứng logo neon|text
215|Text spring flowers online|text
216|Hiệu ứng eagle logo team|text
217|Hiệu ứng text dưới lá|text
227|Text quotes dưới lá|text
228|Khung mùa hè nhiệt đới|image
231|Chữ quotes dưới lá đẹp|text
233|Text with tropic leaves online|text
235|Hiệu ứng text summer online|text
236|Logo wolf team online|text
238|Chữ 3d thiên nhiên nghệ thuật|text
239|Tạo chữ 3d nature online|text
241|Tạo ảnh bìa 7 màu online|text
242|Text 3d summer online|text
243|Avata lá cây trái tim|image
245|text ánh đèn 7 màu|text
246|Text 2 ngón tay|text
247|Text hoa trái tim|text
248|Text thiệp hoa|text
249|Text trái tim đôi|text
250|Text phấn|text
251|Text khung hoa hồng|text
252|Text summer|text
254|Text hoa hồng|text
256|Text hoa lá nghệ thuật|text
257|Text trên gỗ|text
258|Text cafe|text
259|Text cafe 2|text
260|Text cafe 3|text
262|Khung ảnh mùa hè|image
264|Text i miss you|text
265|Text trên mặt đất|text
266|text cmt trái tim treo cây|text
267|text cmt treo cây nơ đỏ|text
268|text stt tâm trạng|text
269|text cmt kẹp nơ|text
270|text cmt giấy treo cây|text
273|Text trong suốt|text
275|Text hoàng gia|text
277|Text hoa modus|text
278|Text khói|text
279|Text hoa modus 2|text
280|Text tia sáng xanh|text
281|Text gold|text
282|Text trên lá|text
283|Text sơn tường|text
284|Text mưa|text
285|Text lửa|text
286|Text bóng đèn|text
287|Text phấn funny|text
288|Text nổi|text
289|Text cánh|text
290|Text áo|text
292|modern gold|text
293|modern-gold-10|text
295|modern-gold-8|text
303|modern-gold-2-purple|text
305|modern-gold-2-green|text
312|text cmt ghim kẹp giấy|text
313|text cmt giấy trên kẹo|text
314|cover tik tok|text
315|text cmt giấy cháy 1|text
316|text cmt giấy cháy 2|text
317|text cmt dưới lá cây|text
318|text cmt trên giầy 1|text
319|text cmt trên giầy 2|text
321|text cmt kẹp giây hear|text
322|text cmt tay cầm trái tim|text
323|text cmt hoa hồng đỏ|text
324|text cmt giấy cháy 3|text
326|text cmt giấy nghệ thuật|text
327|text cmt trên đá|text
328|text cmt trên băng dính|text
329|text cmt giấy hoa|text
330|text cmt sms love|text
331|Text cmt phấn|text
332|Text cmt tay cầm art|text
333|Text cmt cakoi thu phap|text
334|Text cmt tảng đá|text
335|Text cmt đá tình yêu|text
336|Frame Paris|image
337|text cmt cốc hoa|text
338|text cmt cốc kẹo|text
339|text cmt hot girl 2|text
340|text cmt báo trí funny|image|text
351|rainbow glow|text
355|bong bóng 1|image
356|mảnh ghép 1|image
357|frame nhớ nhiều|image
358|frame gấu bông|image
359|frame chai nước|image
360|frame i love you|image
361|frame manip đại dương|image|text
362|frame lửa & nước|image
363|bong bóng 2|image
365|lọ ước nguyện|image
366|frame cốc|image
367|dây truyền trái tim|image
368|text cmt lá cây 2|text
369|frame dưới lá|image
370|text chrome 2|text
371|kẹp ảnh trên cành hoa|image|text
372|lọ ánh đèn tím|image
374|kẹp ảnh trên cành cây|image
375|text hoa hồng art|text
376|text ánh đèn 2|text
377|text cmt lá cây 3|text
378|text cmt lá cây 4|text
379|text cmt lá cây 5|text
380|text trên cát|text
381|mẫu áo summer|image|text
382|text bóng đèn heart|text
383|Text dưới lá mobile|text
384|text cmt lá cây 6|text
385|Text dưới lá mobile 2|text
386|text bóng đèn heart 2|text
387|Text hoa văn 3d|text
388|Frame summer hoàng hôn|image
389|Frame kẹp tay cầm|image
390|Facebook mobile|image|text
391|Triệu like|image|text
392|khung ảnh kẹp dây đèn|image|text
393|Frame để bàn 1|image
394|Frame thủy tinh|image
396|text mây|text
397|Text dưới đại dương|text
398|rubiks|image
400|avata head|image
401|i love you valentine|image
402|picture frame text heart|image
403|3d heart photo frame|image
404|avatar heart valentine 1|image
405|frame kep trai tim 2|image
406|Frame kẹo gấu bông|image
407|Frame muầ xuân 1|image
408|Frame muầ xuân 2|image
409|frame lọ fire|image
410|kep frame head|image
411|Đèn neon trái tim 2|text
412|frame head cute|image|text
413|Logo gold 3|text
414|frame i love u|image
415|frame love tron|image
416|frame love tron 1|image
417|Logo gold 4|text
418|frame i love you đẹp|image
419|frame den noel|image
420|frame tron love|image
421|frame trai tim valen|image
422|avata luxury|image
423|avata luxury 2|image|text
424|Giải ngân hà|image
425|hiệu ứng khung thêu|image
426|hiệu ứng caro|image
427|text thêu|text
428|text trên vải|text
429|Text tréo trên tường|text
430|text hiệu ứng sơn|text
431|text đá quý|text
432|mảnh ghép 3d2|image
434|Hiệu ứng ảnh nhiều lớp|image
435|frame 2 ảnh|image
436|text avata luxury|text
437|text bánh quy|text
438|text candy 1|text
439|text candy 2|text
440|logoteamironman|image
441|Frame kỷ niệm|image|text
442|Logo Team Chrome|text
444|Frame ánh đèn noel|image
445|Camera funny|image
446|rubiks 2|image
447|rubiks 3|image
448|text khung thêu|text
449|frame iphone x|image
450|fFrame lửa cháy 2|image
451|xe anh 2|image
452|frame trai tim tron 2|image
453|happy valentine s|image
454|kep frame head 2|image
455|avata logo gold 2|image|text
456|text mưa 2|text
457|Thiệp hoa hồng 1|image
458|Thiệp hoa hồng 2|image
459|Thiệp hoa hồng 3|image
460|Thiệp hoa hồng 4|image
461|Thiệp hoa hồng 5|image
462|frame iphone x new|image
467|Frame album hành động|image
468|Mẫu kính núp|image
469|Móc trái tim|image
470|Mẫu bóng đèn|image
471|Mẫu giọt nước|image
472|Mẫu ipad|image
473|Điện thoại SamSung|image
474|Điện thoại iphone|image
475|Máy chụp ảnh|image
476|text 3d xanh|text
477|Text 3d cương thi|text
478|text 7 màu hoa văn|text
479|Text halloween|text
480|Text sắt|text
481|text tranh thêu|text
483|text metal star|text
484|text metal|text
485|tay cầm mảnh ghép|image
486|text trên mặt đường|text
487|text trên tảng đá|text
488|text đá|text
490|hiệu ứng tivi|image
491|hiệu ứng ảnh nước|image
492|nước ngọt cocacola|image
493|Khung trái tim 2 lớp|image
494|Khung ảnh love|image
495|Khung ảnh trái tim đôi|image
496|khung ảnh kép|image
497|khung ảnh love|image
498|khung ảnh lá cây|image
499|khung ảnh nature|image
500|Khung trái tim rách|image
501|Frame valentine rose|image
502|Frame valentine rose 2|image
503|Ảnh dưới bóng đèn|image
504|Khung lửa rose|image
505|frame bong bóng 2|image
506|Giọt sương|image
507|khung cafe|image
508|khung gấu bông|image
509|Bong bóng cầm tay|image
510|frame rose herad|image
511|Tay cầm bong bóng|image
512|bong bóng tan tiến|image
513|Khung kẹo mút|image
514|khung trai tim insert|image
515|khung natute vẹt|image
516|Khung tivi dưới biển|image
517|Frame forever|image
518|cover 1|image|text
519|avata godl tron 1|image
520|cover 2|image|text
521|cover 3|image|text
522|avata godl tron 2|image
523|Text vàng đen|text
524|Text chrome fire|text
525|Text gold quý tộc|text
526|Store gold|image|text
527|Avata text gold ngọc đỏ|text
528|Text gold ngọc đỏ|text
529|Text neon bảng tên|text
530|Text neon con bướm|text
534|frame love rose|image
543|frame noel ipad|image
544|Text đèn neon new|text
545|glitter gold|text
546|Text thư pháp|text
547|Text retro|text
548|Text ngôi sao|text
549|Avata gold new|image|text
560|Text bắn tim|text
562|frame new year 2019|image
563|frame notep|image
565|frame trai tim hoa|image
566|Khung ảnh đôi narute|image
570|frame 7 mau|image
582|frame iloveyou|image
583|frame gỗ|image
585|frame wedding|image
586|frame wedding love|image
587|frame wedding 2|image
588|frame để bàn|image
589|frame wedding 3|image
590|frame wedding 4|image
591|anh ky niem|image
592|anh ky niem 2|image|text
597|frame nature la cay1|image
598|frame nature la cay2|image
599|frame nature la cay3|image
600|frame nature la cay4|image
601|frame nature la cay5|image
602|frame nature la cay6|image
603|frame nature la cay7|image
604|Frame cưới 1|image
605|Frame cưới 2|image
606|frame-summer-2019-1|image
607|frame hoa new|image
608|frame hoa new 2|image
609|frame hoa phong lan|image
610|frame-wedding-1|image
611|frame-wedding-02|image
612|frame-wedding-03|image
613|frame-summer-2019-2|image
614|frame-summer-2019-3|image
615|frame-summer-2019-4|image
616|frame-summer-2019-51|image
617|frame thiep mung 1|image
618|frame-tay-cam-2019|image
619|ipad-summer-2019|image
620|frame-summer-2019-6|image
621|frame-summer-2019-7|image
622|frame-summer-2019-8|image
623|frame-summer-2019-9|image
624|frame-summer-2019-10|image
625|frame-thiep-mung-2|image|text
626|xe-anh-2-1-1|image
627|avata hoa la|image
628|avata hoa la 1|image
629|avata hoa la 2|image
630|frame i love you 2019|image
631|frame may anh 2019|image
639|Frame lá cây 2020 loại 1|image
640|Frame lá cây 2020 loại 2|image
641|Frame hoa vàng mua xuân 1|image
642|Frame hoa vàng mua xuân 2|image
643|Frame hoa hồng mua xuân 1|image
644|Frame hoa hồng mua xuân 2|image
645|Frame hoa hồng mua xuân 3|image
646|Text hoa hồng mùa xuân|text
647|Text dưới lá mới loại 1|text
648|Text dưới lá mới loại 2|text
649|Text dưới lá mới loại 3|text
650|Text dưới lá mới loại 4|text
651|Text dưới lá mới loại 5|text
652|Frame lá cây mới loại 1|image
653|Frame lá cây mới loại 2|image
654|Frame lá cây mới loại 3|image
655|I love frame 2020|image
656|frame đống rơm|image
657|frame thiệp mừng 2020|image
658|frame hoa hồng 2020 loại 1|image
659|frame hoa hồng 2020 loại 2|image
660|frame hoa 2020|image
661|frame cánh hoa hồng|image
662|frame hộp valentine|image';

        $list = explode("\n", ($nameFile));
        $listText = [];
        $listImage = [];
        $listImageAndText = [];
        foreach ($list as $row) {
            $dataRow = explode('|', trim($row));
            if (count($dataRow) === 3 && $dataRow[2] === 'text') $listText[] = $dataRow;
            if (count($dataRow) === 3 && $dataRow[2] === 'image') $listImage[] = $dataRow;
            if (count($dataRow) === 4) $listImageAndText[] = $dataRow;
        }
        if ($type === 'text') return $listText[array_rand($listText)][0];
        if ($type === 'image') return $listImage[array_rand($listImage)][0];
        if ($type === 'image|text') return $listImageAndText[array_rand($listImageAndText)][0];
        return null;
    }

    public static function getUrlImage($text, $type = 'text')
    {

        $request = new HTTP_Request2();
        $request->setUrl('http://ghepanhpro.online/api/make/index/pass/abc0490/id/331/param1/?param1=Anna+Nguy%E1%BB%85n');
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
            }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }






        $configApp= config('app');
        try {
            $id = self::effect($type);
            $url = $configApp->baseUrlImage . $id . '/param1/?param1=' . urlencode($text);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $json = json_decode($response, true);
            if (is_null($json)) return "";
            return $json['link_img'];
        } catch (ErrorException $exception) {
            return "";
        }

    }
}