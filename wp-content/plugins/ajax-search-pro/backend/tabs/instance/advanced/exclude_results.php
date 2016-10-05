<div class="item" style="border-bottom: 0;">
    <?php
    $o = new wpdreamsYesNo("exclude_dates_on", "Exclude Post/Page/CPT by date", $sd['exclude_dates_on']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wd_DateInterval("exclude_dates", "posts", $sd['exclude_dates']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wd_UserSelect("exclude_content_by_users", "Exclude or Include content by users", array(
        "value"=>$sd['exclude_content_by_users'],
        "args"=> array(
            "show_type" => 1
        )
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsSearchTags("exclude_post_tags", "Exclude posts by tags", $sd['exclude_post_tags']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsCategories("excludecategories", "Exclude posts by categories", $sd['excludecategories']);
    $params[$o->getName()] = $o->getData();
    $params['selected-'.$o->getName()] = $o->getSelected();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsCustomTaxonomyTerm("excludeterms", "Exclude posts (or cpt) by taxonomy terms", array(
        "value"=>$sd['excludeterms'],
        "type"=>"exclude"));
    $params[$o->getName()] = $o->getData();
    $params['selected-'.$o->getName()] = $o->getSelected();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextarea("excludeposts", "Exclude Posts/Pages/CPT by ID's (comma separated post ID-s)", $sd['excludeposts']);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">Exclude Posts, Pages and custom post types (like products etc..) here. Comma separated list.</p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsPageParents("exclude_page_parent_child", "Exclude parent and child pages", $sd['exclude_page_parent_child']);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">Will exclude parent and child pages related to the parent. Only works with DIRECT parent-child relationships.</p>
</div>