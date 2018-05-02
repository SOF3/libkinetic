#!/bin/bash
cd "$(dirname "$0")"
doxygen Doxyfile
rm -r docs/doxygen docs/sami
php docs/bin/sami.phar update sami.php
rm -r ./.sami/cache 2>/dev/null
