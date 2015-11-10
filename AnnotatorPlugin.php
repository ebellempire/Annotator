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

function ajs_annotations_scripts($option=null)
{
	$html  = '<script async defer src="//hypothes.is/embed.js"></script>';
	if( ($id=get_option('ajs_showHighlights')) && ($option==1) ){
		$html.='<script>window.hypothesisConfig=function(){return{showHighlights:true};</script>';
	}
	return $html;
}