<?php
/**
 * Kathmag Theme Customizer Control Classes
 *
 * @package Kathmag
 */

if( class_exists( 'WP_Customize_Control' ) ) { 

    /**
     * Class Kathmag_Repeater_Control
     */
    class Kathmag_Repeater_Control extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'repeater';

        public $kathmag_box_label = '';

        public $kathmag_box_add_control = '';

        private $cats = '';

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         */
        public $fields = array();

        /**
         * Repeater drag and drop controler
         *
         * @since  1.0.0
         */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            $this->fields = $fields;
            $this->kathmag_box_label = $args['kathmag_box_label'] ;
            $this->kathmag_box_add_control = $args['kathmag_box_add_control'];
            $this->cats = get_categories(array( 'hide_empty' => false ));
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            $values = json_decode($this->value());
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <?php 
                if($this->description) { 
                    ?>
                    <span class="description customize-control-description">
                        <?php 
                            echo wp_kses_post($this->description); 
                        ?>
                    </span>
                    <?php 
                } 
            ?>

            <ul class="kathmag-repeater-field-control-wrap">
                <?php
                    $this->kathmag_get_fields();
                ?>
            </ul>

            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="kathmag-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <button type="button" class="button kathmag-add-control-field">
                <?php 
                    echo esc_html( $this->kathmag_box_add_control ); 
                ?>
            </button>
            <?php
        }

        private function kathmag_get_fields(){
            $fields = $this->fields;
            $values = json_decode($this->value());

            if(is_array($values)){
                foreach($values as $value){
                    ?>
                    <li class="kathmag-repeater-field-control">
                        <h3 class="kathmag-repeater-field-title">
                            <?php 
                                echo esc_html( $this->kathmag_box_label ); 
                            ?>
                        </h3>
                        
                        <div class="kathmag-repeater-fields">
                            <?php
                                foreach ($fields as $key => $field) {
                                    $class = isset($field['class']) ? $field['class'] : '';
                                    ?>
                                    <div class="kathmag-fields kathmag-type-<?php echo esc_attr($field['type']).' '.esc_attr( $class ); ?>">
                                        <?php 
                                            $label = isset($field['label']) ? $field['label'] : '';
                                            $description = isset($field['description']) ? $field['description'] : '';
                                            if($field['type'] != 'checkbox'){ ?>
                                                <span class="customize-control-title">
                                                    <?php echo esc_html( $label ); ?>
                                                </span>
                                                <span class="description customize-control-description">
                                                    <?php echo esc_html( $description ); ?>
                                                </span>
                                            <?php 
                                            }

                                            $new_value = isset($value->$key) ? $value->$key : '';
                                            $default = isset($field['default']) ? $field['default'] : '';

                                            switch ($field['type']) {
                                                case 'text':
                                                    echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="text" value="'.esc_attr($new_value).'"/>';
                                                    break;

                                                case 'textarea':
                                                    echo '<textarea data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">'.esc_textarea($new_value).'</textarea>';
                                                    break;

                                                case 'number':
                                                    echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="number" value="'.esc_attr($new_value).'"/>';
                                                    break;

                                                case 'category':
                                                    echo '<select data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
                                                    echo '<option value="0">'.esc_html__('Select Category', 'kathmag').'</option>';
                                                    echo '<option value="-1">'.esc_html__('Latest Posts', 'kathmag').'</option>';
                                                        foreach ( $this->cats as $cat )
                                                        {
                                                            printf('<option value="%s" %s>%s</option>', esc_attr($cat->term_id), selected($new_value, $cat->term_id, false), esc_html($cat->name));
                                                        }
                                                    echo '</select>';
                                                    break;

                                                case 'select':
                                                    $options = $field['options'];
                                                    echo '<select  data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
                                                        foreach ( $options as $option => $val )
                                                        {
                                                            printf('<option value="%s" %s>%s</option>', esc_attr($option), selected($new_value, $option, false), esc_html($val));
                                                        }
                                                    echo '</select>';
                                                    break;
                                           

                                                case 'selector':
                                                    $options = $field['options'];
                                                    echo '<div class="selector-labels">';
                                                    foreach ( $options as $option => $val ){
                                                        $class = ( $new_value == $option ) ? 'selector-selected': '';
                                                        echo '<label class="'.esc_attr( $class ).'" data-val="'.esc_attr($option).'">';
                                                        echo '<img src="'.esc_url($val).'"/>';
                                                        echo '</label>'; 
                                                    }
                                                    echo '</div>';
                                                    echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
                                                    break;

                                                case 'switch':
                                                    $switch = $field['switch'];
                                                    $switch_class = ($new_value == 'on') ? 'switch-on' : '';
                                                    echo '<div class="onoffswitch '.esc_attr( $switch_class ).'">';
                                                        echo '<div class="onoffswitch-inner">';
                                                            echo '<div class="onoffswitch-active">';
                                                                echo '<div class="onoffswitch-switch">'.esc_html($switch["on"]).'</div>';
                                                            echo '</div>';
                                                            echo '<div class="onoffswitch-inactive">';
                                                                echo '<div class="onoffswitch-switch">'.esc_html($switch["off"]).'</div>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                    echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
                                                    break;
                                                
                                                case 'multicategory':
                                                    $new_value_array = !is_array( $new_value ) ? explode( ',', $new_value ) : $new_value;
                                                    echo '<ul class="kathmag-multi-category-list">';
                                                    echo '<li><label><input type="checkbox" value="-1" '. checked('-1', $new_value, false ) .'/>'.esc_html__( 'Latest Posts', 'kathmag' ).'</label></li>';
                                                    foreach ( $this->cats as $cat ){
                                                        $checked = in_array( $cat->term_id, $new_value_array) ? 'checked="checked"' : '';
                                                        echo '<li>';
                                                        echo '<label>';
                                                        echo '<input type="checkbox" value="'.esc_attr($cat->term_id).'" '. esc_attr( $checked ) .'/>'; 
                                                        echo esc_html( $cat->name );
                                                        echo '</label>';
                                                        echo '</li>';
                                                    }
                                                    echo '</ul>';
                                                    echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr(implode( ',', $new_value_array )).'" data-name="'.esc_attr($key).'"/>';
                                                    break;

                                                default:
                                                    break;
                                            }
                                        ?>
                                    </div>
                                    <?php
                                } 
                            ?>

                            <div class="clearfix kathmag-repeater-footer">
                                <div class="alignright">
                                    <a class="kathmag-repeater-field-remove" href="#remove">
                                        <?php esc_html_e('Delete', 'kathmag') ?>
                                    </a> 
                                    <?php
                                        esc_html_e( '|', 'kathmag' );
                                    ?>
                                    <a class="kathmag-repeater-field-close" href="#close">
                                        <?php esc_html_e('Close', 'kathmag') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php   
                }
            }
        }

    }

    /**
     * Class Kathmag_Dropdown_Multiple_Chooser
     */
    class Kathmag_Dropdown_Multiple_Chooser extends WP_Customize_Control{
        public $type = 'dropdown_multiple_chooser';
        public $placeholder = '';

        public function __construct($manager, $id, $args = array()){

            parent::__construct( $manager, $id, $args );
        }

        public function render_content(){
            if ( empty( $this->choices ) )
                    return;
            ?>
                <label>
                    <span class="customize-control-title">
                        <?php echo esc_html( $this->label ); ?>
                    </span>

                    <?php if($this->description){ ?>
                        <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                        </span>
                    <?php } ?>
                    <select multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
                        <?php
                        foreach ( $this->choices as $value => $label ){
                            $selected = '';
                            if(in_array($value, $this->value())){
                                $selected = 'selected="selected"';
                            }
                            echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                </label>
            <?php
        }
    }
        

}


