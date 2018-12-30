<?php
include "Db.php";

try {
  $server = new SOAPServer(
    NULL,
    array(
     'uri' => 'http://localhost/local/xmljson-ipah/nusoap/crud/lib/server.php'
    )
  );

  // SETTING UP THE Db CLASS
  $server->setClass('Db'); 
  $server->handle();
}

catch (SOAPFault $f) {
  print $f->faultstring; exit;
}

?>