<?php

// sendSlackMessage('PagaboApp Deployment started');

$ret = shell_exec('cd /var/www/versatil/scripts; nohup sh deploy_dev.sh &');


file_put_contents('webhook.log', $ret);

$ret = file_get_contents('webhook.log');
return $ret;
//sendSlackMessage('PagaboApp Deployment finished.');
//sendSlackSnippetViaAPI($ret);

function sendSlackMessage($msg)
{
    $slackWebhook = 'https://hooks.slack.com/services/---/---/---';
    $message = array('payload' => json_encode(array('text' => $msg)));
    $c = curl_init($slackWebhook);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $message);
    $curlRet = curl_exec($c);
    curl_close($c);
}


function sendSlackSnippetViaAPI($message)
{
    $ch = curl_init("https://slack.com/api/files.upload");
    $data = http_build_query([
        "token" => "",
        "title" => 'Deployment Log',
        "username" => "@pagaboapp_notifier",
        "channels" => 'pagabo_app_git',
        "content" => $message,
        "filetype" => 'text',
        "filename" => 'deploy_log.txt',
        'initial_comment' => 'Deployment Log - PagaboApp',
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $ret = curl_exec($ch);

    if ($ret === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        echo 'Operation completed without any errors';
    }
}

?>