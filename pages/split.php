<form data-ng-form-commit id="EPAYCO" name="EPAYCO" method="post" action="https://secure.payco.co/splitpayments.php">
    <input name="p_cust_id_cliente" type="hidden" value="{{eventp.payment_epayco_merchant}}">
    <input name="p_key" type="hidden" value="{{eventp.payment_epayco_key}}">

    <input name="p_id_invoice" type="hidden" value="{{inscription.id}}-{{inscription.retry_payment}}">
    <input name="p_description" type="hidden" value="PUKIEBOOK - {{eventp.name_clean}} - {{category.name}} - {{inscription.name_clean}}">

    <input data-ng-if="payment_local" name="p_currency_code" type="hidden" value="{{eventp.currency_info.currency}}">
    <input data-ng-if="!payment_local" name="p_currency_code" type="hidden" value="{{eventp.currency_info_intl.currency}}">
    <input data-ng-if="payment_local" name="p_amount" id="p_amount" type="hidden" value="{{inscription.services_cost + category.inscription_cost_final - discountCode.discount}}">
    <input data-ng-if="!payment_local" name="p_amount" id="p_amount" type="hidden" value="{{inscription.services_cost_intl + category.inscription_cost_intl_final - discountCode.discount_intl}}">
    <input data-ng-if="payment_local" name="p_signature" type="hidden" id="signature"  value="{{hashSignature(eventp.payment_epayco_merchant, eventp.payment_epayco_key, eventp.currency_info.currency)}}" />
    <input data-ng-if="!payment_local" name="p_signature" type="hidden" id="signature"  value="{{hashSignature(eventp.payment_epayco_merchant, eventp.payment_epayco_key, eventp.currency_info_intl.currency)}}" />

    <input name="p_tax" id="p_tax" type="hidden" value="0">
    <input name="p_amount_base" id="p_amount_base" type="hidden" value="0">
    <input name="p_test_request" type="hidden" value="FALSE">

    <input ng-if="eventp.id == '451'" name="p_url_response" type="hidden" value="https://www.brutestrengthtraining.com/brute-showdown-thank-you">
    <input ng-if="eventp.id != '451'" name="p_url_response" type="hidden" value="<?php echo $this->config->item('front_addr'); ?>epayco-receipt">

    <input name="p_url_confirmation" type="hidden" value="<?php echo $this->config->item('api_addr'); ?>payment_epayco">

    <input name="p_split_type" type="hidden" value="1">
    <input name="p_split_merchant_receiver" type="hidden" value="{{eventp.payment_epayco_merchant}}">
    <input name="p_split_primary_receiver" type="hidden" value="13438">
    <input data-ng-if="payment_local" name="p_split_primary_receiver_fee" type="hidden" value="{{category.inscription_fee}}">
    <input data-ng-if="!payment_local" name="p_split_primary_receiver_fee" type="hidden" value="{{category.inscription_fee_intl}}">

    <input name="p_confirm_method" type="hidden" value="POST">
    <input name="p_billing_name" type="hidden" value="{{$root.user.full_name}}">
    <input name="p_billing_lastname" type="hidden" value="">
    <input name="p_email" type="hidden" value="{{$root.user.email}}">
    <input name="p_billing_email" type="hidden" value="{{$root.user.email}}">
    <input name="p_billing_document" type="hidden" value="{{$root.user.dni}}">
    <input name="p_extra1" type="hidden" value="{{inscription.id}}">
    <input name="p_extra2" type="hidden" value="{{eventp.id}}">
    <input name="p_extra3" type="hidden" value="{{category.id}}">
    <!--<input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn4.png" />-->
    <input class="btn btn-pukie btn-spacing" type="button" data-ng-click="submitTest2(EPAYCO)" data-ng-disabled="payBtn.disabled" value="ePayco"/>
</form>