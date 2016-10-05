<div class="item"><?php
    $o = new wpdreamsCustomSelect("orderby_primary", "Primary result ordering",
        array(
            'selects' => array(
                array('option' => 'Relevance', 'value' => 'relevance DESC'),
                array('option' => 'Title descending', 'value' => 'post_title DESC'),
                array('option' => 'Title ascending', 'value' => 'post_title ASC'),
                array('option' => 'Date descending', 'value' => 'post_date DESC'),
                array('option' => 'Date ascending', 'value' => 'post_date ASC')
            ),
            'value' => $sd['orderby_primary']
        ));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">This is the primary ordering. If two elements match the primary ordering criteria, the <b>Secondary ordering</b> is used below.</p>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomSelect("orderby", "Secondary result ordering",
        array(
            'selects' => array(
                array('option' => 'Relevance', 'value' => 'relevance DESC'),
                array('option' => 'Title descending', 'value' => 'post_title DESC'),
                array('option' => 'Title ascending', 'value' => 'post_title ASC'),
                array('option' => 'Date descending', 'value' => 'post_date DESC'),
                array('option' => 'Date ascending', 'value' => 'post_date ASC')
            ),
            'value' => $sd['orderby']
        ));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">For matching elements by primary ordering, this ordering is used.</p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("use_post_type_order", "Use separate ordering for each post type group?", $sd['use_post_type_order']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wd_Post_Type_Sortalbe("post_type_order", "Post type results ordering", $sd['post_type_order']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $fields = $sd['results_order'];

    // For updating to 4.5
    if (strpos($fields, "attachments") === false) $fields = $fields . "|attachments";

    $o = new wpdreamsSortable("results_order", "Mixed results order", $fields);
    $params[$o->getName()] = $o->getData();
    ?>
</div>