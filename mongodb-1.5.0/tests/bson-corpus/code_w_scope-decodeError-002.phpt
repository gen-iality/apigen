--TEST--
Javascript Code with Scope: field length negative
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('280000000F6100FFFFFFFF0500000061626364001300000010780001000000107900010000000000');

throws(function() use ($bson) {
    var_dump(toPHP($bson));
}, 'MongoDB\Driver\Exception\UnexpectedValueException');

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\UnexpectedValueException
===DONE===