<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <a
        class="btn btn-info"
        v-if="code == undefined"
        style="text-decoration: none"
        target="_blank"
        href={{"https://fhir.epic.com/interconnect-fhir-oauth/oauth2/authorize?response_type=code&redirect_uri=" . config('epic.redirect_uri') . "&client_id=" . config('epic.client_id') . "&state=1234&scope=patient.read patient.search"}}
      >login with epic</a>
</html>
