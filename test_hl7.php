<?php
use Aranyasen\HL7\Message;


$msg_demo = file_get_contents("./demo_hl7.txt");
$msg = new Message($msg_demo); // Either \n or \r can be used as segment endings
$pid = $msg->getSegmentByIndex(1);
$pv1 = $msg->getSegmentByIndex(2);
// echo $pid->getField(3); // prints 'abcd'
$cv = $msg->getSegmentsByName("PV1");
var_dump($cv);