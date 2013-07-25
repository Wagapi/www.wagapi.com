<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
if(!empty($_SESSION['session'])){
	$session = unserialize($_SESSION['session']);
	$login = $session->agent->get_login();
}
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">

  <style type="text/css"></style><style type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;border-collapse:collapse;border:0;vertical-align:middle;margin:0}</style>
    <style type="text/css">
	.row-rest {
		margin-top: 5px;
		margin-bottom: 5px;
		}
</style>


  </head>

  <body data-spy="scroll" data-target=".nav-list" onload="prettyPrint()">

      <!-- Navbar
    ================================================== -->
  <?php include ("navbar.php"); ?>


<div class="jumbotron subhead">
  <div class="container">
	<div class="row">
		<div class="span7">
			<h1>API documentation</h1>
			<p>Plug your app !</p>		
		</div>
		<div class="span5" >

		</div>	
	</div>
    <ul class="masthead-links">
      <li>
        Version 0.1
      </li>
    </ul>
  </div>
</div>

<div class="container">



<div class="container" style="text-align:justify">
	
	<div class="main-text">
		<h2>
			Preamble
		</h2>
		<p>
		This paper aims to describe the use of the API allowing third-party applications with interact with the wagapi platform for storage, classification, access and sharing of data.
		</p>
		<h3>
			Requirements
		</h3>
		<p>
		Using the API requires a key for access to the API, which will be called api_key or simply <span class="variable">key</span> in the following lines. This key is provided by wagapi administrators.
		It is currently not possible to obtain a key other than sending a written and reasoned request to the following address: <a href="contact@wagapi.com">contact@wagapi.com</a>
		Moreover, it is essential to have at least one account with wagapi. User name and password of the account are required for the application to authenticate and access the account.
		</p>
		<h3>
			General concepts and
		</h3>
		<h4>
			Authentication exchanges
		</h4>
		<p>		
		Authentication is based on the use of an authentication token, the user identifier, in this case its API identifier (or API key) and the account ID being accessed. 
		The call /access/account detailed below is a simple method that allows a third-party application to access an account based on the username and password of the account. 
		If successful, the method a token and the account ID. Token and the API username must then be systematically inserted into the subsequent calls:
		
			</p><li>either in the headers, respectively associated with the header &quot;auth_token&quot; and &quot;key&quot;</li>
			<li>either in GET or POST variables, depending on the method used, respectively associated with the variables &quot;auth_token&quot; and &quot;key&quot;</li>
		
			The account ID is automatically inserted into the URI. Its place is specified in the detailed description of the calls in the <span class="variable">account_id</span> variable.
		<p></p>		
		<h4>
			Call
		</h4>
		<p>		
		The nature of the call is contained in the url. Parameters are passed in the variable <span class="variable">data,</span> regardless of the method used, which has the following form:
		</p>
		<pre>		{
			input1: {}, [] or string of input variables (depending on the call)
			input2: {}, [] or string of input variables (depending on the call)
			input3: {}, [] or string of input variables (depending on the call)
			....
		}
		</pre>
		<p>
		The content of <span class="variable">data</span> is actually an associative array, whose indices are strings. According to the programming language, it is an array or an object. 
		In the following, the parameters will refer to <span class="variable">data</span> fields. Before being passed as a parameter via POST or GET variable <span class="variable">data</span> are to be encoded in JSON format.
		It may be necessary, for example to use JSON.stringify () in javascript or json_encode () in PHP.
		</p>
		<h4>
			Answers
		</h4>		
		<p>
		If successful, the response http calls will be systematically of type 200 and in json format. It must therefore be decoded. It will be structured, after decoding, as follows: 
		</p><pre>		{
			output1: {}, [] or string of input variables (depending on the call),
			output2: {}, [] or string of input variables (depending on the call)
			....
		}
		</pre>		
		In case of failure, the answer will be typically of type 400-404, and an error message will be included in the response body.
		<p></p>
		<h4>
			Referencing documents
		</h4>
		<p>		
		Each document of a user account is identified by a unique identifier. Calls that target documents must necessarily reference the identifiers of one or more documents. 
		These identifiers are passed as an array of values, usually stored in a variable named <span class="variable">index.</span>
		</p>		
		<pre>			var index = [id_doc_1, id_doc_2 ...] / / javascript
			$index = array (id_doc_1, id_doc2, ...) / / php
		</pre>	
		<h4>
			Tags and paths
		</h4>
		<p>		
		Data classification in Wagapi is not based on the use of a hierarchical tree but relies on the characterization by keywords or tags. 
		Whenever it comes to the <span class="variable">path,</span>, it is in fact a list of keywords that could be likened to a series of subdirectories.
		For instance: 
		</p><pre>path: [tags1, tags2, tags3]</pre>
		corresponds to a location together the three key words which a tree is equivalent to the classical path /tag1/tag2/tag3/, with the difference that the order of the tags does not matter.
		And locations are equivalent, which provides great flexibility in the classification of the information.
		<pre>[Tags1, tags2, tags3] &lt;=&gt; [tags1, tags3, tags2] &lt;=&gt; [tags3, tags2, tags1] &lt;=&gt; ...</pre>
		The name under which a document is saved (without extension) is itself a tag.
		<p></p>	
		<h4>		
			Character Encoding
		</h4>
		<p>		
		All strings sent to the server must be encoded in UTF8.
		</p>				
	</div>
	<div class="main-title">
		<h2>
			Detailed description of available function calls
		</h2>
		<p>		
		Examples in javascript and PHP are available <a href="examples-v0.html">here</a> .
		</p>		
	</div>
	</div>

