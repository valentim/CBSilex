<?php
$environment = getenv('env') === false ? 'dev' : getenv('env');

require __DIR__.'/'.$environment.'.php';