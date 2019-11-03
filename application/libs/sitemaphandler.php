<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 02.11.2019
 * Time: 19:25
 */

class SitemapHandler
{
    /* EDIT FREQUENCY */
    public const FREQ_ALWAYS = "always";
    public const FREQ_HOURLY = "hourly";
    public const FREQ_DAILY = "daily";
    public const FREQ_WEEKLY = "weekly";
    public const FREQ_MONTHLY = "monthly";
    public const FREQ_YEARLY = "yearly";
    public const FREQ_NEVER = "never";

    /* ROOT NODE */
    private const ROOT_ELEMENT = "urlset";
    private const ROOT_ATTRIBUTE_NAME = "xmlns";
    private const ROOT_ATTRIBUTE_VALUE = "http://www.sitemaps.org/schemas/sitemap/0.9";

    /* URL NODE */
    private const URL_NODE = "url";
    private const LINK_ELEMENT = "loc";
    private const LAST_UPDATE_ELEMENT = "lastmod";
    private const PRIORITY_ELEMENT = "priority";
    private const CHANGE_FREQ_ELEMENT = "changefreq";

    /* ATTRIBUTES */
    private $sitemap_path;
    private $xml;

    public function __construct(string $path)
    {
        // Check if file exists
        if(!file_exists($path)){
            $fp = fopen($path,"wb");
            fclose($fp);
        }

        $this->sitemap_path = realpath($path);
        $this->xml = new DOMDocument("1.0","UTF-8");

        // Enable formatted output
        $this->xml->formatOutput = true;
        $this->xml->preserveWhiteSpace = false;
    }

    public function isWellFormatted(){
        libxml_use_internal_errors(true);
        return $this->xml->load($this->sitemap_path);
    }

    public function getContent(){
        libxml_use_internal_errors(true);
        if($this->xml->load($this->sitemap_path)){
            return $this->xml->saveHTML();
        }
        else{
            return "";
        }
    }

    /* Add link process */
    public function addLink($link, $last_mod, $priority=0.5, $change_frequence=SitemapHandler::FREQ_MONTHLY){
        libxml_use_internal_errors(true);

        // format priority value and link
        $priority = number_format($priority, 1);
        $link = htmlEntities($link, ENT_QUOTES);

        // it tries to load the document and hides any type of waring
        if($this->xml->load($this->sitemap_path) &&
            $this->xml->getElementsByTagName(SitemapHandler::ROOT_ELEMENT)->length != 0){
            // -> File found + root element exists

            // get root element
            $root = $this->xml->documentElement;
        }
        else{
            // -> File not found + root element doesn't exists

            // Create element and attribute
            $root = $this->xml->createElement(SitemapHandler::ROOT_ELEMENT);
            $root_attribute = $this->xml->createAttribute(SitemapHandler::ROOT_ATTRIBUTE_NAME);

            // Set value and link attribute to element
            $root_attribute->value = SitemapHandler::ROOT_ATTRIBUTE_VALUE;
            $root->appendChild($root_attribute);
        }

        // Append url node to root element
        $root->appendChild($this->create_url_node($link, $last_mod, $priority, $change_frequence));

        // Append root node to main document
        $this->xml->appendChild($root);

        // Save current edits to sitemap file
        $this->xml->save($this->sitemap_path);
    }

    private function create_url_node($link, $last_mod, $priority=0.5, $change_frequence=SitemapHandler::FREQ_MONTHLY){
        $url_node = $this->xml->createElement(SitemapHandler::URL_NODE);

        // Create elements
        $link_element = $this->xml->createElement(SitemapHandler::LINK_ELEMENT, $link);
        $last_mod_element = $this->xml->createElement(SitemapHandler::LAST_UPDATE_ELEMENT, $last_mod);
        $priority_element = $this->xml->createElement(SitemapHandler::PRIORITY_ELEMENT, $priority);
        $changefreq_element = $this->xml->createElement(SitemapHandler::CHANGE_FREQ_ELEMENT, $change_frequence);

        // Append children
        $url_node->appendChild($link_element);
        $url_node->appendChild($last_mod_element);
        $url_node->appendChild($priority_element);
        $url_node->appendChild($changefreq_element);

        return $url_node;
    }
}