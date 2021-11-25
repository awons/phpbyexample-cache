# Examples of caching strategies in PHP

## Setup

All commands assume you are usign the provided `.devcontainer` Docker configuration.

Install dependencies:

```bash
composer install
```

### Test

#### Cache on the side

```bash
./bin/cleanup-db.sh
php bin/on-the-side.php
```

#### Read-through cache

```bash
./bin/cleanup-db.sh
php bin/read-through.php
```

#### Write-through cache

```bash
./bin/cleanup-db.sh
php bin/write-through.php
```
