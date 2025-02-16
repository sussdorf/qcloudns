<?php
declare(strict_types=1);

namespace QCloudns;

class RecordManager {
    private Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function createRecord(string $domain, string $recordtype, string $host, string $record, int $ttl, int $priority=false): array {
        return $this->client->request('add-record.json', [
            'domain-name' => $domain,
            'zone-type' => $zoneType,
            'record-type' => $recordtype,
            'record-name' => $recordname,
            'record' => $record,
            'ttl' => $ttl,
            'priority' => $priority,

        ], 'POST');
    }

    public function updateRecord(string $domain, string $recordid, string $host, string $record, int $ttl, int $priority=false): array {
        return $this->client->request('mod-record.json', [
            'domain-name' => $domain,
            'record-id' => $recordid,
            'host' => $recordtype,
            'record' => $record,
            'ttl' => $ttl,
            'priority' => $priority,

        ], 'POST');
    }
   
    public function getRecord(string $domain, string $recordid): array {
        return $this->client->request('get-record.json', [
            'domain-name' => $domain,
            'record-id' => $recordid
        ], 'POST');
    }
    
    public function listRecords(string $domain): array {
        return $this->client->request('records.json', [
            'domain-name' => $domain,
        ], 'POST');
    }

    public function deleteRecord(string $domain, string $recordid): array {
        return $this->client->request('delete-record.json', [
            'domain-name' => $domain,
            'record-id' => $recordid
        ], 'POST');
    }



}