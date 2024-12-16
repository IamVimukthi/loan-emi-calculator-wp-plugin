<?php
/*
Plugin Name: Loan EMI Calculator
Description: A simple WordPress plugin to calculate EMI for loans. Use the shortcode [loan_calculator] to display the calculator.
Version: 1.0
Author: Vimukthi Guruge
Author URI: https://github.com/IamVimukthi
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: loan-emi-calculator
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Enqueue Scripts and Styles
function loan_calculator_enqueue_assets() {
    wp_enqueue_style( 'loan-calculator-style', plugin_dir_url( __FILE__ ) . 'assets/style.css' );
    wp_enqueue_script( 'loan-calculator-script', plugin_dir_url( __FILE__ ) . 'assets/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'loan_calculator_enqueue_assets' );

// Shortcode to Display the Calculator
function loan_calculator_shortcode() {
    ob_start();
    ?>
    <div id="loan-calculator">
        <h3>Loan EMI Calculator</h3>
        <form id="loan-calculator-form">
            <label for="loan-amount">Loan Amount:</label>
            <input type="number" id="loan-amount" required>
            
            <label for="interest-rate">Interest Rate (Annual %):</label>
            <input type="number" id="interest-rate" step="0.01" required>
            
            <label for="loan-tenure">Loan Tenure (Years):</label>
            <input type="number" id="loan-tenure" required>
            
            <button type="button" id="calculate-emi">Calculate EMI</button>
        </form>
        <div id="emi-result" style="margin-top: 20px;"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'loan_calculator', 'loan_calculator_shortcode' );
?>
