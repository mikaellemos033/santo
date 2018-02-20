<?php 

namespace Sect\Providers;

interface Single
{
	public static function reset();

	public static function instance();
}