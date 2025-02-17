# QCloudns API Client

This repository contains a PHP client library for interacting with the Cloudns API. It allows you to manage DNS zones and records programmatically.

## Features

- Create, delete, list, and update DNS zones
- Create, delete,list, and update DNS records (add delete and update are finished)
- Get statistics of DNS zones (Soon)
- Get account Informations (Soon)

## Requirements

- PHP 8.0 or higher
- Composer

## Installation

Install the library using Composer:

```bash
composer require qcloudns/client
```

## Usage

```php
require 'vendor/autoload.php';

use Qcloudns\Client;
use Qcloudns\ZoneManager;

$authId = 'your-auth-id';
$authPassword = 'your-auth-password';
$client = new Client($authId, $authPassword);
$zoneManager = new ZoneManager($client);
$recordManager = new RecordManager($client);
```

# ZoneManager

### Add DNS Zone

```php
$response = $zoneManager->createZone('example.com');
print_r($response);
```

### Update DNS Zone

```php
$response = $zoneManager->updateZone('example.com');
print_r($response);
```

### List DNS Zones

```php
$response = $zoneManager->listZones();
print_r($response);

```

### Delete DNS Zones

```php
$response = $zoneManager->listZones();
print_r($response);

```

# RecordManager

### Add Record

```php
$data = [
    'record-type' => 'A',
    'host' => 'www',
    'record' => '192.0.2.1',
    'ttl' => 3600,
    'priority' => 10
];
$response = $recordManager->createRecord('example.com', $data);
print_r($response);
```

### Modify Record

```php
$data = [
    'record-id' => 1234,
    'host' => 'www',
    'record' => '192.0.2.1',
    'ttl' => 3600,
    'priority' => 10
];
$response = $recordManager->updateRecord('example.com', $data);
print_r($response);
```

### Get Record(Single)

```php
$response = $recordManager->getRecord(string $domain, string $recordid);
print_r($response);
```

### Get All Records from given Zone

```php
$response = $recordManager->listRecords(string $domain);
print_r($response);
```

### Delete Record

```php
$response = $recordManager->deleteRecord(string $domain, string $recordid);
print_r($response);
```
