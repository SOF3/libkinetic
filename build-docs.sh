#!/bin/bash
cd "$(dirname "$0")"
doxygen Doxyfile
rm -r docs/sami
php docs/sami.phar update sami.php
rm -r ./.sami/cache 2>/dev/null
