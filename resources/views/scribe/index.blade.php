<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Roast Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://api-roast.dev.test";
        var useCsrf = Boolean(1);
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.28.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.28.0.js") }}"></script>

</head>

<body data-languages="[&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-company" class="tocify-header">
                <li class="tocify-item level-1" data-unique="company">
                    <a href="#company">Company</a>
                </li>
                                    <ul id="tocify-subheader-company" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="company-GETapi-v1-companies">
                                <a href="#company-GETapi-v1-companies">Retrieve a paginated list of companies based on specified filters and sorting.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-GETapi-v1-companies--slug-">
                                <a href="#company-GETapi-v1-companies--slug-">Get company</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-POSTapi-v1-companies">
                                <a href="#company-POSTapi-v1-companies">Add a new company</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-user" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user">
                    <a href="#user">User</a>
                </li>
                                    <ul id="tocify-subheader-user" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-GETapi-v1-user">
                                <a href="#user-GETapi-v1-user">Get the authenticated user</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 26, 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://api-roast.dev.test</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="company">Company</h1>

    

                                <h2 id="company-GETapi-v1-companies">Retrieve a paginated list of companies based on specified filters and sorting.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-companies">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://api-roast.dev.test/api/v1/companies"
);

const params = {
    "filter[name]": "Starbucks",
    "filter[city]": "New York",
    "filter[state]": "California",
    "filter[roaster]": "1",
    "filter[subscription]": "1",
    "filter[liked]": "1",
    "sort": "name",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
$url = 'https://api-roast.dev.test/api/v1/companies';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'filter[name]' =&gt; 'Starbucks',
            'filter[city]' =&gt; 'New York',
            'filter[state]' =&gt; 'California',
            'filter[roaster]' =&gt; '1',
            'filter[subscription]' =&gt; '1',
            'filter[liked]' =&gt; '1',
            'sort' =&gt; 'name',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-companies">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Starbucks4&quot;,
            &quot;header_image_url&quot;: &quot;Screenshot 2023-08-05 at 18.30.25_20231126195853.png&quot;,
            &quot;logo_url&quot;: &quot;Screenshot 2023-10-03 at 16.06.42_20231126195852.png&quot;,
            &quot;slug&quot;: &quot;starbucks4&quot;,
            &quot;roaster&quot;: true,
            &quot;subscription&quot;: true,
            &quot;description&quot;: null,
            &quot;website&quot;: null,
            &quot;address&quot;: null,
            &quot;city&quot;: &quot;London&quot;,
            &quot;state&quot;: null,
            &quot;province&quot;: null,
            &quot;territory&quot;: null,
            &quot;zip&quot;: null,
            &quot;country&quot;: null,
            &quot;facebook_url&quot;: null,
            &quot;twitter_url&quot;: null,
            &quot;instagram_url&quot;: null,
            &quot;added_by&quot;: 1,
            &quot;created_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Starbucks4&quot;,
            &quot;header_image_url&quot;: &quot;Screenshot 2023-08-05 at 18.30.25_20231126195853.png&quot;,
            &quot;logo_url&quot;: &quot;Screenshot 2023-10-03 at 16.06.42_20231126195852.png&quot;,
            &quot;slug&quot;: &quot;starbucks4&quot;,
            &quot;roaster&quot;: true,
            &quot;subscription&quot;: true,
            &quot;description&quot;: null,
            &quot;website&quot;: null,
            &quot;address&quot;: null,
            &quot;city&quot;: &quot;London&quot;,
            &quot;state&quot;: null,
            &quot;province&quot;: null,
            &quot;territory&quot;: null,
            &quot;zip&quot;: null,
            &quot;country&quot;: null,
            &quot;facebook_url&quot;: null,
            &quot;twitter_url&quot;: null,
            &quot;instagram_url&quot;: null,
            &quot;added_by&quot;: 1,
            &quot;created_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-companies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-companies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-companies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-companies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-companies" data-method="GET"
      data-path="api/v1/companies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-companies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-companies"
                    onclick="tryItOut('GETapi-v1-companies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-companies"
                    onclick="cancelTryOut('GETapi-v1-companies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-companies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/companies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-companies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-companies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[name]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[name]"                data-endpoint="GETapi-v1-companies"
               value="Starbucks"
               data-component="query">
    <br>
<p>Filter companies by name. Example: <code>Starbucks</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[city]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[city]"                data-endpoint="GETapi-v1-companies"
               value="New York"
               data-component="query">
    <br>
<p>Filter companies by city. Example: <code>New York</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[state]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[state]"                data-endpoint="GETapi-v1-companies"
               value="California"
               data-component="query">
    <br>
<p>Filter companies by state. Example: <code>California</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[roaster]</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="GETapi-v1-companies" style="display: none">
            <input type="radio" name="filter[roaster]"
                   value="1"
                   data-endpoint="GETapi-v1-companies"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-companies" style="display: none">
            <input type="radio" name="filter[roaster]"
                   value="0"
                   data-endpoint="GETapi-v1-companies"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Filter companies by roaster status (exact match). Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[subscription]</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="GETapi-v1-companies" style="display: none">
            <input type="radio" name="filter[subscription]"
                   value="1"
                   data-endpoint="GETapi-v1-companies"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-companies" style="display: none">
            <input type="radio" name="filter[subscription]"
                   value="0"
                   data-endpoint="GETapi-v1-companies"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Filter companies using a custom filter for subscription status. Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[liked]</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="GETapi-v1-companies" style="display: none">
            <input type="radio" name="filter[liked]"
                   value="1"
                   data-endpoint="GETapi-v1-companies"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-companies" style="display: none">
            <input type="radio" name="filter[liked]"
                   value="0"
                   data-endpoint="GETapi-v1-companies"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Filter companies using a custom filter for liked status. Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-companies"
               value="name"
               data-component="query">
    <br>
<p>Sort the results by the specified column. Example: <code>name</code></p>
            </div>
                </form>

                    <h2 id="company-GETapi-v1-companies--slug-">Get company</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-companies--slug-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://api-roast.dev.test/api/v1/companies/veniam"
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
$url = 'https://api-roast.dev.test/api/v1/companies/veniam';
$response = $client-&gt;get(
    $url,
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

<span id="example-responses-GETapi-v1-companies--slug-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 7,
        &quot;name&quot;: &quot;Starbucks4&quot;,
        &quot;header_image_url&quot;: &quot;Screenshot 2023-08-05 at 18.30.25_20231126195853.png&quot;,
        &quot;logo_url&quot;: &quot;Screenshot 2023-10-03 at 16.06.42_20231126195852.png&quot;,
        &quot;slug&quot;: &quot;starbucks4&quot;,
        &quot;roaster&quot;: true,
        &quot;subscription&quot;: true,
        &quot;description&quot;: null,
        &quot;website&quot;: null,
        &quot;address&quot;: null,
        &quot;city&quot;: &quot;London&quot;,
        &quot;state&quot;: null,
        &quot;province&quot;: null,
        &quot;territory&quot;: null,
        &quot;zip&quot;: null,
        &quot;country&quot;: null,
        &quot;facebook_url&quot;: null,
        &quot;twitter_url&quot;: null,
        &quot;instagram_url&quot;: null,
        &quot;added_by&quot;: 1,
        &quot;created_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-companies--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-companies--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-companies--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-companies--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-companies--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-companies--slug-" data-method="GET"
      data-path="api/v1/companies/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-companies--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-companies--slug-"
                    onclick="tryItOut('GETapi-v1-companies--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-companies--slug-"
                    onclick="cancelTryOut('GETapi-v1-companies--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-companies--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/companies/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-companies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-companies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-companies--slug-"
               value="veniam"
               data-component="url">
    <br>
<p>The slug of the company. Example: <code>veniam</code></p>
            </div>
                    </form>

                    <h2 id="company-POSTapi-v1-companies">Add a new company</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-companies">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://api-roast.dev.test/api/v1/companies"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'minus');
body.append('roaster', '19');
body.append('subscription', '8');
body.append('website', 'http://www.zemlak.info/quo-voluptatem-nemo-et-quibusdam.html');
body.append('address', 'nam');
body.append('city', 'quae');
body.append('facebook_url', 'http://www.douglas.org/quo-animi-reprehenderit-delectus-tenetur-molestiae-laborum.html');
body.append('twitter_url', 'http://yost.com/aut-et-voluptatem-ducimus-recusandae.html');
body.append('instagram_url', 'http://cartwright.com/deleniti-atque-ad-laudantium-qui-quos-eum-iste');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('header', document.querySelector('input[name="header"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://api-roast.dev.test/api/v1/companies';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'minus'
            ],
            [
                'name' =&gt; 'roaster',
                'contents' =&gt; '19'
            ],
            [
                'name' =&gt; 'subscription',
                'contents' =&gt; '8'
            ],
            [
                'name' =&gt; 'website',
                'contents' =&gt; 'http://www.zemlak.info/quo-voluptatem-nemo-et-quibusdam.html'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'nam'
            ],
            [
                'name' =&gt; 'city',
                'contents' =&gt; 'quae'
            ],
            [
                'name' =&gt; 'facebook_url',
                'contents' =&gt; 'http://www.douglas.org/quo-animi-reprehenderit-delectus-tenetur-molestiae-laborum.html'
            ],
            [
                'name' =&gt; 'twitter_url',
                'contents' =&gt; 'http://yost.com/aut-et-voluptatem-ducimus-recusandae.html'
            ],
            [
                'name' =&gt; 'instagram_url',
                'contents' =&gt; 'http://cartwright.com/deleniti-atque-ad-laudantium-qui-quos-eum-iste'
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('/private/var/folders/25/z_wy7y5j6dgd615yzzd2v9b00000gn/T/phpTEWzuv', 'r')
            ],
            [
                'name' =&gt; 'header',
                'contents' =&gt; fopen('/private/var/folders/25/z_wy7y5j6dgd615yzzd2v9b00000gn/T/phpiBUEOD', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-companies">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 7,
        &quot;name&quot;: &quot;Starbucks4&quot;,
        &quot;header_image_url&quot;: &quot;Screenshot 2023-08-05 at 18.30.25_20231126195853.png&quot;,
        &quot;logo_url&quot;: &quot;Screenshot 2023-10-03 at 16.06.42_20231126195852.png&quot;,
        &quot;slug&quot;: &quot;starbucks4&quot;,
        &quot;roaster&quot;: true,
        &quot;subscription&quot;: true,
        &quot;description&quot;: null,
        &quot;website&quot;: null,
        &quot;address&quot;: null,
        &quot;city&quot;: &quot;London&quot;,
        &quot;state&quot;: null,
        &quot;province&quot;: null,
        &quot;territory&quot;: null,
        &quot;zip&quot;: null,
        &quot;country&quot;: null,
        &quot;facebook_url&quot;: null,
        &quot;twitter_url&quot;: null,
        &quot;instagram_url&quot;: null,
        &quot;added_by&quot;: 1,
        &quot;created_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-26T19:58:53.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-companies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-companies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-companies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-companies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-companies" data-method="POST"
      data-path="api/v1/companies"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-companies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-companies"
                    onclick="tryItOut('POSTapi-v1-companies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-companies"
                    onclick="cancelTryOut('POSTapi-v1-companies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-companies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/companies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-companies"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-companies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-companies"
               value="minus"
               data-component="body">
    <br>
<p>Example: <code>minus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>roaster</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="roaster"                data-endpoint="POSTapi-v1-companies"
               value="19"
               data-component="body">
    <br>
<p>Example: <code>19</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subscription</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="subscription"                data-endpoint="POSTapi-v1-companies"
               value="8"
               data-component="body">
    <br>
<p>Example: <code>8</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTapi-v1-companies"
               value="http://www.zemlak.info/quo-voluptatem-nemo-et-quibusdam.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.zemlak.info/quo-voluptatem-nemo-et-quibusdam.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-companies"
               value="nam"
               data-component="body">
    <br>
<p>Example: <code>nam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-v1-companies"
               value="quae"
               data-component="body">
    <br>
<p>Example: <code>quae</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facebook_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="facebook_url"                data-endpoint="POSTapi-v1-companies"
               value="http://www.douglas.org/quo-animi-reprehenderit-delectus-tenetur-molestiae-laborum.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.douglas.org/quo-animi-reprehenderit-delectus-tenetur-molestiae-laborum.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>twitter_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="twitter_url"                data-endpoint="POSTapi-v1-companies"
               value="http://yost.com/aut-et-voluptatem-ducimus-recusandae.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://yost.com/aut-et-voluptatem-ducimus-recusandae.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instagram_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="instagram_url"                data-endpoint="POSTapi-v1-companies"
               value="http://cartwright.com/deleniti-atque-ad-laudantium-qui-quos-eum-iste"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://cartwright.com/deleniti-atque-ad-laudantium-qui-quos-eum-iste</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="POSTapi-v1-companies"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/private/var/folders/25/z_wy7y5j6dgd615yzzd2v9b00000gn/T/phpTEWzuv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>header</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="header"                data-endpoint="POSTapi-v1-companies"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/private/var/folders/25/z_wy7y5j6dgd615yzzd2v9b00000gn/T/phpiBUEOD</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>cafe</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>location_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="cafe.location_name"                data-endpoint="POSTapi-v1-companies"
               value="iure"
               data-component="body">
    <br>
<p>This field is required when <code>cafe</code> is present. Example: <code>iure</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>primary_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="cafe.primary_image"                data-endpoint="POSTapi-v1-companies"
               value=""
               data-component="body">
    <br>
<p>This field is required when <code>cafe</code> is present.  Must be a file. Must be an image. Example: <code>/private/var/folders/25/z_wy7y5j6dgd615yzzd2v9b00000gn/T/phpE1Zfud</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="cafe.address"                data-endpoint="POSTapi-v1-companies"
               value="vitae"
               data-component="body">
    <br>
<p>This field is required when <code>cafe</code> is present. Example: <code>vitae</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="cafe.city"                data-endpoint="POSTapi-v1-companies"
               value="aut"
               data-component="body">
    <br>
<p>This field is required when <code>cafe</code> is present. Example: <code>aut</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="cafe.zip"                data-endpoint="POSTapi-v1-companies"
               value="magni"
               data-component="body">
    <br>
<p>This field is required when <code>cafe</code> is present. Example: <code>magni</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                <h1 id="user">User</h1>

    

                                <h2 id="user-GETapi-v1-user">Get the authenticated user</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-user">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://api-roast.dev.test/api/v1/user"
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
$url = 'https://api-roast.dev.test/api/v1/user';
$response = $client-&gt;get(
    $url,
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

<span id="example-responses-GETapi-v1-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 27,
        &quot;name&quot;: &quot;Leopoldo Carroll&quot;,
        &quot;email&quot;: &quot;rachael37@example.com&quot;,
        &quot;email_verified_at&quot;: &quot;2023-12-26T17:33:37.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-user" data-method="GET"
      data-path="api/v1/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-user"
                    onclick="tryItOut('GETapi-v1-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-user"
                    onclick="cancelTryOut('GETapi-v1-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
