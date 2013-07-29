<#TEMPLATE_HEADER#>
</head>
<body class="single">
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="{$host}">{#ZC_BLOG_TITLE#}</a></h1>
			<h3 id="BlogSubTitle">{$blogsubtitle}</h3>
		</div>
		<div id="divNavBar">
<ul>
<#CACHE_INCLUDE_NAVBAR#>
</ul>
		</div>
		<div id="divMain">
<#template:article-page#>
		</div>
		<div id="divSidebar">

<#template:sidebar#>

		</div>
<#TEMPLATE_FOOTER#>
