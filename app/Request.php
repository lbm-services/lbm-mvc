<?php
namespace Lbm\Mvc;

interface Request {
    public function getParameterNames();
    public function issetParameter($name);
    public function getParameter($name);
    public function getHeader($name);
    public function getAuthData();
    public function getPost();
    public function getRemoteAddress();
}
?>