<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div>
    <a
        class="btn btn-info"
        v-if="code == undefined"
        style="text-decoration: none"
        target="_blank"
        href={{"https://fhir.epic.com/interconnect-fhir-oauth/oauth2/authorize?response_type=code&redirect_uri=" . config('epic.redirect_uri') . "&client_id=" . config('epic.client_id') . "&state=1234&scope=patient.read patient.search"}}
      >login with epic</a>
      <br>
      <a
        class="btn btn-info"
        v-if="code == undefined"
        style="text-decoration: none"
        target="_blank"
        href={{"https://myidentity-support.platform.athenahealth.com/oauth2/v1/authorize?client_id=" . config('athena.client_id') . "&response_type=code&redirect_uri=" . config('athena.redirect_uri') . "&state=1234&scope=patient.read patient.search&nonce=1234"}}
      >login with athena</a>
      <br>
      <a
        class="btn btn-info"
        v-if="code == undefined"
        style="text-decoration: none"
        target="_blank"
        href={{"https://fhir.fhirpoint.open.allscripts.com/fhirroute/authorization/CustProProdSand201SMART/connect/authorize?client_id=" . config('allscript.client_id') . "&response_type=code&redirect_uri=" . config('allscript.redirect_uri') . "&state=1234&scope=launch user/*.read"}}
      >login with allscript</a>
</div>
</html>
