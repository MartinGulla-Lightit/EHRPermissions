<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <a
        class="btn btn-info"
        v-if="code == undefined"
        style="text-decoration: none"
        target="_blank"
        href="https://fhir.epic.com/interconnect-fhir-oauth/oauth2/authorize?response_type=code&redirect_uri=http://ehr-permissions.test/epic&client_id=04c72b21-9412-48d9-986d-27412e18b69e&state=1234&scope=patient.read patient.search"
      >login with epic</a>
</html>
