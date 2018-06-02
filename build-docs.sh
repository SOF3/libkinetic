#!/bin/bash
cd "$(dirname "$0")"
rm -r docs/doxygen docs/sami 2>/dev/null
php tools/generateAdapter.php
doxygen Doxyfile
php docs/bin/sami.phar update sami.php
rm -r ./.sami/cache 2>/dev/null
touch docs/.nojekyll
