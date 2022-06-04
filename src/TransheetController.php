<?php

namespace Vladislavbogomolov\Transheet;

use Google\Client;
use Google\Service\Sheets;

class TransheetController
{

    private string $_translation_folder;

    function __construct()
    {
        $this->_translation_folder = base_path('lang');
    }

    function downloadTranslations(): bool
    {
        $client = new Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig(base_path('client_secret.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setApprovalPrompt("consent");
        $client->setIncludeGrantedScopes(true);   // incremental auth

        $service = new Sheets($client);

        $spreadsheetId = env('SPREADSHEETID', '');

        $range = env('SHEETNAME', '');
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $rows = $response->getValues();


        $languages = array_shift($rows);
        array_shift($languages);
        $files = [];


        foreach ($rows as $row) {
            $key = array_shift($row);
            foreach ($row as $index => $col) {
                $files[$languages[$index]][$key] = $col;
            }
        }

        if (!file_exists($this->_translation_folder)) {
            mkdir($this->_translation_folder, 0777, true);
        }

        foreach ($files as $language => $file) {

            if (!file_exists($this->_translation_folder . '/' . $language)) {
                mkdir($this->_translation_folder . '/' . $language, 0777, true);
            }

            file_put_contents($this->_translation_folder . '/' . $language . '/transheet.php', '<?php return ' . var_export($file, true) . ';');
        }

        return true;
    }

}
