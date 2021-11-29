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
make run-on-the-side
```

#### Read-through cache

```bash
make run-read-through
```

#### Write-through cache

```bash
make run-write-through
```

#### Write-read-through cache

```bash
make run-write-read-through
```
