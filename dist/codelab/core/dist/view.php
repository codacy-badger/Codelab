<body>
    <header>
        <img class="logo1" src="logo.png"/>
        <img class="logo2" src="logo.png"/>
        My Logo
        <ul>
            <li>Menu 1</li>
            <li>Menu 2</li>
        </ul>
    </header>
    <div class="outer">
        <div class="inner">
            Inner one
        </div>
        <div class="inner">
            <a href="link">
                Inner two
            </a>
            <a href="link">
                Inner three
            </a>
        </div>
    </div>
</body>


<?php
$array = array(
    'body' => array(
        'header' => array(
            'img',
            'img',
            'ul' => array(
                'li',
                'li'
            )
        ),
        'outer' => array(
            'inner',
            'inner' => array(
                'a',
                'a'
            )
        )

    )
);
echo '<pre>';
        print_r($array);
        echo '</pre>';
?>




<?php
$html = '
<div class="container">

<div class="info">
<h3>Info 1</h3>
<span class="title">Title for Info 1</span>
<a href="http://www.example.com/1">Link to Example 1</a>
</div> <!-- /info -->

<div class="info">
<h3>Info 2</h3>
<span class="title">Title for Info 2</span>
<a href="http://www.example.com/2">Link to Example 2</a>
</div> <!-- /info -->

<div class="info">
<h3>Info 3</h3>
<span class="title">Title for Info 3</span>
<a href="http://www.example.com/3">Link to Example 3</a>
</div> <!-- /info -->

</div> <!-- /container -->
';

$elements = $dom->getElementsByTagName('foo');
$data = array();
foreach($elements as $node){
    foreach($node->childNodes as $child) {
        $data[] = array($child->nodeName => $child->nodeValue);
    }
}
?>

<hr />
<?php

$string = '<div id="parent">
      <div class="box1"> content 1</div>
      <div class="box2"> content 1</div>
      <div class="box3"> content 1 <div class="box31">vds</div></div>
</div>';

$dom = new DOMDocument();
$dom->loadHTML($string);

$xpath = new DOMXPath($dom);
$parentNode = $xpath->query("//div[@id='parent']");

$html = '';
foreach ($parentNode->item(0)->childNodes as $node) {
    $html .= $node->ownerDocument->saveHtml($node);
}

echo $html;
?>
<hr />

<?php
$html = file_get_contents('https://chm.media.pl/');


$search = preg_match_all('/<([^\/!][a-z1-9]*)/i',$html,$matches);
echo 'GET TAGS<pre>';
        print_r($matches[1]);
        echo '</pre>';
echo '<hr />';

        echo 'COUNT TAGS <pre>';
        var_dump(array_count_values($matches[1]));
        echo '</pre>';


?>


<hr />
<?php
$html = file_get_contents('https://chm.media.pl/');
//Create a new DOM document
$dom = new DOMDocument;

//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
@$dom->loadHTML($html);

//Get all links. You could also use any other tag name here,
//like 'img' or 'table', to extract other tags.
$links = $dom->getElementsByTagName('a');

//Iterate over the extracted links and display their URLs
foreach ($links as $link){
    //Extract and show the "href" attribute.
    echo $link->nodeValue . ' --- ' ;
    echo $link->getAttribute('href'), '<br>';
}
 ?>

<hr />
<?php



$url="https://chm.media.pl/";
$data=file_get_contents($url);
$data = strip_tags($data,"<a>");
$d = preg_split("/<\/a>/",$data);
foreach ( $d as $k=>$u ){
    if( strpos($u, "<a href=") !== FALSE ){
        $u = preg_replace("/.*<a\s+href=\"/sm","",$u);
        $u = preg_replace("/\".*/","",$u);
        echo  $u."<br />";
    }
}
