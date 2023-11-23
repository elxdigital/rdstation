<?php

namespace ElxDigital\RDStation\Data;

class Conversion {

    /**
     * Eventos da API
     */
    // eventos padrão
    private $eventeType;
    private $eventeFamily;
    private $conversionIdentifier;
    private $availableForMailing;
    private $tags;
    private $legalBases;
    // evento personalizado
    private $cfOperationCategory;

    public function __construct() {
        $this->eventeType = 'CONVERSION';
        $this->eventeFamily = 'CDP';
    }

    /**
     * #####################
     * ### evento padrão ###
     * #####################
     */
    public function getEventeType() {
        return $this->eventeType;
    }

    public function getEventeFamily() {
        return $this->eventeFamily;
    }

    public function setConversionIdentifierCustomer(string $conversionIdentifier): void {
        $this->conversionIdentifier = $conversionIdentifier;
    }

    public function setConversionIdentifierLead(): void {
        $this->conversionIdentifier = 'LEAD';
    }

    public function setConversionIdentifierInitiateCheckout(): void {
        $this->conversionIdentifier = 'INITIATE_CHECKOUT';
    }
    
    public function setConversionIdentifierAccountCreated(): void {
        $this->conversionIdentifier = 'ACCOUNT_CREATED';
    }

    public function setConversionIdentifierAddPaymentInfo(): void {
        $this->conversionIdentifier = 'ADD_PAYMENT_INFO';
    }

    public function setConversionIdentifierPurchase(): void {
        $this->conversionIdentifier = 'ORDER_PLACED';
    }

    public function getConversionIdentifier() {
        return $this->conversionIdentifier;
    }

    public function setAvailableForMailing(string $availableForMailing): void {
        $this->availableForMailing = $availableForMailing;
    }

    public function getAvailableForMailing() {
        return $this->availableForMailing;
    }
    
    public function setLegalBases(array $legalBases): void {
        $this->legalBases = $legalBases;
    }

    public function getLegalBases() {
        return $this->legalBases;
    }

    public function setTags(array $tags): void {
        $this->tags = $tags;
    }

    public function getTags() {
        return $this->tags;
    }

    /**
     * ############################
     * ### evento personalizado ###
     * ############################
     */
    
    public function setOperationCategory(array $cfOperationCategory): void {
        $this->cfOperationCategory = $cfOperationCategory;
    }

    public function getOperationCategory() {
        return $this->cfOperationCategory;
    }
}
