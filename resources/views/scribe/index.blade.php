<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Record on the go API</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://127.0.0.1:8000/";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.21.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.21.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-register">
                        <a href="#authentication-POSTapi-register">Create new user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                        <a href="#authentication-POSTapi-login">Login</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-logout">
                        <a href="#authentication-POSTapi-logout">Logout</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                        <a href="#endpoints-GETapi-user">GET api/user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-createProject">
                        <a href="#endpoints-POSTapi-createProject">POST api/createProject</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-createPurchase">
                        <a href="#endpoints-POSTapi-createPurchase">POST api/createPurchase</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETsanctum-csrf-cookie">
                        <a href="#endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GET-">
                        <a href="#endpoints-GET-">GET /</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETlogin">
                        <a href="#endpoints-GETlogin">GET login</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="enterprise-management">
                    <a href="#enterprise-management">Enterprise Management</a>
                </li>
                                    <ul id="tocify-subheader-enterprise-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="enterprise-management-GETapi-getEnterprise">
                        <a href="#enterprise-management-GETapi-getEnterprise">Get enterprise details</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="enterprise-management-GETapi-getProducts--id-">
                        <a href="#enterprise-management-GETapi-getProducts--id-">Get all products</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="enterprise-management-POSTapi-updateEnterprise--id-">
                        <a href="#enterprise-management-POSTapi-updateEnterprise--id-">Update enterprise details</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="enterprise-management-POSTapi-addOfficer">
                        <a href="#enterprise-management-POSTapi-addOfficer">Add data entry officer</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="enterprise-management-GETapi-getEnterpriseTypes">
                        <a href="#enterprise-management-GETapi-getEnterpriseTypes">Get all enterprise types</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 24 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://rotgbackend.complanettechnologies.com.ng/</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="authentication">Authentication</h1>

    <p>User authentication</p>

            <h2 id="authentication-POSTapi-register">Create new user</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"magnam\",
    \"phone_no\": \"fuga\",
    \"email\": \"repellendus\",
    \"password\": \"non\",
    \"enterprise_typeId\": 5,
    \"business_entity_type\": \"nulla\",
    \"no_of_employees\": 4,
    \"address\": \"ea\",
    \"website_url\": \"quod\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "magnam",
    "phone_no": "fuga",
    "email": "repellendus",
    "password": "non",
    "enterprise_typeId": 5,
    "business_entity_type": "nulla",
    "no_of_employees": 4,
    "address": "ea",
    "website_url": "quod"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/register',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'magnam',
            'phone_no' =&gt; 'fuga',
            'email' =&gt; 'repellendus',
            'password' =&gt; 'non',
            'enterprise_typeId' =&gt; 5,
            'business_entity_type' =&gt; 'nulla',
            'no_of_employees' =&gt; 4,
            'address' =&gt; 'ea',
            'website_url' =&gt; 'quod',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-register"
               value="magnam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>phone_no</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone_no"
               data-endpoint="POSTapi-register"
               value="fuga"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-register"
               value="repellendus"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-register"
               value="non"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>enterprise_typeId</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="enterprise_typeId"
               data-endpoint="POSTapi-register"
               value="5"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>business_entity_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="business_entity_type"
               data-endpoint="POSTapi-register"
               value="nulla"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>no_of_employees</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="no_of_employees"
               data-endpoint="POSTapi-register"
               value="4"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="address"
               data-endpoint="POSTapi-register"
               value="ea"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>website_url</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="website_url"
               data-endpoint="POSTapi-register"
               value="quod"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="authentication-POSTapi-login">Login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"et\",
    \"password\": \"modi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "et",
    "password": "modi"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'et',
            'password' =&gt; 'modi',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-login"
               value="et"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-login"
               value="modi"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="authentication-POSTapi-logout">Logout</h2>