<div class="container" id="calls">
	<div class="row">
		<div class="span3 bs-docs-sidebar" id="sidebar">
			<ul class="nav nav-list bs-docs-sidenav">
			  <li class=""><a href="#/access/account"><i class="icon-chevron-right"></i> /access/account</a></li>
			  <li class=""><a href="#/access/upload"><i class="icon-chevron-right"></i> /access/upload</a></li>
			  <li class=""><a href="#/upload-post"><i class="icon-chevron-right"></i> /upload (POST)</a></li>
			  <li class=""><a href="#/upload-put"><i class="icon-chevron-right"></i> /upload (PUT)</a></li>
			  <li class=""><a href="#/delete/docs"><i class="icon-chevron-right"></i> /delete/docs</a></li>
			  <li class=""><a href="#/download/doc"><i class="icon-chevron-right"></i> /download/doc</a></li>
			  <li class=""><a href="#/list/docs/from/path"><i class="icon-chevron-right"></i> /list/docs/from/path</a></li>
			  <li class=""><a href="#/link/docs"><i class="icon-chevron-right"></i> /link/docs</a></li>
			  <li class=""><a href="#/add/docs/to/path"><i class="icon-chevron-right"></i> /add/docs/to/path</a></li>
			  <li class=""><a href="#/rem/docs/from/path"><i class="icon-chevron-right"></i> /rem/docs/from/path</a></li>
			  <li class=""><a href="#/list/tags/from/path"><i class="icon-chevron-right"></i> /list/tags/from/path</a></li>
			  <li class=""><a href="#/list/tags/all"><i class="icon-chevron-right"></i> /list/tags/all</a></li>
			  <li class=""><a href="#/find/file"><i class="icon-chevron-right"></i> /find/file</a></li>
			</ul>
		</div>
		<div class="span9" style="text-align:justify">

			
				<h3>/access/account</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Authentication and obtaining a session token</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/access/account</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">key</div>
								<div class="span1">string</div>				
								<div class="span6">Key to access the API application</div>		
							
								<div class="span1">User</div>
								<div class="span1">string</div>				
								<div class="span6">User account ID</div>		
							
								<div class="span1">Password</div>
								<div class="span1">string</div>				
								<div class="span6">Password of the user account</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">auth_validity</div>
							<div class="span1">Int.</div>	
							<div class="span6">Validity of the session token (in seconds)</div>
						
							<div class="span1">auth_token</div>
							<div class="span1">string</div>	
							<div class="span6">Token sessions</div>
						
							<div class="span1">account_id</div>
							<div class="span1">string</div>	
							<div class="span6">Account ID</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					The session token typically has a duration of 24 hours. It is to include, as well as the key for authentication in all subsequent calls.
					</div>
				</div>	
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#example-1"> Display/hide example </button>
<div class="collapse" id="example-1" style="padding-top:10px;">					
<pre class="prettyprint linenums">
//Using javascript and jQuery
$('#montext').on('click', function(event){
var call = "/access/account";
var request = [	
		'user=dupont',
		'password=32KJHJ2JH',
		'key=7DHLKELKKJ'
	].join('&');
$.ajax({
	type: "GET",
	url : "https://www.wagapi.com/wgp/api" + call,
	data: request,
	dataType: "JSON",
	success: function(data){
		$('#montext').html(
			['Jeton de session:'+data['auth_token'],
			'Identifiant du compte utilisateur'+data['account_id']
			].join('&lt/br&gt');
		);
	},
	statusCode: {
		401: function() {
					$('#montext').html("Identifiants erronés");
				},
		403: function() {
					$('#montext').html("Accès refusé");
				}							
	});				

});			
</pre>
</div>	
				
			
			
				<h3>/access/upload</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Obtaining an address of temporary storage</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/access/upload</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">validity</div>
								<div class="span1">Int.</div>				
								<div class="span6">Optional parameter specifying the duration of the url in seconds (default 360 seconds or 5 minutes)</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">path</div>
							<div class="span1">string</div>	
							<div class="span6">Url to upload documents based on the call /upload</div>
						
							<div class="span1">validity</div>
							<div class="span1">Int.</div>	
							<div class="span6">Validity of the url</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					The URL can be requested several times, including for simultaneous uploads during the period of validity
					</div>
				</div>		
			
			
			
				<h3>/upload (POST)</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Upload one or more documents by POST method. 
		Calling this method requires the prior temporary access to the upload method / access / upload. 
		This call is not based on the use of variable <span class="variable">data,</span> but only on the POST variable <span class="variable">name.</span> 
		It is possible to send multiple documents with a single call.
		The result is in json format.</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/upload</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">Post</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">name</div>
								<div class="span1">string</div>				
								<div class="span6">It is imperative to inform the POST variable <span class="variable">name</span> and its value to <span class="variable">files []</span></div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">ld:</div>
							<div class="span1">string</div>	
							<div class="span6">Id of the added file. Any designation used for direct file subsequent calls to the API.</div>
						
							<div class="span1">name</div>
							<div class="span1">string</div>	
							<div class="span6">Filename</div>
						
							<div class="span1">size</div>
							<div class="span1">string</div>	
							<div class="span6">File size in bytes</div>
						
							<div class="span1">Type (*)</div>
							<div class="span1">string</div>	
							<div class="span6">MIME type</div>
						
							<div class="span1">error</div>
							<div class="span1">string</div>	
							<div class="span6">If non-empty, indicating the problem.</div>
						
							<div class="span1">checksum</div>
							<div class="span1">string</div>	
							<div class="span6">md5 file</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					The result is an array containing an entry for each file sent. Each entry is an object containing the previous fields.
					</div>
				</div>		
			
			
			
				<h3>/upload (PUT)</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Upload a document PUT method. Calling this method requires the prior temporary access to the upload method / access / upload</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/upload/&lt;temporary_access&gt;/&lt;file_name[urlencoded]&gt;</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">PUT</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">temporary_access</div>
								<div class="span1">string</div>				
								<div class="span6">An authenticated user can provide his session token as the name of the temporary directory. To upload a document without using the session token must have gained access préalabement temporary upload by the method / access / upload.</div>		
							
								<div class="span1">Nom du fichier</div>
								<div class="span1">string</div>				
								<div class="span6"><span class="variable">file_name</span> matches the full name of the document with its extension and must be a url encoding.</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">ld:</div>
							<div class="span1">string</div>	
							<div class="span6">Id of the added file. Any designation used for direct file subsequent calls to the API.</div>
						
							<div class="span1">name</div>
							<div class="span1">string</div>	
							<div class="span6">Filename</div>
						
							<div class="span1">size</div>
							<div class="span1">string</div>	
							<div class="span6">File size in bytes</div>
						
							<div class="span1">Type (*)</div>
							<div class="span1">string</div>	
							<div class="span6">MIME type (non-informed in the case of the PUT method)</div>
						
							<div class="span1">error</div>
							<div class="span1">string</div>	
							<div class="span6">If non-empty, indicating the problem.</div>
						
							<div class="span1">checksum</div>
							<div class="span1">string</div>	
							<div class="span6">md5 file</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					The result is an array containing an entry for each file sent. Each entry is an object containing the previous fields.
					</div>
				</div>		

				<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#example-put"> Display/hide example </button>
<div class="collapse" id="example-put" style="padding-top:10px;">					
<pre class="prettyprint linenums">
//Using PHP en CURL
//Variable $upload_path is returned by the call /access/upload
//or can be derived from a session authentication token (cf. documentation)
$upload_path = "https://www.wagapi.com/wgp/api/upload/7c37b7g507bd901b335f/";
$localfile = urlencode("math.txt");
$url = $upload_path.$localfile; 
$fp = fopen ($localfile, "r"); 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_VERBOSE, 1); 
//curl_setopt($ch, CURLOPT_USERPWD, 'user:password'); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_PUT, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_INFILE, $fp); 
curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localfile)); 
$http_result = curl_exec($ch); 
$error = curl_error($ch); 
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE); 
curl_close($ch); 
fclose($fp); 			
</pre>
</div>					
			
			
				<h3>/delete/docs</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Permanently removes the specified documents</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/delete/docs</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">Post</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">ids</div>
								<div class="span1">array</div>				
								<div class="span6">Contains the <span class="variable">ids</span> of elements to delete the form of a table entry</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">quota_allowed</div>
							<div class="span1">Int.</div>	
							<div class="span6">Total space allocated in bytes</div>
						
							<div class="span1">quota_used</div>
							<div class="span1">Int.</div>	
							<div class="span6">Used space in bytes</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					
					</div>
				</div>		
			
			
			
				<h3>/download/doc</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Triggers the download of the file specified by its id. This function requires passing parameters directly in the URL</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/download/ doc/&lt;auth_token&gt;/&lt;id&gt;</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">ld:</div>
								<div class="span1">string</div>				
								<div class="span6">Id download document</div>		
							
								<div class="span1">auth_token</div>
								<div class="span1">string</div>				
								<div class="span6">Token</div>		
								
							</div>	
						</div>	
					</div>
					
					
				<div class="row row-rest">
					<div class="span9">
					Downloading the document referred to is initiated with a header of Content-type: application / octet-stream
					</div>
				</div>		
			
			
			
				<h3>/list/docs/from/path</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">List the documents referenced in the selected location</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/list/docs/from/path</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">path</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the tags up the path to the location</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">index</div>
							<div class="span1">array</div>	
							<div class="span6"><span class="variable">Id</span> list of documents identifying</div>
						
							<div class="span1">files</div>
							<div class="span1">array</div>	
							<div class="span6">List of associative arrays containing the properties of the documents listed in <span class="variable">index,</span> ie [&#39;id&#39;], [&#39;name&#39;] [&#39;size&#39;] [&#39;extension&#39;], [&#39;date_in&#39;]</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					
					</div>
				</div>		
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#example-list"> Display/hide example </button>
<div class="collapse" id="example-list" style="padding-top:10px;">					
<pre class="prettyprint linenums">
//With javascript and jQuery
$('#somedocslist').on('click', function(event){
	var url_base = "https://www.wagapi.com/wgp/api"
	var call="/list/docs/from/path";
	var request = {path:['2012','Annecy']};
	$.ajax({
		type: "GET",
		url: url_base+'/'+account_id+call,				
		data:'data='+JSON.stringify(request),
		dataType: "JSON",
		beforeSend: function(xhr){
						xhr.setRequestHeader('auth_token', 7c3jm06507ca725450b3);
						xhr.setRequestHeader('key', '7DHLKELKKJ');
					},				
		success: function(data){
				$('#somedocslist').html(data['index'].join(','));
					}
	});				

});			
</pre>
</div>				
			
			
				<h3>/link/docs</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Creates a temporary or permanent link to each document listed available without authentication</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/link/doc</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">index</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the <span class="variable">ids</span> of the various documents targeted</div>		
							
								<div class="span1">validity</div>
								<div class="span1">Int.</div>				
								<div class="span6">validity requested in seconds [0 corresponds to an infinite lifetime]</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">index</div>
							<div class="span1">array</div>	
							<div class="span6">Table listing the <span class="variable">ids</span> of the various documents targeted</div>
						
							<div class="span1">links</div>
							<div class="span1">array</div>	
							<div class="span6">Array containing the generated link for each document</div>
						
							<div class="span1">collectionLink</div>
							<div class="span1">string</div>	
							<div class="span6">Link to a page gathering all documents</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					Tables and <span class="variable">index links</span> are ordered in the same way
					</div>
				</div>		
			
			
			
				<h3>/add/docs/to/path</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Adds one or more documents to the designated location, each directory in the path forming a tag</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/add/docs/to/path</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">index</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the <span class="variable">ids</span> of the various documents targeted</div>		
							
								<div class="span1">path</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the tags up the path to the location. Tags are case insensitive.</div>		
								
							</div>	
						</div>	
					</div>
					
					
				<div class="row row-rest">
					<div class="span9">
					
					</div>
				</div>		
			
			
			
				<h3>/rem/docs/from/path</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Removes one or more documents to the designated location, each directory in the path forming a tag</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/rem/docs/from/path</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">index</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the <span class="variable">ids</span> of the various documents targeted</div>		
							
								<div class="span1">path</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the tags up the path to the location. Tags are case insensitive.</div>		
								
							</div>	
						</div>	
					</div>
					
					
				<div class="row row-rest">
					<div class="span9">
					
					</div>
				</div>		
			
			
			
				<h3>/list/tags/from/path</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">List directories / tags existing in the designated location, each directory in the path forming a tag</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/list/tags/from/path</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">path</div>
								<div class="span1">array</div>				
								<div class="span6">Table listing the tags up the path to the location. Tags are case insensitive.</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">tags</div>
							<div class="span1">array</div>	
							<div class="span6">Table listing the <span class="variable">tags</span> referenced</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					
					</div>
				</div>		
			
			
			
				<h3>/list/tags/all</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">List directories / tags existing in the designated location, each directory in the path forming a tag</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/ &lt;account_id&gt; / list / tags / from / path</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">tags</div>
							<div class="span1">array</div>	
							<div class="span6">Table listing the <span class="variable">tags</span> referenced</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					
					</div>
				</div>		
			
			
			
				<h3>/find/file</h3>
					<div class="row row-rest">
						<div class="span1 muted">Description</div>
						<div class="span8">Retrieves a document on the basis of its name, its size and MD5 (checksum)</div>	
					</div>
				
					<div class="row row-rest"> 
						<div class="span1 muted">URL structure</div>
						<div class="span8"><pre>https://www.wagapi.com/wgp/api/&lt;account_id&gt;/find/file</pre></div>	
					</div>

					<div class="row row-rest">
						<div class="span1 muted">Methods:</div>
						<div class="span8">GET, POST</div>	
					</div>

				
					<div class="row row-rest">
						<div class="span1 muted">Parameters</div>
						<div class="span8">
							<div class="row row-rest">
							
								<div class="span1">name</div>
								<div class="span1">string</div>				
								<div class="span6">Filename</div>		
							
								<div class="span1">size</div>
								<div class="span1">string</div>				
								<div class="span6">File size in bytes</div>		
							
								<div class="span1">checksum</div>
								<div class="span1">string</div>				
								<div class="span6">md5 file</div>		
								
							</div>	
						</div>	
					</div>
					
				
				<div class="row row-rest">
					<div class="span1 muted">Returns</div>
					<div class="span8"> 
						<div class="row row-rest">
						
							<div class="span1">ld:</div>
							<div class="span1">string</div>	
							<div class="span6">Id of the file identified corresponding</div>
						
							<div class="span1">name</div>
							<div class="span1">string</div>	
							<div class="span6">Filename</div>
						
							<div class="span1">size</div>
							<div class="span1">string</div>	
							<div class="span6">File size in bytes</div>
						
							<div class="span1">error</div>
							<div class="span1">string</div>	
							<div class="span6">If non-empty, indicating the problem.</div>
						
							<div class="span1">checksum</div>
							<div class="span1">string</div>	
							<div class="span6">md5 file</div>
							
						</div>	
					</div>	
				</div>
					
				<div class="row row-rest">
					<div class="span9">
					Parameters and the result, if there is one, correspond to objects whose fields are described above and are placed in the variable <span class="variable">data</span>
					</div>
				</div>		
			
				
		</div>
	</div>

</div>






</div>





      <!-- Footer
    ================================================== -->
  <?php include ("footer.php"); ?>

<script>
// side bar
$('.bs-docs-sidenav').affix({
offset: {
top: function (){var offset = $('#calls').offset(); return offset.top;}
//top: function () { return $window.width() <= 980 ? 290 : 210 }
, bottom: 270
}
}) 
//$('.tobespied').scrollspy()

</script>

  

</body></html>