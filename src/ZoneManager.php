<?php
declare(strict_types=1);

namespace QCloudns;

class ZoneManager {
    private Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function createZone(string $domain, string $zoneType = 'master'): array {
        return $this->client->request('register.json', [
            'domain-name' => $domain,
            'zone-type' => $zoneType,
        ], 'POST');
    }

    public function deleteZone(string $domain): array {
        return $this->client->request('delete.json', [
            'domain-name' => $domain,
        ], 'POST');
    }

    public function listZones(int $page = 1, int $rowsPerPage = 10): array {
        return $this->client->request('list-zones.json', [
            'page' => $page,
            'rows-per-page' => $rowsPerPage,
        ], 'POST');
    }

    public function statsZones(): array {
        return $this->client->request('get-zones-stats.json', [], 'POST');
    }

    public function updateZone(string $domain): array {
        return $->request('update-zone.json', [
            'domain-name' => $domain,
        ], 'POST');
    }
}
