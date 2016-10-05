<div class="item">
    <?php
    $o = new wpdreamsText("custom_types_label", "Custom post types label text", $sd['custom_types_label']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item item-flex-nogrow">
    <?php
    $o = new wpdreamsCustomSelect("cpt_display_mode", "Filter display mode", array(
        "selects" => array(
            array("value" => "checkboxes", "option" => "Checkboxes"),
            array("value" => "dropdown", "option" => "Drop-down"),
            array("value" => "radio", "option" => "Radio buttons")
        ),
        "value" => $sd['cpt_display_mode']));
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsCustomSelect("cpt_filter_default", "default selected", array(
        "selects" => array_merge(array("post", "page"), get_post_types(array(
            "public" => false,
            "_builtin" => false
        ), "names")),
        "value" => $sd['cpt_filter_default']));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomPostTypesEditable("showcustomtypes", "Show search in custom post types selectors", $sd['showcustomtypes']);
    $params[$o->getName()] = $o->getData();
    $params['selected-' . $o->getName()] = $o->getSelected();
    ?>
</div>