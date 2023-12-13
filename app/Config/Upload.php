<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Upload extends BaseConfig
{
    public $maxSize      = 1024; // in kilobytes
    public $validTypes   = ['jpg', 'jpeg', 'png'];
    public $maxWidth     = 0;
    public $maxHeight    = 0;
    public $encryptName  = false;
    public $overwrite    = false;
    public $uploadPath   = WRITEPATH . 'uploads/';
    public $debug        = false;
}

?>