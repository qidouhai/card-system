<?php
namespace App\Library\Pay\Demo; use App\Library\Pay\ApiInterface; class Api implements ApiInterface { private $url_notify = ''; private $url_return = ''; public function __construct($spcbbf66) { $this->url_notify = SYS_URL_API . '/pay/notify/' . $spcbbf66; $this->url_return = SYS_URL . '/pay/return/' . $spcbbf66; } function goPay($spc6bf93, $sp30c318, $spc3fe8b, $sp66faf9, $spb959ec) { $sp0a27da = strtolower($spc6bf93['payway']); header('Location: http://example.com/order?out_trade_no=' . $sp30c318 . '&subject=' . $spc3fe8b . '&total_fee=' . $spb959ec); die; } function verify($spc6bf93, $spc5d9aa) { $sp4dcba6 = isset($spc6bf93['isNotify']) && $spc6bf93['isNotify']; if ($sp4dcba6) { if (some_verify()) { \Log::error('这里可以记录一些出错信息, 内容保存在 /storage/logs 内'); echo 'error'; return false; } else { echo 'success'; } $sp2346a9 = $_REQUEST['']; $sp51db0b = $_REQUEST['']; $spf6a1ea = $_REQUEST['']; $spc5d9aa($sp2346a9, $sp51db0b, $spf6a1ea); return true; } else { $sp2346a9 = @$spc6bf93['out_trade_no']; if (strlen($sp2346a9) < 5) { throw new \Exception('交易单号未传入'); } if (some_verify($sp2346a9)) { $sp2346a9 = $_REQUEST['']; $sp51db0b = $_REQUEST['']; $spf6a1ea = $_REQUEST['']; $spc5d9aa($sp2346a9, $sp51db0b, $spf6a1ea); return true; } else { \Log::error('这里可以记录一些出错信息, 内容保存在 /storage/logs 内'); return false; } } } }