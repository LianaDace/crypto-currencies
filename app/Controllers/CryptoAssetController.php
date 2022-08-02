<?php

namespace App\Controllers;

use App\Models\CryptoAsset;


class CryptoAssetController
{

    public function index()
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';

        $parameters = [

            'start' => "1",
            'limit' => '10',
            'convert' => 'EUR'

        ];

        $headers = ['Accepts: application/json',
            'X-CMC_PRO_API_KEY: 94dae342-42a8-42f8-89f6-4088ecf73af7'];
        $qs = http_build_query($parameters);
        $request = "{$url}?{$qs}";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

        $assets = json_decode(curl_exec($curl));
        curl_close($curl);

        $cryptoAssets = [];

        foreach ($assets->data as $asset)
        {
            $cryptoAssets[] = new CryptoAsset(
                $asset->name,
                $asset->symbol,
                $asset->quote->EUR->price
            );

        }

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('crypto-asset-index.twig');

        return $template->render(['assets' => $cryptoAssets]);

    }
}