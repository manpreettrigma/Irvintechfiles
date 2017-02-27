<?php
$this->load->library('email');

$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.sendgrid.net',
  'smtp_user' => 'sendgridusername',
  'smtp_pass' => 'sendgridpassword',
  'smtp_port' => 587,
  'crlf' => "\r\n",
  'newline' => "\r\n"
));

$this->email->from('bindukamboj83@gmial.com', 'Bindu Kamboj');
$this->email->to('bindu.kamboj@trigma.co.in');
//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');
$this->email->subject('Email Test');
$this->email->message('Testing the email class.');
$this->email->send();

echo $this->email->print_debugger();
?>