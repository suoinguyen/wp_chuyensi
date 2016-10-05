<div class="item">
	<?php
	$o = new wpdreamsYesNo("exactonly", "Show exact matches only?",
		$sd['exactonly']);
	$params[$o->getName()] = $o->getData();
	?>
	<p class="descMsg">If this is enabled, the Regular search engine is used. Index table engine doesn't support exact matches.</p>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomSelect("keyword_logic", "Keyword logic",
        array(
            'selects' => $sd['keyword_logic_def'],
            'value' => $sd['keyword_logic']
        ));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">More <a href="https://goo.gl/Cu5Egs" target="_blank">information here</a>.</p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("triggeronclick", "Trigger search when clicking on search icon?",
        $sd['triggeronclick']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("triggeronreturn", "Trigger search when hitting the return button?",
        $sd['triggeronreturn']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("trigger_on_facet", "Trigger search when changing a facet on settings?",
        $sd['trigger_on_facet']);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">
        Will trigger the search if the user changes a checkbox, radio button, slider on the frontend
        search settings panel.
    </p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("triggerontype", "Trigger search when typing?",
        $sd['triggerontype']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("charcount", "Minimal character count to trigger search", $sd['charcount']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item item-flex-nogrow">
    <?php
    $o = new wpdreamsYesNo("redirectonclick", "<b>Redirect</b> when clicking on search icon?",
        $sd['redirectonclick']);
    $params[$o->getName()] = $o->getData();
    ?>
    <?php
    $o = new wpdreamsCustomSelect("redirect_click_to", " and redirect to",
        array(
            'selects' => array(
                array("option" => "Results page", "value" => "results_page"),
                array("option" => "First matching result", "value" => "first_result")
            ),
            'value' => $sd['redirect_click_to']
        ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item item-flex-nogrow item-conditional">
    <?php
    $o = new wpdreamsYesNo("redirect_on_enter", "<b>Redirect</b> when hitting the return key?",
        $sd['redirect_on_enter']);
    $params[$o->getName()] = $o->getData();
    ?>
    <?php
    $o = new wpdreamsCustomSelect("redirect_enter_to", " and redirect to",
        array(
            'selects' => array(
                array("option" => "Results page", "value" => "results_page"),
                array("option" => "First matching result", "value" => "first_result")
            ),
            'value' => $sd['redirect_enter_to']
        ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsText("redirect_url", "<b>Redirect</b> to url?",
        $sd['redirect_url']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item item-flex-nogrow" style="flex-wrap: wrap;">
    <?php
    $o = new wpdreamsYesNo("override_default_results", "<b>Override</b> the default WordPress search results with results from this search instance?",
        $sd['override_default_results']);
    $params[$o->getName()] = $o->getData();
    ?>
    <?php
    $o = new wpdreamsCustomSelect("override_method", " method ", array(
        "selects" =>array(
            array("option" => "Post", "value" => "post"),
            array("option" => "Get", "value" => "get")
        ),
        "value" => $sd['override_method']
    ));
    $params[$o->getName()] = $o->getData();
    ?>
    <div class="descMsg" style="min-width: 100%;flex-wrap: wrap;flex-basis: auto;flex-grow: 1;box-sizing: border-box;">If this is enabled, the plugin will try to replace the default results with it's own. Might not work with themes which temper the search query themselves (very very rare).</div>
</div>