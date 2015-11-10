<style>
	.helper{font-size:.85em;}
</style>

<p><strong>Please Note: </strong>users will only be able to sign into their hypothes.is account to leave annotations if your site is served over secure <a href="https://en.wikipedia.org/wiki/HTTPS" title="HTTPS @ Wikipedia">HTTPS</a>.</p>

<!--
<h2><?php echo __('Account Settings'); ?></h2>

<fieldset id="account">

	<div class="field">
	    <div class="two columns alpha">
	        <label for="ajs_account"><?php echo __('Site Account'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <p class="explanation"><?php echo __("Enter the site acct id."); ?></p>

	        <div class="input-block">
	            <input type="text" class="textinput" name="ajs_account" value="<?php echo get_option('ajs_account'); ?>">
	            <p class="helper"></p>
	        </div>
	    </div>
	</div>

</fieldset>
-->


<h2><?php echo __('Display Settings'); ?></h2>

<fieldset id="display">
	
	<!-- highlights -->
	<div class="field">
	    <div class="two columns alpha">
	        <label for="ajs_showHighlights"><?php echo __('Auto-Display Highlights'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('ajs_showHighlights', true,
	array('checked'=>(boolean)get_option('ajs_showHighlights'))); ?>

	        <p class="explanation"><?php echo __('Display any user highlights by default, even if the user has not opened the annotation sidebar (not recommended).'); ?></p>
	    </div>
	</div>


	<!-- mobile -->
	<div class="field">
	    <div class="two columns alpha">
	        <label for="ajs_displayOnMobile"><?php echo __('Mobile Annotation'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('ajs_displayOnMobile', true,
	array('checked'=>(boolean)get_option('ajs_displayOnMobile'))); ?>

	        <p class="explanation"><?php echo __('Display Annotation interface on mobile devices (not recommended).'); ?></p>
	    </div>
	</div>
</fieldset>
	
<h2><?php echo __('Content Settings'); ?></h2>

<fieldset id="display">	
	<!-- items -->
	<div class="field">
	    <div class="two columns alpha">
	        <label for="ajs_items"><?php echo __('Items'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('ajs_items', true,
	array('checked'=>(boolean)get_option('ajs_items'))); ?>

	        <p class="explanation"><?php echo __('Display annotations on item record.'); ?></p>
	    </div>
	</div>

	<!-- collections -->
	<div class="field">
	    <div class="two columns alpha">
	        <label for="ajs_collections"><?php echo __('Collections'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('ajs_collections', true,
	array('checked'=>(boolean)get_option('ajs_collections'))); ?>

	        <p class="explanation"><?php echo __('Display annotations on collection record.'); ?></p>
	    </div>
	</div>
	
<!--
	<div class="field">
	    <div class="two columns alpha">
	        <label for="ajs_simplePages"><?php echo __('Simple Pages'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('ajs_collections', true,
	array('checked'=>(boolean)get_option('ajs_simplePages'))); ?>

	        <p class="explanation"><?php echo __('Display annotations on pages (Simple Pages).'); ?></p>
	    </div>
	</div>	
-->