<p>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/logout',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
</span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                    </form>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/api/user',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Auth guard [web] is not defined.&quot;,
    &quot;exception&quot;: &quot;InvalidArgumentException&quot;,
    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
    &quot;line&quot;: 84,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;resolve&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\sanctum\\src\\Guard.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;guard&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Guard&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\RequestGuard.php&quot;,
            &quot;line&quot;: 58,
            &quot;function&quot;: &quot;call_user_func&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\GuardHelpers.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;user&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\RequestGuard&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\Authenticate.php&quot;,
            &quot;line&quot;: 63,
            &quot;function&quot;: &quot;check&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\RequestGuard&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\Authenticate.php&quot;,
            &quot;line&quot;: 42,
            &quot;function&quot;: &quot;authenticate&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 697,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 672,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 636,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 625,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 117,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 75,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 48,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 136,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 978,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 295,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 94,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\record-go\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-createProject">POST api/createProject</h2>

<p>
</p>



<span id="example-requests-POSTapi-createProject">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/createProject" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/createProject"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/createProject',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-createProject">
</span>
<span id="execution-results-POSTapi-createProject" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-createProject"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-createProject"></code></pre>
</span>
<span id="execution-error-POSTapi-createProject" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-createProject"></code></pre>
</span>
<form id="form-POSTapi-createProject" data-method="POST"
      data-path="api/createProject"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-createProject', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-createProject"
                    onclick="tryItOut('POSTapi-createProject');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-createProject"
                    onclick="cancelTryOut('POSTapi-createProject');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-createProject" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/createProject</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-createPurchase">POST api/createPurchase</h2>

<p>
</p>



<span id="example-requests-POSTapi-createPurchase">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/createPurchase" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/createPurchase"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/createPurchase',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-createPurchase">
</span>
<span id="execution-results-POSTapi-createPurchase" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-createPurchase"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-createPurchase"></code></pre>
</span>
<span id="execution-error-POSTapi-createPurchase" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-createPurchase"></code></pre>
</span>
<form id="form-POSTapi-createPurchase" data-method="POST"
      data-path="api/createPurchase"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-createPurchase', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-createPurchase"
                    onclick="tryItOut('POSTapi-createPurchase');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-createPurchase"
                    onclick="cancelTryOut('POSTapi-createPurchase');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-createPurchase" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/createPurchase</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>

<p>
</p>



<span id="example-requests-GETsanctum-csrf-cookie">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/sanctum/csrf-cookie" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/sanctum/csrf-cookie"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/sanctum/csrf-cookie',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETsanctum-csrf-cookie">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6Imtod1pCc1NiUGY1S0Z0MmVOeGRoTkE9PSIsInZhbHVlIjoieThhQTIxR083S0VTL1ZTTitoQWNOODRJMTVaSmVUOU1vaGRWdytSVkpUZWlUdEFsWjlLRUlKVlQ5WHJHY01JeWVVY3RsSk1JUm9LZzVnOVhJVXdCYjFKYmwwTVdGeFpSV2ZzUDk5S1YwRmRTNlhSalNXWkNkVlQ0UzlzRmMwbTIiLCJtYWMiOiI0ZGFiMDg4NTQyOTFlZTgxMzI0MDBkZDZhYTA2MGI1YmIwYTdmNTdmZjBlMmIzYWU3NWRlNjI5ZGZjMWI0YjU5IiwidGFnIjoiIn0%3D; expires=Mon, 24-Jan-2022 15:52:11 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImRnRXU1T2VNTzdnWUo5S0ZiNkpNbHc9PSIsInZhbHVlIjoiKzNabk1DVjRLUVB1UXNyOUlkTjFKZllPVStrQml6Z0w2NzNYRWd2LzNqZWx0bWRyVUx0OUkrcUhFNlloUnF2WW1kdFZqamdpN3laVjlpcjVwNHVERGFoYXE5VCtaeldLUDRvL0IzUUZxbURiQ0RIZm4rTEowanJqYTd2QjBIWk4iLCJtYWMiOiJkZTFjNGI1ZmE5YTk5NTM5YTdkZTMwZGY3ZDY0N2ExODJmMmQwNGI3ZDRiYmUzMWY3MmQ4MTc4Yzg5ZjgzOWIwIiwidGFnIjoiIn0%3D; expires=Mon, 24-Jan-2022 15:52:11 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>
<code>[Empty response]</code>
 </pre>
    </span>
