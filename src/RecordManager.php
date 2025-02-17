<?php
declare(strict_types=1);

namespace QCloudns;

class RecordManager {
    private Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function createRecord(string $domain, $data): array {
       
        $req_data = ['domain-name' => $domain];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->fields)) {
                $req_data[$key] = $value;
            }
        }
       
        
        return $this->client->request('add-record.json', $req_data, 'POST');
    }

    public function updateRecord(string $domain,$data): array {
        
        $req_data = ['domain-name' => $domain];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->fields)) {
                $req_data[$key] = $value;
            }
        }
        
        return $this->client->request('mod-record.json', $req_data, 'POST');
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