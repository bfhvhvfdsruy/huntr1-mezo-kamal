<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'] . $accounts[$screen]['sessionid'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 110;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$true = 0;
$false = 0;
$NotBussines = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"- *تـم بدا الصيد بـرعـاية @QQQQQQ0 
    يمكنك ترك البوت الان والذهاب لمراسلت حبيبتك 😹*",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'🍂 𝗖𝗵𝗲𝗰𝗸𝗲𝗱:~ '.$i,'callback_data'=>'fgf']],
                [['text'=>'🍁 𝗢𝗻 𝗨𝘀𝗲𝗿:~ '.$user,'callback_data'=>'fgdfg']],
                [['text'=>"𝗚𝗺𝗮𝗶𝗹:~ $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'𝗠𝗮𝗶𝗹𝗥𝘂:~ '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],
                [['text'=>'𝗧𝗿𝗨𝗲 ✔️:~ '.$true,'callback_data'=>'gj']],
                [['text'=>'𝗙𝗮𝗹𝘀𝗲 ✖️:~ '.$false,'callback_data'=>'dghkf'],['text'=>'𝗡𝗼𝘁 𝗕𝘂𝘀𝗶𝗻𝗲𝘀𝘀 💲:~ '.$NotBussines,'callback_data'=>'dgdge']],
                [['text'=>' 𝗕𝘂𝘀𝗶𝗻𝗲𝘀𝘀 ➕:~ '.$false,'callback_data'=>'dghkf']],
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false ) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|yAhoo)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => "⌯ تـم صيـد متـاح انستا برعايـة @QQQQQQ0 \n━━━━━━━━━━━━\n 
|~ 𝗨𝗦𝗘𝗥 : [$usern](instagram.com/$usern)\n 
|~ 𝗘𝗠𝗔𝗜𝗟 : [$mail]\n 
|~ 𝗙𝗢𝗟𝗟𝗢𝗪𝗘𝗥𝗦 : $follow\n 
|~ 𝗙𝗢𝗟𝗟𝗢𝗪𝗜𝗡𝗚 : $following\n 
|~ 𝗣𝗢𝗦𝗧 : $media 
\n━━━━━━━━━━━━\nDev :~ [⌯ @QQQQQQ0\nCH :~ ⌯ @WWWWWWZ ]",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>'🍂 𝗖𝗵𝗲𝗰𝗸𝗲𝗱:~ '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'🍁 𝗢𝗻 𝗨𝘀𝗲𝗿:~ '.$user,'callback_data'=>'fgdfg']],
                                            [['text'=>"𝗚𝗺𝗮𝗶𝗹:~ $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'𝗠𝗮𝗶𝗹𝗥𝘂:~ '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],
                                            [['text'=>'𝗧𝗿𝗨𝗲 ✔️:~ '.$true,'callback_data'=>'gj']],
                                            [['text'=>'𝗙𝗮𝗹𝘀𝗲 ✖️:~ '.$false,'callback_data'=>'dghkf'],['text'=>'𝗡𝗼𝘁 𝗕𝘂𝘀𝗶𝗻𝗲𝘀𝘀 💲:~ '.$NotBussines,'callback_data'=>'dgdge']],
                                            [['text'=>' 𝗕𝘂𝘀𝗶𝗻𝗲𝘀𝘀 ➕:~ '.$false,'callback_data'=>'dghkf']],
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } else {
         $NotBussines +=1;
        echo "NotBussines - $user\n";
    }
    usleep(400000);
    $i++;
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>'🍂 𝗖𝗵𝗲𝗰𝗸𝗲𝗱:~ '.$i,'callback_data'=>'fgf']],
                    [['text'=>'🍁 𝗢𝗻 𝗨𝘀𝗲𝗿:~ '.$user,'callback_data'=>'fgdfg']],
                    [['text'=>"𝗚𝗺𝗮𝗶𝗹:~ $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                    [['text'=>'𝗠𝗮𝗶𝗹𝗥𝘂:~ '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],
                    [['text'=>'𝗧𝗿𝘂𝗲 ✔️:~ '.$true,'callback_data'=>'gj']],
                    [['text'=>'𝗙𝗮𝗹𝘀𝗲 ✖️:~ '.$false,'callback_data'=>'dghkf'],['text'=>'Not Business 💲: '.$NotBussines,'callback_data'=>'dgdge']],
                    [['text'=>' 𝗕𝘂𝘀𝗶𝗻𝗲𝘀𝘀:~ ➕: '.$false,'callback_data'=>'dghkf']],
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"انتهى الفحص :برعايـة @QQQQQQ0 :~".explode(':',$screen)[0]]);

