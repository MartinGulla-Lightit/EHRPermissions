<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EpicLoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $code = $request->code;
        $redirectURI = config('epic.redirect_uri');
        $clientId = config('epic.client_id');
        $loginResponse = Http::asForm()->post('https://fhir.epic.com/interconnect-fhir-oauth/oauth2/token', [
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirectURI,
            'code' => $code,
            'client_id' => $clientId,
            'state' => '1234'
        ]);
        $accessToken = $loginResponse->json()['access_token'];
        $patient = $loginResponse->json()['patient'];
        if ($accessToken) {
            $patient = Http::accept('application/json')
                ->withToken($accessToken)
                ->get("https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Patient/" . $patient, );
            $user = User::where('patient_id', $patient->json()['id'])->first();
            if (!$user) {
                $email = '';
                $name = $patient->json()['name'][0]['text'];
                $patientId = $patient->json()['resourceType'] == 'Patient' ? $patient->json()['id'] : null;
                $doctorId = $patient->json()['resourceType'] == 'Doctor' ? $patient->json()['id'] : null;
                foreach ($patient->json()['telecom'] as $telecom) {
                    if ($telecom['system'] == 'email') {
                        $email = $telecom['value'];
                    }
                }
                DB::table('request')->insert([
                    'patient_id' => $patientId,
                    'doctor_id' => $doctorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'name' => $name,
                    'email' => $email
                ]);
                return view('request');
            } else {
                return view('user', ['user' => $user]);
            }
        }
    }
}
