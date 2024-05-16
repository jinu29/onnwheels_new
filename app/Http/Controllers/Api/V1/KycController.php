<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class KycController extends Controller
{
    public function pan_verify(Request $request)
    {
        $request->validate([
            'pan_number' => 'required|string',
            'purpose' => 'required|integer',
            'purpose_desc' => 'required|string',
        ]);

        $panNumber = $request->input('pan_number');
        $purpose = $request->input('purpose');
        $purposeDesc = $request->input('purpose_desc');

        $client = new Client();

        try {
            $config = \App\CentralLogics\Helpers::get_business_settings('kycconfig');

            $response = $client->request('POST', $config['prod_url'] . '/v1/pan/verify', [
                'form_params' => [
                    'pan_number' => $panNumber,
                    'purpose' => $purpose,
                    'initiator_id' => $config['initiator_id'],
                    'purpose_desc' => $purposeDesc,
                ],
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'developer_key' => $config['developer_key'],
                    'secret-key' => $config['secret_key'],
                    'secret-key-timestamp' => $config['secret_key_timestamp'],
                ],
            ]);

            $responseBody = $response->getBody()->getContents();

            $responseData = json_decode($responseBody, true);

            return response()->json($responseData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    public function aadhar_verify(Request $request)
    {
        $request->validate([
            'aadhar' => 'required|integer',
            'realsourceip' => 'required',
            'access_key' => 'required',
        ]);

        $aadhar = $request->input('aadhar');
        $isConsent = "Y";
        $realsourceip = $request->input('realsourceip');
        $accessKey = $request->input('access_key');
        $source = "NEWCONNECT";

        $client = new Client();

        try {
            $config = \App\CentralLogics\Helpers::get_business_settings('kycconfig');

            $response = $client->request('GET', $config['prod_url'] . '/v2/external/getAdhaarOTP', [
                'query' => [
                    'aadhar' => $aadhar,
                    'is_consent' => $isConsent,
                    'realsourceip' => $realsourceip,
                    'caseId' => $aadhar,
                    'access_key' => $accessKey,
                    'source' => $source,
                    'user_code' => $config['user_code'],
                    'initiator_id' => $config['initiator_id']
                ],
                'headers' => [
                    'Accept-Encoding' => 'gzip, deflate, br',
                    'developer_key' => $config['developer_key'],
                    'secret-key' => $config['secret_key'],
                    'secret-key-timestamp' => $config['secret_key_timestamp'],
                    'accept' => 'application/json',
                ],
            ]);

            dd($response);
            $responseBody = $response->getBody()->getContents();

            $responseData = json_decode($responseBody, true);

            return response()->json($responseData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
