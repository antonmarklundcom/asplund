#!/usr/bin/env bash
# Build gate: lint every PHP file, boot php -S, run tools/verify.php.
#   ./verify.sh            (uses `php` on PATH; on Anton's PC: PHP=/c/php/php.exe ./verify.sh)
set -euo pipefail
cd "$(dirname "$0")"
PHP="${PHP:-php}"
PORT="${PORT:-8099}"

echo "== lint"
fails=0
while IFS= read -r f; do
  if ! out=$("$PHP" -l "$f" 2>&1); then echo "$out"; fails=$((fails+1)); fi
done < <(find . -name '*.php' -not -path './dist/*' -not -path './node_modules/*')
[ "$fails" -eq 0 ] && echo "  ok    all PHP files lint" || { echo "  FAIL  $fails file(s)"; exit 1; }

"$PHP" -S "127.0.0.1:$PORT" router.php >/dev/null 2>&1 &
SERVER=$!
trap 'kill $SERVER 2>/dev/null || true' EXIT
for _ in $(seq 1 30); do
  if "$PHP" -r "exit(@file_get_contents('http://127.0.0.1:$PORT/robots.txt') === false ? 1 : 0);"; then break; fi
  sleep 0.2
done

"$PHP" tools/verify.php "http://127.0.0.1:$PORT"
