<?php

	shell_exec('echo "pulse_out(liquidsoap:).skip"|socat - TCP4:127.0.0.1:1234');
	sleep(1);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;

?>