<?php
if (!class_exists("wpdreamsThemeChooser")) {
    /**
     * Class wpdreamsThemeChooser
     *
     * Theme selector class. Uses the json decoded data do form each theme.
     *
     * @package  WPDreams/OptionsFramework/Classes
     * @category Class
     * @author Ernest Marcinko <ernest.marcinko@wp-dreams.com>
     * @link http://wp-dreams.com, http://codecanyon.net/user/anago/portfolio
     * @copyright Copyright (c) 2014, Ernest Marcinko
     */
    class wpdreamsThemeChooser extends wpdreamsType {
        function getType() {
            parent::getType();
            $this->processData();
            echo "
      <div class='wpdreamsThemeChooser'>
       <fieldset style='background:#FAFAFA;padding:0;'>
       <label style='color:#333' for='wpdreamsThemeChooser_'" . self::$_instancenumber . "'>" . $this->label . "</label>";
            $decodedData = json_decode($this->themes);
            echo "<select id='wpdreamsThemeChooser_" . self::$_instancenumber . "' name='" . $this->name . "'>
          <option value=''>Select</option>";
            foreach ($decodedData as $name => $theme) {
                $selected = $name == $this->selected ? " selected='selected'" : "";
                if ($theme === false)
                    echo "<option value='" . $name . "' disabled>" . $name . "</option>";
                else
                    echo "<option value='" . $name . "'".$selected.">" . $name . "</option>";
            }
            echo "</select>";
            foreach ($decodedData as $name => $theme) {
                if ($theme === false) continue;
                echo "<div name='" . $name . "' style='display:none;'>";
                /*foreach ($theme as $pname => $param) {
                    echo "<p paramname='" . $pname . "'>" . $param . "</p>";
                }*/
                echo json_encode($theme);
                echo "</div>";
            }
            echo "
      <span></span>
      <p class='descMsg'>Changes not take effect on the frontend until you save them.</p>
      </fieldset>

      </div>";
        }

        function processData() {
            $this->themes = $this->data['themes'];
            $this->selected = $this->data['value'];
        }

        final function getData() {
            return $this->data;
        }

        final function getSelected() {
            return $this->selected;
        }
    }
}