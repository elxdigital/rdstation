<?php

namespace ElxDigital\RDStation\Services;

class Conversion extends RDStation
{
    /**
     * Key
     */
    private $apiKey;
    
    /**
     * PARAMS
     */
    private $conversion;
    private $customer;
    private $order;
    private $payment;
    private $product;
    
    public function __construct(string $apiKey) {
        parent::__construct();
        
        $this->apiKey = $apiKey;
    }

    public function setConversion(\Source\Support\RDStation\Data\Conversion $conversion): void {
        $this->conversion = $conversion;
    }

    public function setCustomer(\Source\Support\RDStation\Data\Customer $customer): void {
        $this->customer = $customer;
    }

    public function setOrder(\Source\Support\RDStation\Data\Order $order): void {
        $this->order = $order;
    }

    public function setPayment(\Source\Support\RDStation\Data\Payment $payment): void {
        $this->payment = $payment;
    }

    public function setProduct(\Source\Support\RDStation\Data\Product $product): void {
        $this->product = $product;
    }
   
    public function send()
    { 
        
        if(empty($this->conversion->getConversionIdentifier())){
            throw new \Exception("Informe o nome do evento para continuar.", 1);
        }
        
        if(empty($this->customer->getName())){
            throw new \Exception("Informe o nome do cliente para continuar.", 1);
        }
        
        if(empty($this->customer->getEmail())){
            throw new \Exception("Informe o email do cliente para continuar.", 1);
        }
        
        /**
         * Create the custom fields
         * 
         * -- CONVERSION --
         * Categoria de operação - cf_operation_category
         * -- CUSTOMER --
         * Data de nascimento - cf_birthday
         * ID do cliente (Ecommerce) - cf_customer_id
         * -- ORDER --
         * Referência do pedido - cf_order_reference
         * URI do pedido - cf_order_uri 
         * Total de itens do pedido - cf_order_total_items
         * Valor do pedido - cf_order_amount
         * Código do cupom - cf_coupon_code
         * Desconto do cupom - cf_coupon_discount
         * -- PAYMENT --
         * Status do pagamento pedido - cf_payment_status
         * Método de pagamento - cf_payment_method
         * Link do boleto - cf_payment_billet_link
         * QRCode do PIX - cf_payment_pix_qrcode
         * Chave do PIX - cf_payment_pix_key
         * -- PRODUCT --
         * ID pro produto - cf_product_id
         * SKU do produto - cf_product_sku
         * URI do produto - cf_product_uri
         * Categoria do produto - cf_product_category
         * URI da Categoria do produto - cf_product_category_uri
         * Sub-Categoria do produto - cf_product_subcategory
         * URI da Sub-Categoria do produto - cf_product_subcategory_uri
         * 
         */
        $request['event_type'] = $this->conversion->getEventeType();
        $request['event_family'] = $this->conversion->getEventeFamily();
        $request['payload'] = [
            //conversion
            'conversion_identifier' => $this->conversion->getConversionIdentifier(),
            'tags' => (!empty($this->conversion) ? $this->conversion->getTags() : null),
            'cf_operation_category' => (!empty($this->conversion) ? $this->conversion->getTags() : null),
            //customer
            'name' => $this->customer->getName(),
            'email' => $this->customer->getEmail(),
            'state' => (!empty($this->customer) && !empty($this->customer->getState()) ? $this->customer->getState() : null),
            'city' => (!empty($this->customer) && !empty($this->customer->getCity()) ? $this->customer->getCity() : null),
            'country' => (!empty($this->customer) && !empty($this->customer->getCountry()) ? $this->customer->getCountry() : null),
            'personal_phone' => (!empty($this->customer) && !empty($this->customer->getPersonalPhone()) ? $this->customer->getPersonalPhone() : null),
            'mobile_phone' => (!empty($this->customer) && !empty($this->customer->getMobilePhone()) ? $this->customer->getMobilePhone() : null),
            'cf_birthday' => (!empty($this->customer) && !empty($this->customer->getBirthday()) ? $this->customer->getBirthday() : null),
            'cf_customer_id' => (!empty($this->customer) && !empty($this->customer->getCustomerId()) ? $this->customer->getCustomerId() : null),
            //order
            'cf_order_reference' => (!empty($this->order) && !empty($this->order->getOrderReference()) ? $this->order->getOrderReference() : null),
            'cf_order_uri' => (!empty($this->order) && !empty($this->order->getOrderUri()) ? $this->order->getOrderUri() : null),
            'cf_order_total_items' => (!empty($this->order) && !empty($this->order->getOrderTotalItems()) ? (string) $this->order->getOrderTotalItems() : null),
            'cf_order_amount' => (!empty($this->order) && !empty($this->order->getOrderAmount()) ? (string) str_price_db($this->order->getOrderAmount()) : null),
            'cf_coupon_code' => (!empty($this->order) && !empty($this->order->getCouponCode()) ? (string) $this->order->getCouponCode() : null),
            'cf_coupon_discount' => (!empty($this->order) && !empty($this->order->getCouponDiscount()) ? (string) $this->order->getCouponDiscount() : null),
            //payment
            'cf_payment_status' => (!empty($this->payment) && !empty($this->payment->getPaymentStatus()) ? $this->payment->getPaymentStatus() : null),
            'cf_payment_method' => (!empty($this->payment) && !empty($this->payment->getPaymentMethod()) ? $this->payment->getPaymentMethod() : null),
            'cf_payment_billet_link' => (!empty($this->payment) && !empty($this->payment->getPaymentBilletLink()) ? $this->payment->getPaymentBilletLink() : null),
            'cf_payment_pix_qrcode' => (!empty($this->payment) && !empty($this->payment->getPaymentPixQrcode()) ? $this->payment->getPaymentPixQrcode() : null),
            'cf_payment_pix_key' => (!empty($this->payment) && !empty($this->payment->getPaymentPixKey()) ? $this->payment->getPaymentPixKey() : null),
            //product
            'cf_product_id' => (!empty($this->product) && !empty($this->product->getProductId()) ? $this->product->getProductId() : null),
            'cf_product_sku' => (!empty($this->product) && !empty($this->product->getProductSku()) ? $this->product->getProductSku() : null),
            'cf_product_uri' => (!empty($this->product) && !empty($this->product->getProductUri()) ? $this->product->getProductUri() : null),
            'cf_product_category' => (!empty($this->product) && !empty($this->product->getProductCategory()) ? $this->product->getProductCategory() : null),
            'cf_product_category_uri' => (!empty($this->product) && !empty($this->product->getProductCategoryUri()) ? $this->product->getProductCategoryUri() : null),
            'cf_product_subcategory' => (!empty($this->product) && !empty($this->product->getProductSubCategory()) ? $this->product->getProductSubCategory() : null),
            'cf_product_subcategory_uri' => (!empty($this->product) && !empty($this->product->getProductSubCategoryUri()) ? $this->product->getProductSubCategoryUri() : null),
        ];
  
        $this->setEndPoint('/platform/conversions?api_key=' . $this->apiKey);
        $this->setParams($request);

        $this->post();

        return (object) $this->getCallback();
    }

}