<span id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsanctum-csrf-cookie"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</span>
<span id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</span>
<form id="form-GETsanctum-csrf-cookie" data-method="GET"
      data-path="sanctum/csrf-cookie"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsanctum-csrf-cookie"
                    onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsanctum-csrf-cookie"
                    onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>sanctum/csrf-cookie</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GET-">GET /</h2>

<p>
</p>



<span id="example-requests-GET-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GET-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6Im9ETm1VODlUdlJOcHlFNVh0TDBPSEE9PSIsInZhbHVlIjoibG9hKzk5Y0dJVEdoLzlwUDR5YThyZyttMDU3Y3ZKRjZYQUhnTlYxbysvZ3RjSVhRUkxaRFk4c0c4ZFRQdHM3dmhzU3VTcEVQVEZPV1B4czJIT1ZlWFIrNDkyZVhrMEJHSDVKZ3JVLzN1RlpjOExLZmc1ZE83V1VnSDlqcFBDVFIiLCJtYWMiOiJiYThjYmI1YThiNjkyZTg4ODNlNmFlMzkwNmNkNjBlZWZhYmNkYzdlODQ4N2MxMzNhNTIxZDNkOGY3ZTMyMDVlIiwidGFnIjoiIn0%3D; expires=Mon, 24-Jan-2022 15:52:15 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlJWeVNiRW5zM1N1bkRqM3ZqWEFmdGc9PSIsInZhbHVlIjoibDA4SFJmeWJoa293bHMvY0ltOHNKNkI4OW5zbDZEL3Z5OVJYYUZBOFppTm5teEY1bkgyUzVVeHQ5YURYVkVvcGpCbm9sajQ0c000ZzFlamlCbDFER1MvN29LMUJCbUJRVGFKNEMwcTZFdE9DMVYrTTJGcWNUZGh4dVJ2OGNhRlkiLCJtYWMiOiI2OWUwYmFjMDdkMDczNTkzMTE2M2IyZjBmYTExMjdkZjIyOWFhYWFmNmQ3ODA2NzM0YTdjNzBkMDU0YWZlNjJmIiwidGFnIjoiIn0%3D; expires=Mon, 24-Jan-2022 15:52:15 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link href=&quot;https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap&quot; rel=&quot;stylesheet&quot;&gt;

        &lt;!-- Styles --&gt;
        &lt;style&gt;
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        &lt;/style&gt;

        &lt;style&gt;
            body {
                font-family: 'Nunito', sans-serif;
            }
        &lt;/style&gt;
    &lt;/head&gt;
    &lt;body class=&quot;antialiased&quot;&gt;
        &lt;div class=&quot;relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0&quot;&gt;
                            &lt;div class=&quot;hidden fixed top-0 right-0 px-6 py-4 sm:block&quot;&gt;
                                            &lt;a href=&quot;http://rotgbackend.complanettechnologies.com.ng/login&quot; class=&quot;text-sm text-gray-700 dark:text-gray-500 underline&quot;&gt;Log in&lt;/a&gt;

                                                            &lt;/div&gt;
            
            &lt;div class=&quot;max-w-6xl mx-auto sm:px-6 lg:px-8&quot;&gt;
                &lt;div class=&quot;flex justify-center pt-8 sm:justify-start sm:pt-0&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 651 192&quot; fill=&quot;none&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;h-16 w-auto text-gray-700 sm:h-20&quot;&gt;
                        &lt;g clip-path=&quot;url(#clip0)&quot; fill=&quot;#EF3B2D&quot;&gt;
                            &lt;path d=&quot;M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z&quot;/&gt;
                        &lt;/g&gt;
                    &lt;/svg&gt;
                &lt;/div&gt;

                &lt;div class=&quot;mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg&quot;&gt;
                    &lt;div class=&quot;grid grid-cols-1 md:grid-cols-2&quot;&gt;
                        &lt;div class=&quot;p-6&quot;&gt;
                            &lt;div class=&quot;flex items-center&quot;&gt;
                                &lt;svg fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot; class=&quot;w-8 h-8 text-gray-500&quot;&gt;&lt;path d=&quot;M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253&quot;&gt;&lt;/path&gt;&lt;/svg&gt;
                                &lt;div class=&quot;ml-4 text-lg leading-7 font-semibold&quot;&gt;&lt;a href=&quot;https://laravel.com/docs&quot; class=&quot;underline text-gray-900 dark:text-white&quot;&gt;Documentation&lt;/a&gt;&lt;/div&gt;
                            &lt;/div&gt;

                            &lt;div class=&quot;ml-12&quot;&gt;
                                &lt;div class=&quot;mt-2 text-gray-600 dark:text-gray-400 text-sm&quot;&gt;
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l&quot;&gt;
                            &lt;div class=&quot;flex items-center&quot;&gt;
                                &lt;svg fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot; class=&quot;w-8 h-8 text-gray-500&quot;&gt;&lt;path d=&quot;M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z&quot;&gt;&lt;/path&gt;&lt;path d=&quot;M15 13a3 3 0 11-6 0 3 3 0 016 0z&quot;&gt;&lt;/path&gt;&lt;/svg&gt;
                                &lt;div class=&quot;ml-4 text-lg leading-7 font-semibold&quot;&gt;&lt;a href=&quot;https://laracasts.com&quot; class=&quot;underline text-gray-900 dark:text-white&quot;&gt;Laracasts&lt;/a&gt;&lt;/div&gt;
                            &lt;/div&gt;

                            &lt;div class=&quot;ml-12&quot;&gt;
                                &lt;div class=&quot;mt-2 text-gray-600 dark:text-gray-400 text-sm&quot;&gt;
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;p-6 border-t border-gray-200 dark:border-gray-700&quot;&gt;
                            &lt;div class=&quot;flex items-center&quot;&gt;
                                &lt;svg fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot; class=&quot;w-8 h-8 text-gray-500&quot;&gt;&lt;path d=&quot;M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z&quot;&gt;&lt;/path&gt;&lt;/svg&gt;
                                &lt;div class=&quot;ml-4 text-lg leading-7 font-semibold&quot;&gt;&lt;a href=&quot;https://laravel-news.com/&quot; class=&quot;underline text-gray-900 dark:text-white&quot;&gt;Laravel News&lt;/a&gt;&lt;/div&gt;
                            &lt;/div&gt;

                            &lt;div class=&quot;ml-12&quot;&gt;
                                &lt;div class=&quot;mt-2 text-gray-600 dark:text-gray-400 text-sm&quot;&gt;
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;p-6 border-t border-gray-200 dark:border-gray-700 md:border-l&quot;&gt;
                            &lt;div class=&quot;flex items-center&quot;&gt;
                                &lt;svg fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot; class=&quot;w-8 h-8 text-gray-500&quot;&gt;&lt;path d=&quot;M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z&quot;&gt;&lt;/path&gt;&lt;/svg&gt;
                                &lt;div class=&quot;ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white&quot;&gt;Vibrant Ecosystem&lt;/div&gt;
                            &lt;/div&gt;

                            &lt;div class=&quot;ml-12&quot;&gt;
                                &lt;div class=&quot;mt-2 text-gray-600 dark:text-gray-400 text-sm&quot;&gt;
                                    Laravel's robust library of first-party tools and libraries, such as &lt;a href=&quot;https://forge.laravel.com&quot; class=&quot;underline&quot;&gt;Forge&lt;/a&gt;, &lt;a href=&quot;https://vapor.laravel.com&quot; class=&quot;underline&quot;&gt;Vapor&lt;/a&gt;, &lt;a href=&quot;https://nova.laravel.com&quot; class=&quot;underline&quot;&gt;Nova&lt;/a&gt;, and &lt;a href=&quot;https://envoyer.io&quot; class=&quot;underline&quot;&gt;Envoyer&lt;/a&gt; help you take your projects to the next level. Pair them with powerful open source libraries like &lt;a href=&quot;https://laravel.com/docs/billing&quot; class=&quot;underline&quot;&gt;Cashier&lt;/a&gt;, &lt;a href=&quot;https://laravel.com/docs/dusk&quot; class=&quot;underline&quot;&gt;Dusk&lt;/a&gt;, &lt;a href=&quot;https://laravel.com/docs/broadcasting&quot; class=&quot;underline&quot;&gt;Echo&lt;/a&gt;, &lt;a href=&quot;https://laravel.com/docs/horizon&quot; class=&quot;underline&quot;&gt;Horizon&lt;/a&gt;, &lt;a href=&quot;https://laravel.com/docs/sanctum&quot; class=&quot;underline&quot;&gt;Sanctum&lt;/a&gt;, &lt;a href=&quot;https://laravel.com/docs/telescope&quot; class=&quot;underline&quot;&gt;Telescope&lt;/a&gt;, and more.
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;

                &lt;div class=&quot;flex justify-center mt-4 sm:items-center sm:justify-between&quot;&gt;
                    &lt;div class=&quot;text-center text-sm text-gray-500 sm:text-left&quot;&gt;
                        &lt;div class=&quot;flex items-center&quot;&gt;
                            &lt;svg fill=&quot;none&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot; stroke=&quot;currentColor&quot; class=&quot;-mt-px w-5 h-5 text-gray-400&quot;&gt;
                                &lt;path d=&quot;M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z&quot;&gt;&lt;/path&gt;
                            &lt;/svg&gt;

                            &lt;a href=&quot;https://laravel.bigcartel.com&quot; class=&quot;ml-1 underline&quot;&gt;
                                Shop
                            &lt;/a&gt;

                            &lt;svg fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot; class=&quot;ml-4 -mt-px w-5 h-5 text-gray-400&quot;&gt;
                                &lt;path d=&quot;M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z&quot;&gt;&lt;/path&gt;
                            &lt;/svg&gt;

                            &lt;a href=&quot;https://github.com/sponsors/taylorotwell&quot; class=&quot;ml-1 underline&quot;&gt;
                                Sponsor
                            &lt;/a&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                    &lt;div class=&quot;ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0&quot;&gt;
                        Laravel v8.70.2 (PHP v7.4.4)
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</span>
<span id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</span>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETlogin">GET login</h2>

<p>
</p>



<span id="example-requests-GETlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETlogin">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IkY0ZWxDNjVMQi96TlNWNnFubWxpNXc9PSIsInZhbHVlIjoibGthTEs0cm1DQzBWdXJ6MXExUFNQY1V1Sm9OT05EUG5IaVMrelFnd0JCcHBBUVluKy9CZFJzeU1aVzgvWG5jNEFKV1FHYjJtZ2JtU0FSaExGOVI4b2d6ODdVdHg2QzNLWVZ5MDBOeE9NU2hGZ2crYW81ZGMwREZVaThmNnZ4d0oiLCJtYWMiOiIzYzQ0ODJlNzNmOTU3NGU3OTcwNmRhYzQ5MzY5NGNhNDc4OGE5NWE2OTYwZWNmMThjNzE3NTE3NTc4YzYxOGY5IiwidGFnIjoiIn0%3D; expires=Mon, 24-Jan-2022 15:52:15 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkFqd204Ti9tYmd4eURvblBlWE5oWWc9PSIsInZhbHVlIjoiNncxaVBQVDAwQVhQVW1NQ0tDRDZPVldlNmVUWEV4SW0xaTZ5dlRaZmxMYmRhWWZzVUlVWGhTRXB3cFM3aW1Od1Y3NkNzNGRiNXdsYitYV3dSVTFHK0ZUbW01emF1VkE1a2NWcDRpTWhjS0NnNHlnNlZ1Qk5QOTZsa2tjZkpFcUgiLCJtYWMiOiJkNTNlMjU4YzUwZjM4OGJhNjQyNTc0YzRhZDdjN2JlOGMzMzk4ZWFmNDg4MzdlNjcwMmRiZjY1NDkzMWQ2ZWI4IiwidGFnIjoiIn0%3D; expires=Mon, 24-Jan-2022 15:52:15 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">Login</code>
 </pre>
    </span>
<span id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</span>
<span id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</span>
<form id="form-GETlogin" data-method="GET"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlogin"
                    onclick="tryItOut('GETlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlogin"
                    onclick="cancelTryOut('GETlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlogin" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>login</code></b>
        </p>
                    </form>

        <h1 id="enterprise-management">Enterprise Management</h1>

    

            <h2 id="enterprise-management-GETapi-getEnterprise">Get enterprise details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-getEnterprise">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/api/getEnterprise" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/getEnterprise"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/api/getEnterprise',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-getEnterprise">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-getEnterprise" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-getEnterprise"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-getEnterprise"></code></pre>
</span>
<span id="execution-error-GETapi-getEnterprise" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-getEnterprise"></code></pre>
</span>
<form id="form-GETapi-getEnterprise" data-method="GET"
      data-path="api/getEnterprise"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-getEnterprise', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-getEnterprise"
                    onclick="tryItOut('GETapi-getEnterprise');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-getEnterprise"
                    onclick="cancelTryOut('GETapi-getEnterprise');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-getEnterprise" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/getEnterprise</code></b>
        </p>
                <p>
            <label id="auth-GETapi-getEnterprise" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-getEnterprise"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="enterprise-management-GETapi-getProducts--id-">Get all products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-getProducts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/api/getProducts/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/getProducts/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/api/getProducts/13',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-getProducts--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-getProducts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-getProducts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-getProducts--id-"></code></pre>
</span>
<span id="execution-error-GETapi-getProducts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-getProducts--id-"></code></pre>
</span>
<form id="form-GETapi-getProducts--id-" data-method="GET"
      data-path="api/getProducts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-getProducts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-getProducts--id-"
                    onclick="tryItOut('GETapi-getProducts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-getProducts--id-"
                    onclick="cancelTryOut('GETapi-getProducts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-getProducts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/getProducts/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-getProducts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-getProducts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-getProducts--id-"
               value="13"
               data-component="url" hidden>
    <br>
<p>This ID is the id of the enterprise type that the products belong to.</p>
            </p>
                    </form>

            <h2 id="enterprise-management-POSTapi-updateEnterprise--id-">Update enterprise details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-updateEnterprise--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/updateEnterprise/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"enterpriseName\": \"doloremque\",
    \"enterpriseTypeId\": 13,
    \"businessEntitytype\": \"sit\",
    \"noOfEmployees\": 8,
    \"address\": \"vel\",
    \"websiteUrl\": \"est\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/updateEnterprise/19"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "enterpriseName": "doloremque",
    "enterpriseTypeId": 13,
    "businessEntitytype": "sit",
    "noOfEmployees": 8,
    "address": "vel",
    "websiteUrl": "est"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/updateEnterprise/19',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'enterpriseName' =&gt; 'doloremque',
            'enterpriseTypeId' =&gt; 13,
            'businessEntitytype' =&gt; 'sit',
            'noOfEmployees' =&gt; 8,
            'address' =&gt; 'vel',
            'websiteUrl' =&gt; 'est',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-updateEnterprise--id-">
</span>
<span id="execution-results-POSTapi-updateEnterprise--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-updateEnterprise--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-updateEnterprise--id-"></code></pre>
</span>
<span id="execution-error-POSTapi-updateEnterprise--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-updateEnterprise--id-"></code></pre>
</span>
<form id="form-POSTapi-updateEnterprise--id-" data-method="POST"
      data-path="api/updateEnterprise/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-updateEnterprise--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-updateEnterprise--id-"
                    onclick="tryItOut('POSTapi-updateEnterprise--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-updateEnterprise--id-"
                    onclick="cancelTryOut('POSTapi-updateEnterprise--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-updateEnterprise--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/updateEnterprise/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-updateEnterprise--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-updateEnterprise--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="19"
               data-component="url" hidden>
    <br>
<p>The ID of the products.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>enterpriseName</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="enterpriseName"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="doloremque"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>enterpriseTypeId</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="enterpriseTypeId"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="13"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>businessEntitytype</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="businessEntitytype"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="sit"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>noOfEmployees</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="noOfEmployees"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="8"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="address"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="vel"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>websiteUrl</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="websiteUrl"
               data-endpoint="POSTapi-updateEnterprise--id-"
               value="est"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="enterprise-management-POSTapi-addOfficer">Add data entry officer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-addOfficer">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://rotgbackend.complanettechnologies.com.ng/api/addOfficer" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"aperiam\",
    \"phone_no\": \"optio\",
    \"email\": \"rem\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/addOfficer"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "aperiam",
    "phone_no": "optio",
    "email": "rem"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://rotgbackend.complanettechnologies.com.ng/api/addOfficer',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'aperiam',
            'phone_no' =&gt; 'optio',
            'email' =&gt; 'rem',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-addOfficer">
</span>
<span id="execution-results-POSTapi-addOfficer" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-addOfficer"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-addOfficer"></code></pre>
</span>
<span id="execution-error-POSTapi-addOfficer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-addOfficer"></code></pre>
</span>
<form id="form-POSTapi-addOfficer" data-method="POST"
      data-path="api/addOfficer"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-addOfficer', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-addOfficer"
                    onclick="tryItOut('POSTapi-addOfficer');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-addOfficer"
                    onclick="cancelTryOut('POSTapi-addOfficer');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-addOfficer" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/addOfficer</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-addOfficer" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-addOfficer"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-addOfficer"
               value="aperiam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>phone_no</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone_no"
               data-endpoint="POSTapi-addOfficer"
               value="optio"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-addOfficer"
               value="rem"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="enterprise-management-GETapi-getEnterpriseTypes">Get all enterprise types</h2>

<p>
</p>



<span id="example-requests-GETapi-getEnterpriseTypes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://rotgbackend.complanettechnologies.com.ng/api/getEnterpriseTypes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://rotgbackend.complanettechnologies.com.ng/api/getEnterpriseTypes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://rotgbackend.complanettechnologies.com.ng/api/getEnterpriseTypes',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-getEnterpriseTypes">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;type_name&quot;: &quot;Crops&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 2,
        &quot;type_name&quot;: &quot;Livestock&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 3,
        &quot;type_name&quot;: &quot;Processing&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 4,
        &quot;type_name&quot;: &quot;Integrated&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-getEnterpriseTypes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-getEnterpriseTypes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-getEnterpriseTypes"></code></pre>
</span>
<span id="execution-error-GETapi-getEnterpriseTypes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-getEnterpriseTypes"></code></pre>
</span>
<form id="form-GETapi-getEnterpriseTypes" data-method="GET"
      data-path="api/getEnterpriseTypes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-getEnterpriseTypes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-getEnterpriseTypes"
                    onclick="tryItOut('GETapi-getEnterpriseTypes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-getEnterpriseTypes"
                    onclick="cancelTryOut('GETapi-getEnterpriseTypes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-getEnterpriseTypes" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/getEnterpriseTypes</code></b>
        </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
