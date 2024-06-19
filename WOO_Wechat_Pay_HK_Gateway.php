<?php

class WOO_Wechat_Pay_HK_Gateway extends \WC_Payment_Gateway {
	private $sandbox = false;
	private $merchant_id = '';
	private $app_id = '';

	private $mcc_code = '';

	public function __construct() {
		$this->id                 = 'woo_wechat_pay_hk';
		$this->method_title       = __( 'Wechat Pay HK', 'woo-wechat-pay-hk' );
		$this->method_description = __( 'Wechat Pay HK', 'woo-wechat-pay-hk' );
		$this->title              = $this->method_title;
		$this->description        = $this->method_description;
		$this->supports           = array( 'products' );
		$this->init_form_fields();
		$this->init_settings();

		$this->enabled = $this->get_option( 'enabled' );
		$this->sandbox = $this->get_option( 'sandbox' ) == 'yes';
	}

	public function init_form_fields() {

	}

	public function process_payment( $order_id ) {

	}

	public function webhook() {

	}
}
