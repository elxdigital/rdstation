<?php

namespace ElxDigital\RDStation\Data;

class Payment {

    /**
     * Eventos da API
     */
    // eventos personalizados
    private $cfPaymentStatus;
    private $cfPaymentMethod;
    private $cfPaymentBilletLink;
    private $cfPaymentPixQrcode;
    private $cfPaymentPixKey;

    public function __construct() {
    }

    /**
     * ############################
     * ### evento personalizado ###
     * ############################
     */

    public function setPaymentStatusCreated(): void {
        $this->cfPaymentStatus = 'created';
    }

    public function setPaymentStatusWaitingPayment(): void {
        $this->cfPaymentStatus = 'waiting_payment';
    }

    public function setPaymentStatusPaid(): void {
        $this->cfPaymentStatus = 'paid';
    }

    public function setPaymentStatusCanceled(): void {
        $this->cfPaymentStatus = 'canceled';
    }

    public function getPaymentStatus() {
        return $this->cfPaymentStatus;
    }

    public function setPaymentMethodCreditCard() {
        $this->cfPaymentMethod = 'credit_card';
    }

    public function setPaymentMethodBillet() {
        $this->cfPaymentMethod = 'billet';
    }

    public function setPaymentMethodPix() {
        $this->cfPaymentMethod = 'pix';
    }

    public function setPaymentMethodMoney() {
        $this->cfPaymentMethod = 'money';
    }

    public function getPaymentMethod() {
        return $this->cfPaymentMethod;
    }

    public function setPaymentBilletLink(string $cfPaymentBilletLink) {
        $this->cfPaymentBilletLink = $cfPaymentBilletLink;
    }

    public function getPaymentBilletLink() {
        return $this->cfPaymentBilletLink;
    }

    public function setPaymentPixQrcode(string $cfPaymentPixQrcode) {
        $this->cfPaymentPixQrcode = $cfPaymentPixQrcode;
    }

    public function getPaymentPixQrcode() {
        return $this->cfPaymentPixQrcode;
    }

    public function setPaymentPixKey(string $cfPaymentPixKey) {
        $this->cfPaymentPixKey = $cfPaymentPixKey;
    }

    public function getPaymentPixKey() {
        return $this->cfPaymentPixKey;
    }

}
