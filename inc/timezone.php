<?php
date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'spanish');
echo utf8_encode(strftime("%A %#d de %B del %Y"));