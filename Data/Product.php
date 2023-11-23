<?php

namespace ElxDigital\RDStation\Data;

class Product {

    /**
     * Eventos da API
     */
    // eventos personalizados
    private $cfProductId;
    private $cfProductSku;
    private $cfProductUri;
    private $cfProductCategory;
    private $cfProductCategoryUri;
    private $cfProductSubCategory;
    private $cfProductSubCategoryUri;

    public function __construct() {
    }

    /**
     * ############################
     * ### Evento personalizado ###
     * ############################
     */
    public function setProductId(string $cfProductId): void {
        $this->cfProductId = $cfProductId;
    }

    public function getProductId() {
        return $this->cfProductId;
    }

    public function setProductSku(string $cfProductSku): void {
        $this->cfProductSku = $cfProductSku;
    }

    public function getProductSku() {
        return $this->cfProductSku;
    }
    
    public function setProductUri(string $cfProductUri): void {
        $this->cfProductUri = $cfProductUri;
    }

    public function getProductUri() {
        return $this->cfProductUri;
    }
    
    public function setProductCategory(string $cfProductCategory): void {
        $this->cfProductCategory = $cfProductCategory;
    }

    public function getProductCategory() {
        return $this->cfProductCategory;
    }
    
    public function setProductCategoryUri(string $cfProductCategoryUri): void {
        $this->cfProductCategoryUri = $cfProductCategoryUri;
    }

    public function getProductCategoryUri() {
        return $this->cfProductCategoryUri;
    }
    
    public function setProductSubCategory(string $cfProductSubCategory): void {
        $this->cfProductSubCategory = $cfProductSubCategory;
    }

    public function getProductSubCategory() {
        return $this->cfProductSubCategory;
    }
    
    public function setProductSubCategoryUri(string $cfProductSubCategoryUri): void {
        $this->cfProductSubCategoryUri = $cfProductSubCategoryUri;
    }

    public function getProductSubCategoryUri() {
        return $this->cfProductSubCategoryUri;
    }
    
}
