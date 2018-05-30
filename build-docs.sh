#!/bin/bash
cd "$(dirname "$0")"
rm -r docs/doxygen docs/sami 2>/dev/null
doxygen Doxyfile
php docs/bin/sami.phar update sami.php
rm -r ./.sami/cache 2>/dev/null
# touch docs/doxygen/.nojekyll docs/sami/.nojekyll
