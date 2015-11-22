<?php

namespace App\Interfaces;

interface FileValidate
{
    public function setFile( array $file );

    public function getFile();

    public function getFolder();

    public function setMb( $mb );

    public function getType();
}