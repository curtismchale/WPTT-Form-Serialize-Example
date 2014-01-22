<?php

class WPTT_Form_Serialize_Shortcodes{

	function __construct(){

		add_shortcode( 'wptt_form_cereal', array( $this, 'return_form' ) );

	} // __construct

	public function return_form(){

		$html = '<form action="wptt_form_action" id="wptt_cereal_form">';
			$html .= '<p>';
				$html .= '<label for="wptt_first">First</label>';
				$html .= '<input id="wptt_first" name="wptt_first" value="First Field yo" />';
			$html .= '</p>';

			$html .= '<p>';
				$html .= '<label for="wptt_second">Second</label>';
				$html .= '<input id="wptt_second" name="wptt_second" value="Second Field yo" />';
			$html .= '</p>';

			$html .= '<p>';
				$html .= '<label for="wptt_third">Third</label>';
				$html .= '<select name="wptt_third" id="wptt_third">';
					$html .= '<option value="val1">Value 1</option>';
					$html .= '<option value="val2">Value 2</option>';
				$html .= '</select>';
			$html .= '</p>';

			$html .= '<input type="submit" value="Save" />';

		$html .= '</form>';

		return $html;

	} // return_form

} // WPTT_Form_Serialize_Shortcodes

new WPTT_Form_Serialize_Shortcodes();
