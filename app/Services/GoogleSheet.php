<?php

namespace App\Services;

use Google_Client;
use App\Models\Sender;
use Google\Service\Sheets;
use Google_Service_Sheets;

class GoogleSheet
{
    private $spreadSheetId;
    private $client;
    private $googleSheetService;

    public function __construct()
    {
        $this->spreadSheetId = config(key: 'sistempersuratan.google_sheet_id');
        $this->client = new Google_Client();
        $this->client->setAuthConfig(public_path('storage/credentials.json'));
        $this->client->addScope(scope_or_scopes: "https://www.googleapis.com/auth/spreadsheets");
        $this->googleSheetService = new \Google_Service_Sheets($this->client);
    }

    public function readGoogleSheet()
    {
        $dimensions = $this->getDimensions($this->spreadSheetId);
        $colRange = 'Sheet1!1:2';
        $range = 'Sheet1!A1:' . $dimensions['colCount'];

        $column = $this->googleSheetService->spreadsheets_values
            ->batchGet($this->spreadSheetId, ['ranges' => $colRange, 'majorDimension' => 'ROWS']);

        $data = $this->googleSheetService
            ->spreadsheets_values
            ->batchGet($this->spreadSheetId, ['ranges' => $range]);

        $headers = $data->getValueRanges()[0]->values[0]; // Get the header row

        $documents = [];
        foreach ($data->getValueRanges()[0]->values as $key => $values) {
            if ($key === 0) {
                continue; // Skip the header row
            }
            $document = [];
            foreach ($values as $index => $value) {
                $document[$headers[$index]] = $value; // Map values to headers
            }
            $documents[] = (object) $document;
        }

        // Eager load sender data
        foreach ($documents as $document) {
            $document->sender = Sender::find($document->sender_id);
        }

        return $documents;
    }

    public function createData($data)
    {
        $values = [array_values($data)];
        $range = 'Sheet1';
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'USER_ENTERED'
        ];

        // dd($values, $range, $body, $params);
        $this->googleSheetService->spreadsheets_values->update(
            $this->spreadSheetId,
            $range,
            $body,
            $params
        );
    }


    public function updateData($range, $data)
    {
        $values = [array_values($data)];
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'USER_ENTERED'
        ];
        $this->googleSheetService->spreadsheets_values->update(
            $this->spreadSheetId,
            $range,
            $body,
            $params
        );
    }

    public function deleteData($range)
    {
        $this->googleSheetService->spreadsheets_values->clear(
            $this->spreadSheetId,
            $range,
            new \Google_Service_Sheets_ClearValuesRequest()
        );
    }

    private function getDimensions($spreadSheetId)
    {
        $rowDimensions = $this->googleSheetService->spreadsheets_values->batchGet(
            $spreadSheetId,
            ['ranges' => 'Sheet1!A:A', 'majorDimension' => 'COLUMNS']
        );

        //if data is present at nth row, it will return array till nth row
        //if all column values are empty, it returns null
        $rowMeta = $rowDimensions->getValueRanges()[0]->values;
        if (!$rowMeta) {
            return [
                'error' => true,
                'message' => 'missing row data'
            ];
        }

        $colDimensions = $this->googleSheetService->spreadsheets_values->batchGet(
            $spreadSheetId,
            ['ranges' => 'Sheet1!1:1', 'majorDimension' => 'ROWS']
        );

        //if data is present at nth col, it will return array till nth col
        //if all column values are empty, it returns null
        $colMeta = $colDimensions->getValueRanges()[0]->values;
        if (!$colMeta) {
            return [
                'error' => true,
                'message' => 'missing row data'
            ];
        }

        return [
            'error' => false,
            'rowCount' => count($rowMeta[0]),
            'colCount' => $this->colLengthToColumnAddress(count($colMeta[0]))
        ];
    }

    public  function colLengthToColumnAddress($number)
    {
        if ($number <= 0) return null;

        $letter = '';
        while ($number > 0) {
            $temp = ($number - 1) % 26;
            $letter = chr($temp + 65) . $letter;
            $number = ($number - $temp - 1) / 26;
        }
        return $letter;
    }
}
