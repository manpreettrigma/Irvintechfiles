<?php

/* Email template header */
function mailheader() {
    return '<!DOCTYPE html><html><body style="font-family: Arial;"><table style="width:600px;max-width:100%;margin:0 auto;"><tbody>
            <tr>
                <td>
                    <table style="width: 100%; margin: 5px 0px 0px; padding: 10px 0px; border-radius: 4px 4px 0px 0px; background-color: rgb(240, 240, 240);">
                        <tbody>
                            <tr>
                                <td style="text-align:left;color:#fff;font-size:20px;font-weight:bold;padding-left:10px; text-transform: uppercase" colspan="4">
                                    <img src="'.base_url().'uploads/1478790669.png">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>';
}

/* Email template footer */
function mailfooter() {
    return '<tr>
                <td>
                    <table style="width: 100%; margin: 5px 0px 0px; padding: 10px 0px; border-radius: 4px 4px 0px 0px; background-color: rgb(240, 240, 240);">
                        <tbody><tr>
                            <td colspan="4" style="text-align:left;color:#0dbff2;font-size:15px;padding-left:10px; text-align:center;">
                                CLEseminars.com
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody></table></body></html>';
}

/* Email template full function */
function email_send($to, $sub, $msg) {
    $CI = & get_instance();
    $CI->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "tls://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "testinguser231@gmail.com";
    $config['smtp_pass'] = "testinguser";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['crlf'] = "\r\n";
    $config['newline'] = "\r\n"; 
    $config['validation'] = TRUE;
    $CI->load->library('email', $config);
    $CI->email->set_mailtype("html");
    $CI->email->from('noreply@lms.com', 'CLEseminars');
    $CI->email->to($to);
    $CI->email->subject($sub);
    //echo mailheader() . $msg . mailfooter(); exit;
    $CI->email->message(mailheader() . $msg . mailfooter());
    if($CI->email->send()){return true;}
    return false;
}

/* for time ago displya function */
function time_ago($date) {

    if (empty($date)) {return "No date provided";}
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $unix_date = strtotime($date);
    if (empty($unix_date)) {
        return "Bad date";
    }
    if ($now > $unix_date) {
        $difference = $now - $unix_date;
        $tense = "ago";
    } else {
        $difference = $unix_date - $now;
        $tense = "from now";
    }
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if ($difference != 1) {

        $periods[$j].= "s";
    }
    return "$difference $periods[$j] {$tense}";
}
