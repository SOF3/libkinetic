#!/bin/bash
doxygen Doxyfile
php sami.phar update sami.php
rm -r ./.sami/cache 2>/dev/null
