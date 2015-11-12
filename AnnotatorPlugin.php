<?php
class AnnotatorPlugin extends Omeka_Plugin_AbstractPlugin
{

	protected $_hooks = array(
		'install',
		'uninstall',
		'config_form',
		'config',
		'public_footer',
	);


	protected $_options = array(
		'ajs_items'=>1,
		'ajs_collections'=>0,
		//'ajs_simplePages'=>0,
		'ajs_showHighlights'=>0,
		'ajs_displayOnMobile'=>0,
	);


	/*
    ** Plugin options
    */

	public function hookConfigForm()
	{
		require dirname(__FILE__) . '/config_form.php';
	}

	public function hookConfig()
	{
		set_option('ajs_items', (bool)(int)$_POST['ajs_items']);
		set_option('ajs_collections', (bool)(int)$_POST['ajs_collections']);
		set_option('ajs_showHighlights', (bool)(int)$_POST['ajs_showHighlights']);
		set_option('ajs_displayOnMobile', (bool)(int)$_POST['ajs_displayOnMobile']);
		//set_option('ajs_simplePages', (bool)(int)$_POST['ajs_simplePages']);
	}

	/*
	** Public display
	*/

	public function hookPublicFooter()
	{

		echo ajs_annotations_scripts();

	}

	/**
	 * Install the plugin.
	 */
	public function hookInstall()
	{
		$this->_installOptions();

	}

	/**
	 * Uninstall the plugin.
	 */
	public function hookUninstall()
	{
		$this->_uninstallOptions();

	}
}
function startsWith($haystack, $needle) {
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function ajs_annotations_scripts($option=null)
{
	$url=parse_url(current_url());
	$url=$url['path'];
	$is_item_url='/items/show/';
	$is_collection_url='/collections/show/';
	$annotatable=( (startsWith($url, $is_item_url) && get_option('ajs_items') ) || (startsWith($url, $is_collection_url) && get_option('ajs_collections') ) );
	$show_highlights=get_option('ajs_showHighlights');
	$show_mobile=get_option('ajs_displayOnMobile');
	$breakpoint='768';
	
	if($annotatable){
		$html  = '<script async defer src="//hypothes.is/embed.js"></script>';
		if($show_highlights){
			$html.='<script>var breakpoint='.$breakpoint.';if(window.innerWidth>=breakpoint){window.hypothesisConfig=function(){return{showHighlights:true};}</script>';
		}
		if(!$show_mobile){
			//TODO: swap out the boolean option for a user-configurable min breakpoint where 0 equals none
			$html.='<style type="text/css">@media all and (max-width:'.$breakpoint.'px){
				div.annotator-frame, div.annotator-outer, div.annotator-notice, div.annotator-adder{display:none !important;}}</style>';
		}
		return $html;
	}
}