run-on-the-side:
	./bin/cleanup-db.sh
	php ./bin/on-the-side.php

run-read-through:
	./bin/cleanup-db.sh
	php ./bin/read-through.php

run-write-through:
	./bin/cleanup-db.sh
	php ./bin/write-through.php

run-write-read-through:
	./bin/cleanup-db.sh
	php ./bin/write-read-through.php
