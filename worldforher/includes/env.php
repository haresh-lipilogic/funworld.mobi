<?php
// Minimal .env loader - no Composer/vendor available in this project.
if (!function_exists('env')) {

	function loadEnv($path) {
		if (!file_exists($path)) {
			return;
		}
		foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
			$line = trim($line);
			if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
				continue;
			}
			list($name, $value) = explode('=', $line, 2);
			$name = trim($name);
			$value = trim(trim($value), "\"'");
			if (getenv($name) === false) {
				putenv("$name=$value");
				$_ENV[$name] = $value;
			}
		}
	}

	function env($key, $default = null) {
		$value = getenv($key);
		return $value === false ? $default : $value;
	}

	loadEnv(__DIR__ . '/../.env');
}
