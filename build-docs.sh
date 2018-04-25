#!/bin/bash
doxygen Doxyfile
php docs/sami.phar update sami.php
rm -r ./.sami/cache 2>/dev/null
