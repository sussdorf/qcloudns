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
```bash
require 'vendor/autoload.php';

use Qcloudns\Client;
use Qcloudns\ZoneManager;

$authId = 'your-auth-id';
$authPassword = 'your-auth-password';
$client = new Client($authId, $authPassword);
$zoneManager = new ZoneManager($client);
```
# ZoneManager

### Add DNS Zone
```bash
$response = $zoneManager->createZone('example.com');
print_r($response);
```

### Update DNS Zone
```bash
$response = $zoneManager->updateZone('example.com');
print_r($response);
```
### List DNS Zones
```bash
$response = $zoneManager->listZones();
print_r($response);

```
### Delete DNS Zones
```bash
$response = $zoneManager->listZones();
print_r($response);

```




