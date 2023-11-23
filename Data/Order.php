<?php

namespace ElxDigital\RDStation\Data;

class Order {

    /**
     * Eventos da API
     */
    // eventos personalizados
    private $cfOrderReference;
    private $cfOrderUri;
    private $cfOrderTotalItems;
    private $cfOrderAmount;
    private $cfCouponCode;
    private $cfCouponDiscount;

    public function __construct() {
    }

    /**
     * ############################
     * ### evento personalizado ###
     * ############################
     */
    public function setOrderReference(string $cfOrderReference): void {
        $this->cfOrderReference = $cfOrderReference;
    }

    public function getOrderReference() {
        return $this->cfOrderReference;
    }

    public function setOrderUri(string $cfOrderUri): void {
        $this->cfOrderUri = $cfOrderUri;
    }

    public function getOrderUri() {
        return $this->cfOrderUri;
    }

    public function setOrderTotalItems(int $cfOrderTotalItems): void {
        $this->cfOrderTotalItems = $cfOrderTotalItems;
    }

    public function getOrderTotalItems() {
        return (int) $this->cfOrderTotalItems;
    }

    public function setOrderAmount(float $cfOrderAmount): void {
        $this->cfOrderAmount = $cfOrderAmount;
    }

    public function getOrderAmount() {
        return $this->cfOrderAmount;
    }

    public function setCouponCode(string $cfCouponCode): void {
        $this->cfCouponCode = $cfCouponCode;
    }

    public function getCouponCode() {
        return $this->cfCouponCode;
    }

    public function setCouponDiscount(string $cfCouponDiscount): void {
        $this->cfCouponDiscount = $cfCouponDiscount;
    }

    public function getCouponDiscount() {
        return $this->cfCouponDiscount;
    }
}
